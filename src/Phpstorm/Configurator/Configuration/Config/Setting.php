<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Setting
{
    /**
     * @var Inspection
     */
    private $inspection;

    /**
     * @var Indent
     */
    private $indent;

    public function __construct(Indent $indent, Inspection $inspection)
    {
        $this->indent = $indent;
        $this->inspection = $inspection;
    }

    /**
     * @return string
     */
    public function getInspectionPhpmd()
    {
        return $this->inspection->getPhpmdConfigFile();
    }

    /**
     * @return string
     */
    public function getInspectionPhpcs()
    {
        return $this->inspection->getPhpcsConfigFile();
    }

    /**
     * @return int
     */
    public function getIndentPhp()
    {
        return $this->indent->getPhpIndent();
    }

    /**
     * @return int
     */
    public function getIndentJs()
    {
        return $this->indent->getJsIndent();
    }

    /**
     * @return int
     */
    public function getIndentGherkin()
    {
        return $this->indent->getGherkinIndent();
    }

    /**
     * @return int
     */
    public function getIndentYml()
    {
        return $this->indent->getYmlIndent();
    }

    /**
     * @return int
     */
    public function getIndentCss()
    {
        return $this->indent->getCssIndent();
    }

    /**
     * @return int
     */
    public function getIndentScss()
    {
        return $this->indent->getScssIndent();
    }

    /**
     * @return int
     */
    public function getIndentJson()
    {
        return $this->indent->getJsonIndent();
    }

    /**
     * @return int
     */
    public function getIndentHtml()
    {
        return $this->indent->getHtmlIndent();
    }
}
