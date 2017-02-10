<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;

use Phpstorm\Configurator\Configuration\Config\Configuration;
use Phpstorm\Configurator\Configuration\Config\ConfigurationFactory;
use Phpstorm\Configurator\Configuration\Config\ConfigurationFactoryInterface;
use RuntimeException;

/**
 * @mixin ConfigurationFactory
 */
class ConfigurationFactorySpec extends ObjectBehavior
{
    const EXPECTED_FILE_DOES_NOT_EXIST_MESSAGE = 'Configuration file doesn\'t exist';

    const EXPECTED_BAD_FORMAT_FILE_MESSAGE = 'Configuration file is not a proper yaml file';

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

    const NON_EXISTING_FILE_PATH = 'non_existing_file.yml';

    const BAD_FORMAT_FILE_PATH = __DIR__ . '/fixtures/phpstorm_bad_format_example.yml';

    const PROPER_FORMAT_FILE_PATH = __DIR__ . '/fixtures/phpstorm_proper_example.yml';

    function it_is_initializable()
    {
        $this->shouldHaveType(ConfigurationFactory::class);
        $this->shouldImplement(ConfigurationFactoryInterface::class);
    }

    function it_throws_runtime_exception_when_file_does_not_exist()
    {
        $this->shouldThrow(new RuntimeException(self::EXPECTED_FILE_DOES_NOT_EXIST_MESSAGE))->duringFromFilePath(self::NON_EXISTING_FILE_PATH);
    }

    function it_throws_runtime_exception_when_file_has_bad_format()
    {
        $this->shouldThrow(new RuntimeException(self::EXPECTED_BAD_FORMAT_FILE_MESSAGE))->duringFromFilePath(self::BAD_FORMAT_FILE_PATH);
    }

    function it_returns_configuration()
    {
        $this->fromFilePath(self::PROPER_FORMAT_FILE_PATH)->shouldBeLike(
            new Configuration(self::EXPECTED_CONFIGURATION)
        );
    }
}
