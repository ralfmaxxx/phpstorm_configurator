<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Configuration;
use Prophecy\Argument;
use RuntimeException;

/**
 * @mixin Configuration
 */
class ConfigurationSpec extends ObjectBehavior
{
    const EXPECTED_FILE_DOES_NOT_EXIST_MESSAGE = 'Configuration file doesn\'t exist';

    const EXPECTED_BAD_FORMAT_FILE_MESSAGE = 'Configuration file is not a proper yaml file';

    const FACTORY_METHOD_FROM_FILE_PATH = 'fromFilePath';

    const NON_EXISTING_FILE_PATH = 'non_existing_file.yml';

    const EXPECTED_CONFIGURATION = [
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

    const BAD_FORMAT_FILE_PATH = __DIR__ . '/fixtures/phpstorm_bad_format_example.yml';

    const PROPER_FORMAT_FILE_PATH = __DIR__ . '/fixtures/phpstorm_proper_example.yml';

    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
    }

    function it_throws_runtime_exception_when_file_does_not_exist()
    {
        $this->beConstructedThrough(self::FACTORY_METHOD_FROM_FILE_PATH, [self::NON_EXISTING_FILE_PATH]);
        $this->shouldThrow(new RuntimeException(self::EXPECTED_FILE_DOES_NOT_EXIST_MESSAGE))->duringInstantiation();
    }

    function it_throws_runtime_exception_when_file_has_bad_format()
    {
        $this->beConstructedThrough(self::FACTORY_METHOD_FROM_FILE_PATH, [self::BAD_FORMAT_FILE_PATH]);
        $this->shouldThrow(new RuntimeException(self::EXPECTED_BAD_FORMAT_FILE_MESSAGE))->duringInstantiation();
    }

    function it_returns_configuration_from_configuration_file()
    {
        $this->beConstructedThrough(self::FACTORY_METHOD_FROM_FILE_PATH, [self::PROPER_FORMAT_FILE_PATH]);
        $this->get()->shouldReturn(self::EXPECTED_CONFIGURATION);
    }
}
