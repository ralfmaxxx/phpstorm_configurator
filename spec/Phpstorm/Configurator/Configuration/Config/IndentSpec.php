<?php

namespace spec\Phpstorm\Configurator\Configuration\Config;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Indent;

/**
 * @mixin Indent
 */
class IndentSpec extends ObjectBehavior
{
    const PHP_INDENT = 1;

    const JS_INDENT = 2;

    const YML_INDENT = 3;

    const GHERKIN_INDENT = 4;

    const JSON_INDENT = 5;

    const CSS_INDENT = 6;

    const HTML_INDENT = 7;

    const XML_INDENT = 8;

    const INDENT_CONFIGURATION = [
        'php' => self::PHP_INDENT,
        'js' => self::JS_INDENT,
        'yml' => self::YML_INDENT,
        'gherkin' => self::GHERKIN_INDENT,
        'json' => self::JSON_INDENT,
        'css' => self::CSS_INDENT,
        'html' => self::HTML_INDENT,
        'xml' => self::XML_INDENT,
    ];

    function let()
    {
        $this->beConstructedThrough('fromArray', [self::INDENT_CONFIGURATION]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Indent::class);
    }

    function it_has_php_indent()
    {
        $this->getPhp()->shouldReturn(self::PHP_INDENT);
    }
    
    function it_has_js_indent()
    {
        $this->getJs()->shouldReturn(self::JS_INDENT);
    }

    function it_has_yml_indent()
    {
        $this->getYml()->shouldReturn(self::YML_INDENT);
    }

    function it_has_gherkin_indent()
    {
        $this->getGherkin()->shouldReturn(self::GHERKIN_INDENT);
    }

    function it_has_json_indent()
    {
        $this->getJson()->shouldReturn(self::JSON_INDENT);
    }

    function it_has_css_indent()
    {
        $this->getCss()->shouldReturn(self::CSS_INDENT);
    }

    function it_has_html_indent()
    {
        $this->getHtml()->shouldReturn(self::HTML_INDENT);
    }

    function it_has_xml_indent()
    {
        $this->getXml()->shouldReturn(self::XML_INDENT);
    }
}
