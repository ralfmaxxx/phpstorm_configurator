<?php

namespace Phpstorm\Configurator\Configuration\Validator;

class ConfigurationValidator implements ValidatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function isValid(array $configurationArray)
    {
        if (isset(
            $configurationArray['settings'],
            $configurationArray['settings']['inspection'],
            $configurationArray['settings']['inspection']['phpmd'],
            $configurationArray['settings']['inspection']['phpcs'],
            $configurationArray['settings']['indent']['php'],
            $configurationArray['settings']['indent']['js'],
            $configurationArray['settings']['indent']['gherkin'],
            $configurationArray['settings']['indent']['yml']
        )) {
            return true;
        }
        return false;
    }
}
