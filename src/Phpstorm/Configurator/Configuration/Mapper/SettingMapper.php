<?php

namespace Phpstorm\Configurator\Configuration\Mapper;

use Phpstorm\Configurator\Configuration\Entity\Setting;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use RuntimeException;

class SettingMapper implements MapperInterface
{
    /**
     * @param array $configurationArray
     *
     * @return Setting
     * @throws RuntimeException
     */
    public function map(array $configurationArray)
    {
        $accessor = new PropertyAccessor();
        $setting = new Setting();

        try {
            foreach ($configurationArray as $sectionName => $sectionArray) {
                foreach ($sectionArray as $name => $value) {
                    $accessor->setValue($setting, $sectionName.$name, $value);
                }
            }
        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }
        return $setting;
    }
}
