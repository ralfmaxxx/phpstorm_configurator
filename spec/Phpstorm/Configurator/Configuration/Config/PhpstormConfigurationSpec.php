<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\PhpstormConfiguration;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * @mixin PhpstormConfiguration
 */
class PhpstormConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PhpstormConfiguration::class);
    }

    function it_returns_configuration_tree()
    {
        $this->getConfigTreeBuilder()->shouldBeAnInstanceOf(TreeBuilder::class);
    }
}
