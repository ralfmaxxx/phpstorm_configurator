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
     * @param string $phpMdFilename
     * @param string $phpCsFilename
     * @param string $indentPhp
     * @param string $indentJs
     * @param string $indentGherkin
     * @param string $indentYml
     */
    public function __construct($phpMdFilename, $phpCsFilename, $indentPhp, $indentJs, $indentGherkin, $indentYml)
    {
        $this->phpMdFilename = $phpMdFilename;
        $this->phpCsFilename = $phpCsFilename;
        $this->indentPhp = (int)$indentPhp;
        $this->indentJs = (int)$indentJs;
        $this->indentGherkin = (int)$indentGherkin;
        $this->indentYml = (int)$indentYml;
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
}
