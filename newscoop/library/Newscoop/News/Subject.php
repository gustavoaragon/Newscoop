<?php
/**
 * @package Newscoop
 * @copyright 2011 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\News;

/**
 * Subject
 * @EmbeddedDocument
 */
class Subject
{
    /**
     * @Id
     * @var string
     */
    protected $id;

    /**
     * @String
     * @var string
     */
    protected $qcode;

    /**
     * @String
     * @var string
     */
    protected $type;

    /**
     * @String
     * @var string
     */
    protected $name;

    /**
     * @param SimpleXMLElement $xml
     */
    public function __construct(\SimpleXMLElement $xml)
    {
        $this->qcode = isset($xml['qcode']) ? (string) $xml['qcode'] : null;
        $this->type = isset($xml['type']) ? (string) $xml['type'] : null;
        $this->name = $xml->name ? (string) $xml->name : null;
    }

    /**
     * Get QCode
     *
     * @return string
     */
    public function getQCode()
    {
        return $this->qcode;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
