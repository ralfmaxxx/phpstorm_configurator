<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Configuration;

/**
 * @mixin Configuration
 */
class ConfigurationSpec extends ObjectBehavior
{
    const CONFIGURATION_ARRAY = [
        'inspection' => [
            'phpmd' => 'file.xml',
            'phpcs' => 'example.xml',
        ],
        'indent' => [
            'php' => 4,
            'js' => 4,
            'yml' => 4,
            'gherkin' => 4,
            'json' => 4,
            'css' => 4,
            'scss' => 4,
            'html' => 4,
            'xml' => 4,
        ],
    ];

    function let()
    {
        $this->beConstructedWith(self::CONFIGURATION_ARRAY);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
    }

    function it_returns_configuration()
    {
        $this->get()->shouldReturn(self::CONFIGURATION_ARRAY);
    }
}
