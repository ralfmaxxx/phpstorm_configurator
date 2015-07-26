<?php

namespace Phpstorm\Configurator\Configuration\Mapper;

use Phpstorm\Configurator\Configuration\Settings;

interface MapperInterface
{
    /**
     * @param array $configurationArray
     *
     * @return Settings
     */
    public function map(array $configurationArray);
}
