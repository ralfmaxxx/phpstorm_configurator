<?php

namespace Phpstorm\Configurator\Configuration;

use Symfony\Component\Yaml\Yaml;
use Exception;
use RuntimeException;

class Reader
{
    const DEFAULT_CONFIGURATION_FILENAME = 'phpstorm.yml';
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $configuration;

    public function __construct($filename = self::DEFAULT_CONFIGURATION_FILENAME)
    {
        $this->filename = $filename;
    }

    /**
     * @return $this
     * @throws RuntimeException
     */
    public function fetch()
    {
        if ($configurationContent = file_get_contents($this->filename)) {
            try {
                $this->configuration = Yaml::parse($configurationContent);
                return $this;
            } catch (Exception $e) {
                throw new RuntimeException('Configuration file doesn\'t have an appropriate format');
            }
        }
        throw new RuntimeException('Configuration file doesn\'t exist');
    }

    /**
     * @throws RuntimeException
     * @return mixed
     */
    public function getConfiguration()
    {
        if (is_array($this->configuration)) {
            return $this->configuration;
        }
        throw new RuntimeException('Please load configuration first!');

    }
}
