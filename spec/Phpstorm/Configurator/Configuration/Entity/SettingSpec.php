<?php

namespace spec\Phpstorm\Configurator\Configuration\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phpstorm\Configurator\Configuration\Entity\Setting');
    }

    function it_should_set_inspection_attributes_properly()
    {
        $this->setInspectionPhpcs('file.xml');
        $this->getInspectionPhpcs()->shouldReturn('file.xml');

        $this->setInspectionPhpmd('md.xml');
        $this->getInspectionPhpmd()->shouldReturn('md.xml');
    }

    function it_should_set_indent_attributes_properl()
    {
        $this->setIndentJs('4');
        $this->getIndentJs()->shouldReturn('4');

        $this->setIndentHtml('3');
        $this->getIndentHtml()->shouldReturn('3');

        $this->setIndentCss('2');
        $this->getIndentCss()->shouldReturn('2');

        $this->setIndentScss('12');
        $this->getIndentScss()->shouldReturn('12');

        $this->setIndentYml('1');
        $this->getIndentYml()->shouldReturn('1');

        $this->setIndentJson('11');
        $this->getIndentJson()->shouldReturn('11');

        $this->setIndentPhp('1');
        $this->getIndentPhp()->shouldReturn('1');

        $this->setIndentGherkin('7');
        $this->getIndentGherkin()->shouldReturn('7');
    }
}
