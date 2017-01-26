<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Inspection
{
    /**
     * @var string
     */
    private $phpmd;

    /**
     * @var string
     */
    private $phpcs;

    /**
     * @param string $phpmd
     * @param string $phpcs
     */
    public function __construct($phpmd, $phpcs)
    {
        $this->phpmd = $phpmd;
        $this->phpcs = $phpcs;
    }

    /**
     * @return string
     */
    public function getPhpmd()
    {
        return $this->phpmd;
    }

    /**
     * @return string
     */
    public function getPhpcs()
    {
        return $this->phpcs;
    }
}
