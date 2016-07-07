<?php

namespace Phpstorm\Configurator\Configuration\Config;

class SettingBuilder
{
    /**
     * @param array $configurationArray
     *
     * @return Setting
     */
    public function build(array $configurationArray)
    {
        $indent = new Indent($configurationArray['indent']);
        $inspection = new Inspection(
            $configurationArray['inspection']['phpmd'],
            $configurationArray['inspection']['phpcs']
        );

        return new Setting($indent, $inspection);
    }
}
