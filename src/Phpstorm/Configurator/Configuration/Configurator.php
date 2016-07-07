<?php

namespace Phpstorm\Configurator\Configuration;

use Exception;
use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\COnfig\SettingBuilder;
use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\File\Saver;
use RuntimeException;

class Configurator
{
    /**
     * @var null|string
     */
    protected $configurationFile;

    /**
     * @param null|string $configurationFile
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
            $setting = $this->getSettingInstance($configurationArray);
            $saver = new Saver($setting);
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
            $setting = $this->getSettingInstance($configurationArray);
            $saver = new Saver($setting);
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
     * @return Setting
     * @throws RuntimeException
     */
    protected function getSettingInstance(array $configurationArray)
    {
        $settingsBuilder = new SettingBuilder();

        return $settingsBuilder->build($configurationArray);
    }
}
