<?php

namespace spec\Phpstorm\Configurator\Configuration\Repository;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Repository\FileSystemRepository;
use Phpstorm\Configurator\Configuration\Repository\FileSystemRepositoryInterface;

/**
 * @mixin FileSystemRepository
 */
class FileSystemRepositorySpec extends ObjectBehavior
{
    const BASE_DIRECTORY = 'base';

    function let()
    {
        $this->beConstructedWith(self::BASE_DIRECTORY);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FileSystemRepository::class);
        $this->shouldImplement(FileSystemRepositoryInterface::class);
    }
}
