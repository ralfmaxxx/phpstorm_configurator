<?php

namespace Phpstorm\Configurator\Configuration\Config;

final class Configuration
{
    private $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->configuration;
    }
}
