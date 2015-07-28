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
            $configurationArray['settings']['indent']['yml'],
            $configurationArray['settings']['indent']['json'],
            $configurationArray['settings']['indent']['css'],
            $configurationArray['settings']['indent']['scss'],
            $configurationArray['settings']['indent']['html']
        )) {
            return true;
        }
        return false;
    }
}
