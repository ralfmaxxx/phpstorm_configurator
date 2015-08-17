<?php

namespace spec\Phpstorm\Configurator\Configuration\File;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Entity\Setting;
use Prophecy\Argument;

class SaverSpec extends ObjectBehavior
{
    function let(Setting $setting)
    {
        $this->beConstructedWith($setting);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\File\Saver');
    }
}
