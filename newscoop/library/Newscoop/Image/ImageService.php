<?php
/**
 * @package Newscoop
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Image;

use Nette\Image as NetteImage;

require_once __DIR__ . '/../../Nette/exceptions.php';

/**
 * Image Service
 */
class ImageService
{
    /**
     * @var array
     */
    private $config = array();

    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $orm;

    /**
     * @var array
     */
    private $supportedTypes = array(
        'image/jpeg',
        'image/png',
        'image/gif',
    );

    /**
     * @param array $config
     * @param Doctrine\ORM\EntityManager $orm
     */
    public function __construct(array $config, \Doctrine\ORM\EntityManager $orm)
    {
        $this->config = $config;
        $this->orm = $orm;
    }

    /**
     * Get image src
     *
     * @param string $image
     * @param int $width
     * @param int $height
     * @param string $instructions
     * @return string
     */
    public function getSrc($image, $width, $height, $instructions = 'center_center')
    {
        return implode('/', array(
            "{$width}x{$height}",
            $instructions,
            $this->encodePath($image),
        ));
    }

    /**
     * Generate image for given src
     *
     * @param string $src
     * @return void
     */
    public function generateFromSrc($src)
    {
        $matches = array();
        if (!preg_match('#^([0-9]+)x([0-9]+)/([_a-z0-9]+)/([-_.~%a-zA-Z0-9]+)$#', $src, $matches)) {
            return;
        }

        list(, $width, $height, $instructions, $imagePath) = $matches;

        $destFolder = rtrim($this->config['cache_path'], '/') . '/' . dirname(ltrim($src, './'));

        if (!realpath($destFolder)) {
            mkdir($destFolder, 0755, true);
        }

        if (!is_dir($destFolder)) {
            throw new \RuntimeException("Can't create folder '$destFolder'.");
        }

        $image = NetteImage::fromFile(APPLICATION_PATH . '/../' . $this->decodePath($imagePath));
        $image->resize($width, $height, NetteImage::FILL)->crop('50%', '50%', $width, $height);
        $image->save($destFolder . '/' . $imagePath);
        $image->send();
    }

    /**
     * Save image
     *
     * @param array $info
     * @return string
     */
    public function save(array $info)
    {
        if (!in_array($info['type'], $this->supportedTypes)) {
            throw new \InvalidArgumentException("Unsupported image type '$info[type]'.");
        }

        $name = sha1_file($info['tmp_name']) . '.' . array_pop(explode('.', $info['name']));
        if (!file_exists(APPLICATION_PATH . "/../images/$name")) {
            rename($info['tmp_name'], APPLICATION_PATH . "/../images/$name");
        }

        return $name;
    }

    /**
     * Find image entity
     *
     * @param int $id
     * @return Newscoop\Image\Image
     */
    public function find($id)
    {
        return $this->orm->getRepository('Newscoop\Image\Image')
            ->find($id);
    }

    /**
     * Get thumbnail for given image and rendition
     *
     * @param string $image
     * @param Newscoop\Image\RenditionInterface $rendition
     * @return Newscoop\Image\Thumbnail
     */
    public function getThumbnail($image, RenditionInterface $rendition)
    {
        return new Thumbnail(
            $this->getSrc($image, $rendition->getWidth(), $rendition->getHeight(), $rendition->getSpecs()),
            $rendition->getWidth(),
            $rendition->getHeight()
        );
    }

    /**
     * Encode path
     *
     * @param string $path
     * @return string
     */
    private function encodePath($path)
    {
        return rawurlencode(rawurlencode($path)); // must be done twice for apache
    }

    /**
     * Decode path
     *
     * @param string $path
     * @return string
     */
    private function decodePath($path)
    {
        return rawurldecode(rawurldecode($path));
    }
}