<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingsSpec extends ObjectBehavior
{
    function let()
    {
        $phpMdFile = 'phpmd_rules_file.xml';
        $phpCsFile = 'phpcs_rules_file.xml';
        $indentPhp = 4;
        $indentJs = 4;
        $indentGherkin = 4;
        $indentYml = 4;
        $indentJson = 4;
        $indentCss = 4;
        $indentScss = 4;
        $indentHtml = 4;

        $this->beConstructedWith(
            $phpMdFile,
            $phpCsFile,
            $indentPhp,
            $indentJs,
            $indentGherkin,
            $indentYml,
            $indentJson,
            $indentCss,
            $indentScss,
            $indentHtml
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\Settings');
    }

    function it_should_return_phpmd_filename()
    {
        $this->getPhpMdFilename()->shouldReturn('phpmd_rules_file.xml');
    }

    function it_should_return_phpcs_filename()
    {
        $this->getPhpCsFilename()->shouldReturn('phpcs_rules_file.xml');
    }
}
