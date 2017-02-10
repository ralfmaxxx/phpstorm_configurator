<?php

namespace Phpstorm\Configurator\Configuration\Repository\Exception;

use Phpstorm\Configurator\Configuration\Repository\PathAndContentAwareInterface;
use RuntimeException;

class CouldNotSaveFileException extends RuntimeException
{
    const COULD_NOT_SAVE_MESSAGE_PATTERN = 'Could not save "%s" file';

    const RESOURCE_EXISTS_MESSAGE_PATTERN = 'Resource "%s" already exists';

    /**
     * @return self
     */
    public static function couldNotSave(PathAndContentAwareInterface $resource)
    {
        return new self(
            sprintf(self::COULD_NOT_SAVE_MESSAGE_PATTERN, $resource->getPath())
        );
    }

    /**
     * @return self
     */
    public static function resourceExists(PathAndContentAwareInterface $resource)
    {
        return new self(
            sprintf(self::RESOURCE_EXISTS_MESSAGE_PATTERN, $resource->getPath())
        );
    }
}
