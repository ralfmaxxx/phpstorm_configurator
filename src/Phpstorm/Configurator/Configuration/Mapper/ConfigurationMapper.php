<?php

namespace Phpstorm\Configurator\Configuration\Mapper;

use Phpstorm\Configurator\Configuration\Settings;

class ConfigurationMapper implements MapperInterface
{
    /**
     * {@inheritdoc}
     */
    public function map(array $configurationArray)
    {
        $phpMdFilename = $configurationArray['settings']['inspection']['phpmd'];
        $phpCsFile = $configurationArray['settings']['inspection']['phpcs'];
        return new Settings($phpMdFilename, $phpCsFile);
    }
}
