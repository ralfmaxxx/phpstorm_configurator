<?php

namespace Phpstorm\Configurator\Configuration\Config;

class SettingBuilder implements SettingBuilderInterface
{
    const CONFIGURATION_ARRAY = [];

    public function build(Configuration $configuration)
    {
        $configurationArray = $configuration->get();

        $indent = Indent::fromArray($configurationArray['indent']);
        $inspection = new Inspection(
            $configurationArray['inspection']['phpmd'],
            $configurationArray['inspection']['phpcs']
        );

        return new Setting($indent, $inspection);
    }
}
