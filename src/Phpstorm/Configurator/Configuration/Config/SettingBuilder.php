<?php

namespace Phpstorm\Configurator\Configuration\Config;

use Phpstorm\Configurator\Configuration\Configuration;

class SettingBuilder
{
    /**
     * @param Configuration $configuration
     *
     * @return Setting
     */
    public static function build(Configuration $configuration)
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
