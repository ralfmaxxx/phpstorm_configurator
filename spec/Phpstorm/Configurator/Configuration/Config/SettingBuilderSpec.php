<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\Config\SettingBuilder;
use Prophecy\Argument;

/**
 * @mixin SettingBuilder
 */
class SettingBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SettingBuilder::class);
    }

    function it_builds_settings_object_for_proper_config_array()
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

        $this->build($configurationArray)->shouldReturnSettingInstanceFrom($configurationArray);
    }

    public function getMatchers()
    {
        return [
            'returnSettingInstanceFrom' => function (Setting $setting, array $configurationArray) {
                $isProper = true;

                foreach ($configurationArray['inspection'] as $key => $value) {
                    if ($setting->{'getInspection' . ucfirst($key)}() != $value) {
                        $isProper = false;
                        break;
                    }
                }

                foreach ($configurationArray['indent'] as $key => $value) {
                    if ($setting->{'getIndent' . ucfirst($key)}() != $value) {
                        $isProper = false;
                        break;
                    }
                }

                return $isProper;
            }
        ];
    }
}
