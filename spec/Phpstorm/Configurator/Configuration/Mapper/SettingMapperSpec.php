<?php

namespace spec\Phpstorm\Configurator\Configuration\Mapper;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Entity\Setting;
use Prophecy\Argument;

class SettingMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\Mapper\SettingMapper');
    }

    function it_should_return_setting_object_by_mapping_configuration_array()
    {
        $configurationArray = [
            'inspection' => [
                'phpmd' => 'test.xml',
                'phpcs' => 'other.xml'
            ],
            'indent' => [
                'js' => '4',
                'html' => '4'
            ]
        ];

        $setting = $this->map($configurationArray);

        $setting->getIndentJs()->shouldReturn('4');
        $setting->getIndentHtml()->shouldReturn('4');
        $setting->getInspectionPhpcs()->shouldReturn('other.xml');
        $setting->getInspectionPhpmd()->shouldReturn('test.xml');

    }
}
