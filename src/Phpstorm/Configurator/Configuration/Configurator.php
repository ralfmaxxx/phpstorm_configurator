<?php

namespace Phpstorm\Configurator\Configuration;

use Exception;
use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\File\Saver;

class Configurator
{
    /**
     * @var mixed
     */
    protected $configurationFile;

    /**
     * @param mixed $configurationFile
     */
    public function __construct($configurationFile = null)
    {
        $this->configurationFile = $configurationFile;
    }

    /**
     * @throws ConfigurationException
     */
    public function setUpProject()
    {
        try {
            $configurationArray = $this->getConfigurationArray();
            $settingsObject = $this->getSettingsObject($configurationArray);
            $saver = new Saver($settingsObject);
            $saver->importInspections();
        } catch (Exception $e) {
            throw new ConfigurationException($e->getMessage());
        }

    }

    /**
     * @return array
     */
    protected function getConfigurationArray()
    {
        return (new Reader($this->configurationFile))
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
