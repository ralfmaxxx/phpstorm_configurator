<?php

namespace Phpstorm\Configurator\Command;

use Phpstorm\Configurator\Configuration\Config\ConfigurationFactory;
use Phpstorm\Configurator\Configuration\Config\SettingBuilder;
use Phpstorm\Configurator\Configuration\Configurator;
use Phpstorm\Configurator\Configuration\Repository\FileSystemRepository;
use RuntimeException;
use Symfony\Component\Console\Command\Command;

abstract class AbstractPhpstormCommand extends Command
{
    const PHPSTORM_YML_NAME = 'phpstorm.yml';
    const PHPSTORM_CONFIG_DIRECTORY = './.idea';

    const SUCCESS_EXIT_CODE = 0;

    private $configuration;

    private $initializationError;

    public function __construct()
    {
        try {
            $this->configuration = new Configurator(
                new ConfigurationFactory(),
                new SettingBuilder(),
                new FileSystemRepository(self::PHPSTORM_CONFIG_DIRECTORY)
            );
        } catch (RuntimeException $runtimeException) {
            $this->initializationError = $runtimeException->getMessage();
        }

        parent::__construct();
    }

    /**
     * @return Configurator
     */
    protected function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @return bool
     */
    protected function hasInitializationError()
    {
        return $this->initializationError !== null;
    }

    /**
     * @return string|null
     */
    public function getInitializationError()
    {
        return $this->initializationError;
    }
}
