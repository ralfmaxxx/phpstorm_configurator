<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Indent
{
    /**
     * @var int
     */
    private $php;

    /**
     * @var int
     */
    private $js;

    /**
     * @var int
     */
    private $gherkin;

    /**
     * @var int
     */
    private $yml;

    /**
     * @var int
     */
    private $css;

    /**
     * @var int
     */
    private $scss;

    /**
     * @var int
     */
    private $json;

    /**
     * @var int
     */
    private $html;

    /**
     * @var int
     */
    private $xml;

    private function __construct()
    {
    }

    /**
     * @param array $indentsArray
     *
     * @return self
     */
    public static function fromArray(array $indentsArray)
    {
        $self = new self();

        foreach ($indentsArray as $indentName => $indentValue) {
            $self->{$indentName} = $indentValue;
        }

        return $self;
    }

    /**
     * @return int
     */
    public function getPhp()
    {
        return $this->php;
    }

    /**
     * @return int
     */
    public function getJs()
    {
        return $this->js;
    }

    /**
     * @return int
     */
    public function getGherkin()
    {
        return $this->gherkin;
    }

    /**
     * @return int
     */
    public function getYml()
    {
        return $this->yml;
    }

    /**
     * @return int
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @return int
     */
    public function getScss()
    {
        return $this->scss;
    }

    /**
     * @return int
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @return int
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @return int
     */
    public function getXml()
    {
        return $this->xml;
    }
}
