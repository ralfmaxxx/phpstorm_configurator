<?php

namespace spec\Phpstorm\Configurator\Configuration\Entity;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Entity\Setting;
use Prophecy\Argument;

class SettingBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\Entity\SettingBuilder');
    }

    function it_should_build_settings_object_for_proper_config_array()
    {
        $configurationArray = [
            'inspection' => [
                'phpmd' => 'file.xml',
                'phpcs' => 'example.xml'
            ],
            'indent' => [
                'php' => '4',
                'js' => '4',
                'gherkin' => '4',
                'yml' => '4',
                'json' => '4',
                'css' => '4',
                'scss' => '4',
                'html' => '4'
            ]
        ];
        $this->build($configurationArray)->shouldReturnAnInstanceOf(Setting::class);
    }
}
