<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Configuration;
use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\Config\SettingBuilder;
use Phpstorm\Configurator\Configuration\Config\SettingBuilderInterface;

/**
 * @mixin SettingBuilder
 */
class SettingBuilderSpec extends ObjectBehavior
{
    const CONFIGURATION = [
        'inspection' => [
            'phpmd' => 'file.xml',
            'phpcs' => 'example.xml',
        ],
        'indent' => [
            'php' => '4',
            'js' => '4',
            'gherkin' => '4',
            'yml' => '4',
            'json' => '4',
            'css' => '4',
            'scss' => '4',
            'html' => '4',
        ]
    ];

    function it_is_initializable()
    {
        $this->shouldHaveType(SettingBuilder::class);
        $this->shouldImplement(SettingBuilderInterface::class);
    }

    function it_builds_settings_object_from_configuration()
    {
        $configuration = new Configuration(self::CONFIGURATION);

        $this->build($configuration)->shouldReturnSettingInstanceFrom(self::CONFIGURATION);
    }

    public function getMatchers()
    {
        return [
            'returnSettingInstanceFrom' => function (Setting $setting, array $configurationArray) {
                $indent = $setting->getIndent();
                $inspection = $setting->getInspection();

                foreach ($configurationArray['indent'] as $key => $value) {
                    if ($indent->{'get' . ucfirst($key)}() != $value) {
                        return false;
                    }
                }

                foreach ($configurationArray['inspection'] as $key => $value) {
                    if ($inspection->{'get' . ucfirst($key)}() != $value) {
                        return false;
                    }
                }

                return true;
            }
        ];
    }
}
