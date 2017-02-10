<?php

namespace Phpstorm\Configurator\Configuration\Repository;

interface PathAndContentAwareInterface
{
    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string
     */
    public function getContent();
}
