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
        $indentPhp = $configurationArray['settings']['indent']['php'];
        $indentJs = $configurationArray['settings']['indent']['js'];
        $indentGherkin = $configurationArray['settings']['indent']['gherkin'];
        $indentYml = $configurationArray['settings']['indent']['yml'];
        return new Settings($phpMdFilename, $phpCsFile, $indentPhp, $indentJs, $indentGherkin, $indentYml);
    }
}
