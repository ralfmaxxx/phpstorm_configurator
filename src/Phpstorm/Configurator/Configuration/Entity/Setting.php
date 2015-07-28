<?php

namespace Phpstorm\Configurator\Configuration\Entity;

class Setting
{
    /**
     * @var string
     */
    protected $inspectionPhpmd;

    /**
     * @var string
     */
    protected $inspectionPhpcs;

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
     * @return string
     */
    public function getInspectionPhpmd()
    {
        return $this->inspectionPhpmd;
    }

    /**
     * @param string $inspectionPhpmd
     */
    public function setInspectionPhpmd($inspectionPhpmd)
    {
        $this->inspectionPhpmd = $inspectionPhpmd;
    }

    /**
     * @return string
     */
    public function getInspectionPhpcs()
    {
        return $this->inspectionPhpcs;
    }

    /**
     * @param string $inspectionPhpcs
     */
    public function setInspectionPhpcs($inspectionPhpcs)
    {
        $this->inspectionPhpcs = $inspectionPhpcs;
    }

    /**
     * @return int
     */
    public function getIndentPhp()
    {
        return $this->indentPhp;
    }

    /**
     * @param int $indentPhp
     */
    public function setIndentPhp($indentPhp)
    {
        $this->indentPhp = $indentPhp;
    }

    /**
     * @return int
     */
    public function getIndentJs()
    {
        return $this->indentJs;
    }

    /**
     * @param int $indentJs
     */
    public function setIndentJs($indentJs)
    {
        $this->indentJs = $indentJs;
    }

    /**
     * @return int
     */
    public function getIndentGherkin()
    {
        return $this->indentGherkin;
    }

    /**
     * @param int $indentGherkin
     */
    public function setIndentGherkin($indentGherkin)
    {
        $this->indentGherkin = $indentGherkin;
    }

    /**
     * @return int
     */
    public function getIndentYml()
    {
        return $this->indentYml;
    }

    /**
     * @param int $indentYml
     */
    public function setIndentYml($indentYml)
    {
        $this->indentYml = $indentYml;
    }

    /**
     * @return int
     */
    public function getIndentCss()
    {
        return $this->indentCss;
    }

    /**
     * @param int $indentCss
     */
    public function setIndentCss($indentCss)
    {
        $this->indentCss = $indentCss;
    }

    /**
     * @return int
     */
    public function getIndentScss()
    {
        return $this->indentScss;
    }

    /**
     * @param int $indentScss
     */
    public function setIndentScss($indentScss)
    {
        $this->indentScss = $indentScss;
    }

    /**
     * @return int
     */
    public function getIndentJson()
    {
        return $this->indentJson;
    }

    /**
     * @param int $indentJson
     */
    public function setIndentJson($indentJson)
    {
        $this->indentJson = $indentJson;
    }

    /**
     * @return int
     */
    public function getIndentHtml()
    {
        return $this->indentHtml;
    }

    /**
     * @param int $indentHtml
     */
    public function setIndentHtml($indentHtml)
    {
        $this->indentHtml = $indentHtml;
    }
}
