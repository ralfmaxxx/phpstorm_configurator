<?php

namespace Phpstorm\Configurator\Configuration;

use Phpstorm\Configurator\Configuration\Config\PhpstormConfiguration;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use RuntimeException;

class Reader
{
    const DEFAULT_CONFIGURATION_FILENAME = 'phpstorm.yml';
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $configuration;

    public function __construct($filename = self::DEFAULT_CONFIGURATION_FILENAME)
    {
        $this->filename = $filename;
    }

    /**
     * @SuppressWarnings(StaticAccess)
     *
     * @return $this
     * @throws RuntimeException
     */
    public function fetch()
    {
        if ($configurationContent = @file_get_contents($this->filename)) {
            try {
                $configurationYml = Yaml::parse($configurationContent);

                $processor = new Processor();

                $this->configuration = $processor->processConfiguration(new PhpstormConfiguration(), $configurationYml);

                return $this;
            } catch (ParseException $e) {
                throw new RuntimeException('Configuration file is not a proper yaml file');
            } catch (InvalidConfigurationException $e) {
                throw new RuntimeException($e->getMessage());
            }
        }
        throw new RuntimeException('Configuration file doesn\'t exist');
    }

    /**
     * @throws RuntimeException
     * @return mixed
     */
    public function getConfiguration()
    {
        if (is_array($this->configuration)) {
            return $this->configuration;
        }
        throw new RuntimeException('Please load configuration first by calling fetch method!');
    }
}
