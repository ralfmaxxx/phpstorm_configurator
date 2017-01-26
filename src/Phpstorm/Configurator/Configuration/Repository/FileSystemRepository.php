<?php

namespace Phpstorm\Configurator\Configuration\Repository;

use Phpstorm\Configurator\Configuration\Repository\Exception\CouldNotSaveFileException;
use RuntimeException;

class FileSystemRepository implements FileSystemRepositoryInterface
{
    const DIRECTORY_DOES_NOT_EXIST_ERROR_PATTERN = 'Directory "%s" does not exists';

    private $baseDirectory;

    /**
     * @param string $baseDirectory
     *
     * @throws RuntimeException
     */
    public function __construct($baseDirectory)
    {
        if (!file_exists($baseDirectory)) {
            throw new RuntimeException(
                sprintf(self::DIRECTORY_DOES_NOT_EXIST_ERROR_PATTERN, $baseDirectory)
            );
        }

        $this->baseDirectory = $baseDirectory;
    }

    public function save(PathAndContentAwareInterface $resource)
    {
        if (!$this->directoryExists($resource)) {
            $this->createDirectory($resource);
        }

        if (!$this->fileExists($resource)) {
            $this->persist($resource);

            return;
        }

        throw CouldNotSaveFileException::resourceExists($resource);
    }

    private function directoryExists(PathAndContentAwareInterface $resource)
    {
        return file_exists($this->baseDirectory . DIRECTORY_SEPARATOR . dirname($resource->getPath()));
    }

    private function createDirectory(PathAndContentAwareInterface $resource)
    {
        return mkdir($this->getResourceBaseDirectory($resource), 0755);
    }

    private function fileExists(PathAndContentAwareInterface $resource)
    {
        return file_exists($this->getResourcePath($resource));
    }

    private function persist(PathAndContentAwareInterface $resource)
    {
        $saved = file_put_contents($this->getResourcePath($resource), $resource->getContent()) !== false;

        if (!$saved) {
            throw CouldNotSaveFileException::couldNotSave($resource);
        }
    }

    private function getResourcePath(PathAndContentAwareInterface $resource)
    {
        return $this->baseDirectory . DIRECTORY_SEPARATOR . $resource->getPath();
    }

    private function getResourceBaseDirectory(PathAndContentAwareInterface $resource)
    {
        return $this->baseDirectory . DIRECTORY_SEPARATOR . dirname($resource->getPath());
    }
}
