<?php

namespace Phpstorm\Configurator\Configuration\Config;

use RuntimeException;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationFactory implements ConfigurationFactoryInterface
{
    const CONFIGURATION_FILE_NOT_FOUND_MESSAGE = 'Configuration file doesn\'t exist';

    const NOT_PROPER_YAML_FILE_MESSAGE = 'Configuration file is not a proper yaml file';

    public function fromFilePath($fileName = self::DEFAULT_CONFIGURATION_FILE_PATH)
    {
        if ($configurationContent = @file_get_contents($fileName)) {
            try {
                $configurationYml = Yaml::parse($configurationContent);

                $processor = new Processor();

                $configuration = $processor->processConfiguration(new PhpstormConfiguration(), $configurationYml);

                return new Configuration($configuration);
            } catch (ParseException $exception) {
                throw new RuntimeException(self::NOT_PROPER_YAML_FILE_MESSAGE);
            } catch (InvalidConfigurationException $exception) {
                throw new RuntimeException($exception->getMessage());
            }
        }

        throw new RuntimeException(self::CONFIGURATION_FILE_NOT_FOUND_MESSAGE);
    }
}
