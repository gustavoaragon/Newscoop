<?php

/**
 * @package Newscoop
 * @copyright 2011 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Service\Implementation;

use Newscoop\Utils\Validation;
use Newscoop\Service\IOutputSettingSectionService;
use Newscoop\Service\Implementation\AEntityBaseServiceDoctrine;
use Newscoop\Entity\Output\OutputSettingsSection;
use Newscoop\Entity\Section;

/**
 * Provides the services implementation for the Outputs.
 */
class OutputSettingSectionServiceDoctrine extends AEntityBaseServiceDoctrine
        implements IOutputSettingSectionService
{

    /** @var Newscoop\Service\IOutputService */
    private $outputService = NULL;

    /**
     * Provides the ouput service.
     *
     * @return Newscoop\Service\IOutputService
     * 		The service service to be used by this controller.
     */
    public function getOutputService()
    {
        if ($this->outputService === NULL) {
            $this->outputService = $this->getResourceId()->getService(IOutputService::NAME);
        }
        return $this->outputService;
    }

    protected function _init_()
    {
        $this->entityClassName = OutputSettingsSection::NAME_1;
    }

    /* --------------------------------------------------------------- */

    /**
     * Provides the Output Settings that has the provided Section.
     *
     * @param Section|int $section
     * 		The section to be searched, not null, not empty.
     * @param Output|int|string $output
     *
     * @return Newscoop\Entity\OutputSettingsSection
     * 		The Output Setting, NULL if no Output Setting could be found for the provided section.
     */
    public function findBySectionAndOutput($issue, $output)
    {
        if ($section instanceof Section) {
            $section = $section->getId();
        }
        if (!($output instanceof Output)) {
            if (is_int($output)) {
                $output = $this->getOutputService()->findById($output);
            } else {
                $output = $this->getOutputService()->findByName($output);
            }
        }

        $em = $this->getEntityManager();
        $repository = $em->getRepository($this->entityClassName);
        $resources = $repository->findBy(array('section' => $section, 'output' => $output));
        if (isset($resources) && count($resources) > 0) {
            return $resources;
        }
        return NULL;
    }

    /**
     * Provides the Output Settings that has the provided Section.
     *
     * @param Section|int $section
     * 		The section to be searched, not null, not empty.
     *
     * @return Newscoop\Entity\OutputSettingsSection
     * 		The Output Setting, empty array if no Output Setting could be found for the provided section.
     */
    public function findBySection($section)
    {
        if ($section instanceof Section) {
            $section = $section->getId();
        }
        $em = $this->getEntityManager();
        $repository = $em->getRepository($this->entityClassName);
        $resources = $repository->findBySection($section);
        if (isset($resources) && count($resources) > 0) {
            return $resources;
        }
        return array();
    }

    /**
     * Update an ouput setting section
     *
     * @param OutputSettingsSection $outputSettingsSection
     */
    public function update(OutputSettingsSection $outputSettingsSection)
    {
        $em = $this->getEntityManager();
        $em->persist($outputSettingsSection);
        $em->flush();
    }

    /**
     * Inserts an ouput setting section
     *
     * @param OutputSettingsSection $outputSettingsSection
     */
    public function insert(OutputSettingsSection $outputSettingsSection)
    {
        $em = $this->getEntityManager();
        $em->persist($outputSettingsSection);
        $em->flush();
    }

    /**
     * Delete an ouput setting section
     *
     * @param OutputSettingsSection $outputSettingsSection
     */
    public function delete(OutputSettingsSection $outputSettingsSection)
    {
        $em = $this->getEntityManager();
        $em->remove($outputSettingsSection);
        $em->flush();
    }

}