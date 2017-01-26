<?php

namespace Phpstorm\Configurator\Configuration;

use Exception;
use Phpstorm\Configurator\Configuration\COnfig\SettingBuilder;
use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\File\Saver;

class Configurator
{
    private $setting;

    /**
     * @param null|string $configurationFile
     *
     * @throws ConfigurationException
     */
    public function __construct($configurationFile = null)
    {
        try {
            $this->setting = SettingBuilder::build(
                Configuration::fromFilePath($configurationFile)
            );
        } catch (Exception $exception) {
            throw ConfigurationException::fromException($exception);
        }
    }

    /**
     * @return bool
     * @throws ConfigurationException
     */
    public function setUpInspections()
    {
        try {
            $saver = new Saver($this->setting);
            $saver->importInspections();
        } catch (Exception $exception) {
            throw ConfigurationException::fromException($exception);
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
            $saver = new Saver($this->setting);
            $saver->importIndents();
        } catch (Exception $exception) {
            throw ConfigurationException::fromException($exception);
        }
        return true;
    }
}
