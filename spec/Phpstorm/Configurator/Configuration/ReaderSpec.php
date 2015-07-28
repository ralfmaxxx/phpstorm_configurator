<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RuntimeException;

class ReaderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\Reader');
    }

    function it_should_throw_runtime_exception_when_file_doesnt_exist()
    {
        $this->beConstructedWith('non_existing_file.yml');
        $this->shouldThrow(new RuntimeException('Configuration file doesn\'t exist'))->duringFetch();
    }

    function it_should_throw_runtime_exception_when_file_has_bad_format()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_bad_format_example.yml');
        $this->shouldThrow(new RuntimeException('Configuration file doesn\'t have an appropriate format'))->duringFetch();
    }

    function it_should_fetch_and_return_this_if_config_file_exists()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->fetch()->shouldReturn($this);
    }

    function it_should_throw_runtime_excpetion_when_you_get_config_without_calling_fetch()
    {
        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->shouldThrow(new RuntimeException('Please load configuration first by calling fetch method!'))->duringGetConfiguration();
    }

    function it_should_return_configuration_for_proper_configuration()
    {
        $configurationArray = [
            'settings' => [
                'inspection' => [
                    'phpmd' => 'file.xml',
                    'phpcs' => 'example.xml'
                ]
            ]
        ];

        $this->beConstructedWith(__DIR__.'/fixtures/phpstorm_proper_example.yml');
        $this->fetch()->getConfiguration()->shouldReturn($configurationArray);
    }
}
