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
     * @param $phpMdFilename
     * @param $phpCsFilename
     */
    public function __construct($phpMdFilename, $phpCsFilename)
    {
        $this->phpMdFilename = $phpMdFilename;
        $this->phpCsFilename = $phpCsFilename;
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
}
