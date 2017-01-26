<?php

namespace spec\Phpstorm\Configurator\Configuration\File;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Indent;
use Phpstorm\Configurator\Configuration\Config\Inspection;
use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\File\Saver;

/**
 * @mixin Saver
 */
class SaverSpec extends ObjectBehavior
{
    function let()
    {
        $setting = new Setting(
            Indent::fromArray([]),
            new Inspection('phpmd.xml', 'ruleset.xml')
        );
        $this->beConstructedWith($setting);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Saver::class);
    }
}
