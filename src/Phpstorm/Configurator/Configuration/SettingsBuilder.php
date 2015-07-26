<?php

namespace Phpstorm\Configurator\Configuration;

use Phpstorm\Configurator\Configuration\Mapper\ConfigurationMapper;
use Phpstorm\Configurator\Configuration\Mapper\MapperInterface;
use Phpstorm\Configurator\Configuration\Validator\ConfigurationValidator;
use Phpstorm\Configurator\Configuration\Validator\ValidatorInterface;
use UnexpectedValueException;

class SettingsBuilder
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var MapperInterface
     */
    protected $mapper;

    public function __construct()
    {
        $this->validator = new ConfigurationValidator();
        $this->mapper = new ConfigurationMapper();
    }

    /**
     * @param array $configurationArray
     *
     * @throws UnexpectedValueException
     * @return Settings
     */
    public function build(array $configurationArray)
    {
        if ($this->validator->isValid($configurationArray)) {
            return $this->mapper->map($configurationArray);
        }
        throw new UnexpectedValueException('Configuration file is incorrect');
    }
}
