<?php

namespace Phpstorm\Configurator\Configuration\Config;

interface SettingBuilderInterface
{
    /**
     * @param Configuration $configuration
     *
     * @return Setting
     */
    public function build(Configuration $configuration);
}
