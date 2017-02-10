<?php

namespace Phpstorm\Configurator\Configuration\Config;

use RuntimeException;

interface ConfigurationFactoryInterface
{
    const DEFAULT_CONFIGURATION_FILE_PATH = 'phpstorm.yml';

    /**
     * @param string $fileName
     *
     * @return Configuration
     * @throws RuntimeException
     */
    public function fromFilePath($fileName = self::DEFAULT_CONFIGURATION_FILE_PATH);
}
