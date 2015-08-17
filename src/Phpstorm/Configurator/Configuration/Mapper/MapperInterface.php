<?php

namespace Phpstorm\Configurator\Configuration\Mapper;

interface MapperInterface
{
    /**
     * @param array $configurationArray
     *
     * @return mixed
     */
    public function map(array $configurationArray);
}
