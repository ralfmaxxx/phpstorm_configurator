<?php

namespace Phpstorm\Configurator\Configuration\Exception;

use Exception;

class ConfigurationException extends Exception
{
    public static function fromException(Exception $exception)
    {
        return new self($exception->getMessage());
    }
}
