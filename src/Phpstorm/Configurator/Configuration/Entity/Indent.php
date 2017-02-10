<?php

namespace Phpstorm\Configurator\Configuration\Entity;

use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\Repository\PathAndContentAwareInterface;

class Indent implements PathAndContentAwareInterface
{
    const INDENT_PATTERN_FILE = '/xml/indents.xml';

    const SEARCH_PATTERNS = [
        '{GHERKIN}',
        '{PHP}',
        '{JS}',
        '{YML}',
        '{JSON}',
        '{CSS}',
        '{SCSS}',
        '{HTML}',
        '{XML}',
    ];

    const PATH = 'codeStyleSettings.xml';

    private $content;

    private function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @param Setting $setting
     *
     * @return Indent
     */
    public static function createFromSetting(Setting $setting)
    {
        $indentPattern = file_get_contents(__DIR__ . self::INDENT_PATTERN_FILE);

        $content = str_replace(self::SEARCH_PATTERNS, self::getIndentSettings($setting), $indentPattern);

        return new self($content);
    }

    public function getPath()
    {
        return self::PATH;
    }

    public function getContent()
    {
        return $this->content;
    }

    private static function getIndentSettings(Setting $setting)
    {
        $indent = $setting->getIndent();

        return [
            $indent->getGherkin(),
            $indent->getPhp(),
            $indent->getJs(),
            $indent->getYml(),
            $indent->getJson(),
            $indent->getCss(),
            $indent->getScss(),
            $indent->getHtml(),
            $indent->getXml(),
        ];
    }
}
