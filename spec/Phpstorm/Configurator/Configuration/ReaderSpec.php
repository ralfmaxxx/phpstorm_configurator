<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Reader;
use Prophecy\Argument;
use RuntimeException;

/**
 * @mixin Reader
 */
class ReaderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Reader::class);
    }

    function it_throws_runtime_exception_when_file_doesnt_exist()
    {
        $this->beConstructedWith('non_existing_file.yml');
        $this->shouldThrow(new RuntimeException('Configuration file doesn\'t exist'))->duringFetch();
    }

    function it_throws_runtime_exception_when_file_has_bad_format()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_bad_format_example.yml');
        $this->shouldThrow(new RuntimeException('Configuration file is not a proper yaml file'))->duringFetch();
    }

    function it_throws_runtime_excpetion_when_you_get_config_without_calling_fetch()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->shouldThrow(new RuntimeException('Please load configuration first by calling fetch method!'))->duringGetConfiguration();
    }

    function it_fetches_and_return_this_if_config_file_exists()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->fetch()->shouldReturn($this);
    }

    function it_returns_configuration_for_proper_configuration()
    {
        $configurationArray = [
            'inspection' => [
                'phpmd' => 'file.xml',
                'phpcs' => 'example.xml'
            ],
            'indent' => [
                'php' => 4,
                'js' => 4,
                'yml' => 4,
                'gherkin' => 4,
                'json' => 4,
                'css' => 4,
                'scss' => 4,
                'html' => 4
            ]
        ];

        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->fetch()->getConfiguration()->shouldReturn($configurationArray);
    }
}
