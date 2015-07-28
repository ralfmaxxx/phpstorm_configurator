<?php

namespace Phpstorm\Configurator\Configuration;

class Settings
{
    /**
     * @var string
     */
    protected $phpMdFilename;

    /**
     * @var string
     */
    protected $phpCsFilename;

    /**
     * @var int
     */
    protected $indentPhp;

    /**
     * @var int
     */
    protected $indentJs;

    /**
     * @var int
     */
    protected $indentGherkin;

    /**
     * @var int
     */
    protected $indentYml;

    /**
     * @var int
     */
    protected $indentCss;

    /**
     * @var int
     */
    protected $indentScss;

    /**
     * @var int
     */
    protected $indentJson;

    /**
     * @var int
     */
    protected $indentHtml;

    /**
     * @SuppressWarnings(ExcessiveParameterList) !temporary
     *
     * @param string $phpMdFilename
     * @param string $phpCsFilename
     * @param string $indentPhp
     * @param string $indentJs
     * @param string $indentGherkin
     * @param string $indentYml
     * @param string $indentHtml
     * @param string $indentJson
     * @param string $indentCss
     * @param string $indentSccs
     */
    public function __construct(
        $phpMdFilename,
        $phpCsFilename,
        $indentPhp,
        $indentJs,
        $indentGherkin,
        $indentYml,
        $indentHtml,
        $indentJson,
        $indentCss,
        $indentSccs
    ) {
        $this->phpMdFilename = $phpMdFilename;
        $this->phpCsFilename = $phpCsFilename;
        $this->indentPhp = (int)$indentPhp;
        $this->indentJs = (int)$indentJs;
        $this->indentGherkin = (int)$indentGherkin;
        $this->indentYml = (int) $indentYml;
        $this->indentHtml = (int)$indentHtml;
        $this->indentJson = (int)$indentJson;
        $this->indentCss = (int)$indentCss;
        $this->indentSccs = (int)$indentSccs;
    }

    /**
     * @return string
     */
    public function getPhpCsFilename()
    {
        return $this->phpCsFilename;
    }

    /**
     * @return string
     */
    public function getPhpMdFilename()
    {
        return $this->phpMdFilename;
    }

    /**
     * @return int
     */
    public function getIndentPhp()
    {
        return $this->indentPhp;
    }

    /**
     * @return int
     */
    public function getIndentJs()
    {
        return $this->indentJs;
    }

    /**
     * @return int
     */
    public function getIndentGherkin()
    {
        return $this->indentGherkin;
    }

    /**
     * @return int
     */
    public function getIndentYml()
    {
        return $this->indentYml;
    }

    /**
     * @return int
     */
    public function getIndentCss()
    {
        return $this->indentCss;
    }

    /**
     * @return int
     */
    public function getIndentScss()
    {
        return $this->indentSccs;
    }

    /**
     * @return int
     */
    public function getIndentJson()
    {
        return $this->indentJson;
    }

    /**
     * @return int
     */
    public function getIndentHtml()
    {
        return $this->indentHtml;
    }
}
