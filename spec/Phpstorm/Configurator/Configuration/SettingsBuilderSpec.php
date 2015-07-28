<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Settings;
use Prophecy\Argument;
use UnexpectedValueException;

class SettingsBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\SettingsBuilder');
    }

    function it_should_build_settings_object_for_proper_config_array()
    {
        $configurationArray = [
            'settings' => [
                'inspection' => [
                    'phpmd' => 'file.xml',
                    'phpcs' => 'example.xml'
                ],
                'indent' => [
                    'php' => '4',
                    'js' => '4',
                    'gherkin' => '4',
                    'yml' => '4'
                ]
            ]
        ];

        $this->build($configurationArray)->shouldReturnAnInstanceOf(Settings::class);
    }

    function it_should_throw_unexpected_value_exception_for_invalid_config_array()
    {
        $configurationArray = [
            'settings' => [
                'inspect' => [
                    'phpmd' => 'file.xml',
                    'phpcs' => 'example.xml'
                ],
                'indent' => [
                    'php' => '4',
                    'js' => '4',
                    'gherkin' => '4',
                    'yml' => '4'
                ]
            ]
        ];

        $this->shouldThrow(
            new UnexpectedValueException('Configuration structure is incorrect')
        )->duringBuild($configurationArray);
    }
}
