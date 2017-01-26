<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Inspection;

/**
 * @mixin Inspection
 */
class InspectionSpec extends ObjectBehavior
{
    const PHPMD_FILE = 'phpmd.xml';

    const PHPCS_FILE = 'phpcs.xml';

    function let()
    {
        $this->beConstructedWith(self::PHPMD_FILE, self::PHPCS_FILE);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Inspection::class);
    }

    function it_has_phpmd_file()
    {
        $this->getPhpmd()->shouldReturn(self::PHPMD_FILE);
    }

    function it_has_phpcs_file()
    {
        $this->getPhpcs()->shouldReturn(self::PHPCS_FILE);
    }
}
