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
     * @return bool
     * @throws ConfigurationException
     */
    public function setUpInspections()
    {
        try {
            $configurationArray = $this->getConfigurationArray();
            $settingsObject = $this->getSettingsObject($configurationArray);
            $saver = new Saver($settingsObject);
            $saver->importInspections();
        } catch (Exception $e) {
            throw new ConfigurationException($e->getMessage());
        }
        return true;
    }

    /**
     * @return bool
     * @throws ConfigurationException
     */
    public function setUpIndents()
    {
        try {
            $configurationArray = $this->getConfigurationArray();
            $settingsObject = $this->getSettingsObject($configurationArray);
            $saver = new Saver($settingsObject);
            $saver->importIndents();
        } catch (Exception $e) {
            throw new ConfigurationException($e->getMessage());
        }
        return true;
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
