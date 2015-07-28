<?php

namespace Phpstorm\Configurator\Configuration\Entity;

use Phpstorm\Configurator\Configuration\Mapper\SettingMapper;
use Phpstorm\Configurator\Configuration\Mapper\MapperInterface;
use RuntimeException;

class SettingBuilder
{
    /**
     * @var MapperInterface
     */
    protected $mapper;

    public function __construct()
    {
        $this->mapper = new SettingMapper();
    }

    /**
     * @param array $configurationArray
     *
     * @return Setting
     * @throws RuntimeException
     */
    public function build(array $configurationArray)
    {
        return $this->mapper->map($configurationArray);
    }
}
