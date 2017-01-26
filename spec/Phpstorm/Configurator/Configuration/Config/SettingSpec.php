<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Indent;
use Phpstorm\Configurator\Configuration\Config\Inspection;
use Phpstorm\Configurator\Configuration\Config\Setting;

/**
 * @mixin Setting
 */
class SettingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(Indent::fromArray([]), new Inspection('phpmd', 'phpcs'));
        $this->shouldHaveType(Setting::class);
    }

    function it_has_inspection()
    {
        $inspection = new Inspection('phpmd.xml', 'phpcs.xml');
        $indent = Indent::fromArray([]);

        $this->beConstructedWith($indent, $inspection);

        $this->getInspection()->shouldReturn($inspection);
    }

    function it_has_indent()
    {
        $inspection = new Inspection('phpmd.xml', 'phpcs.xml');
        $indent = Indent::fromArray([]);

        $this->beConstructedWith($indent, $inspection);

        $this->getIndent()->shouldReturn($indent);
    }
}
