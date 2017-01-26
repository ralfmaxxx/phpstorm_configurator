<?php

namespace Phpstorm\Configurator\Configuration\Repository;

use Phpstorm\Configurator\Configuration\Repository\Exception\CouldNotSaveFileException;

interface FileSystemRepositoryInterface
{
    /**
     * @param PathAndContentAwareInterface $resource
     *
     * @throws CouldNotSaveFileException
     */
    public function save(PathAndContentAwareInterface $resource);
}
