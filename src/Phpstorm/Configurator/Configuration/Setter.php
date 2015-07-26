<?php

namespace Phpstorm\Configurator\Configuration;

use Exception;
use Phpstorm\Configurator\Configuration\Exception\SetterException;
use Phpstorm\Configurator\Configuration\File\Saver;

class Setter
{
    /**
     * @throws SetterException
     */
    public function setUpProject()
    {
        try {
            $configurationArray = $this->getConfigurationArray();
            $settingsObject = $this->getSettingsObject($configurationArray);
            $saver = new Saver($settingsObject);
            $saver->importInspections();
        } catch (Exception $e) {
            throw new SetterException($e->getMessage());
        }

    }

    /**
     * @return array
     */
    protected function getConfigurationArray()
    {
        return (new Reader())
            ->fetch()
            ->getConfiguration();
    }

    /**
     * @param array $configurationArray
     *
     * @return Settings
     */
    protected function getSettingsObject(array $configurationArray)
    {
        $settingsBuilder = new SettingsBuilder();
        return $settingsBuilder->build($configurationArray);
    }
}
