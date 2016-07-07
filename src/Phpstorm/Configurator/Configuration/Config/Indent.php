<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Indent
{
    const CONFIGURATION_SUFFIX = 'Indent';

    /**
     * @var int
     */
    private $phpIndent;

    /**
     * @var int
     */
    private $jsIndent;

    /**
     * @var int
     */
    private $gherkinIndent;

    /**
     * @var int
     */
    private $ymlIndent;

    /**
     * @var int
     */
    private $cssIndent;

    /**
     * @var int
     */
    private $scssIndent;

    /**
     * @var int
     */
    private $jsonIndent;

    /**
     * @var int
     */
    private $htmlIndent;

    public function __construct(array $indentsArray)
    {
        foreach ($indentsArray as $indentName => $indentValue) {
            $this->{$indentName . self::CONFIGURATION_SUFFIX} = $indentValue;
        }
    }

    /**
     * @return int
     */
    public function getPhpIndent()
    {
        return $this->phpIndent;
    }

    /**
     * @return int
     */
    public function getJsIndent()
    {
        return $this->jsIndent;
    }

    /**
     * @return int
     */
    public function getGherkinIndent()
    {
        return $this->gherkinIndent;
    }

    /**
     * @return int
     */
    public function getYmlIndent()
    {
        return $this->ymlIndent;
    }

    /**
     * @return int
     */
    public function getCssIndent()
    {
        return $this->cssIndent;
    }

    /**
     * @return int
     */
    public function getScssIndent()
    {
        return $this->scssIndent;
    }

    /**
     * @return int
     */
    public function getJsonIndent()
    {
        return $this->jsonIndent;
    }

    /**
     * @return int
     */
    public function getHtmlIndent()
    {
        return $this->htmlIndent;
    }
}
