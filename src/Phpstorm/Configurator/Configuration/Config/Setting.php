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
     * @return Inspection
     */
    public function getInspection()
    {
        return $this->inspection;
    }

    /**
     * @return Indent
     */
    public function getIndent()
    {
        return $this->indent;
    }
}
