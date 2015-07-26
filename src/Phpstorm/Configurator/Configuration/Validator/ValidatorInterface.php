<?php

namespace Phpstorm\Configurator\Configuration\Validator;

interface ValidatorInterface
{
    /**
     * @param array $configurationArray
     *
     * @return bool
     */
    public function isValid(array $configurationArray);
}
