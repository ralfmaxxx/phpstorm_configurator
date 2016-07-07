<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Inspection
{
    /**
     * @var string
     */
    private $phpmdConfigFile;

    /**
     * @var string
     */
    private $phpcsConfigFile;

    /**
     * @param string $phpmdFile
     * @param string $phpcsFile
     */
    public function __construct($phpmdFile, $phpcsFile)
    {
        $this->phpmdConfigFile = $phpmdFile;
        $this->phpcsConfigFile = $phpcsFile;
    }

    /**
     * @return string
     */
    public function getPhpmdConfigFile()
    {
        return $this->phpmdConfigFile;
    }

    /**
     * @return string
     */
    public function getPhpcsConfigFile()
    {
        return $this->phpcsConfigFile;
    }
}
