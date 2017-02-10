<?php

namespace Phpstorm\Configurator\Configuration\Entity;

use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\Repository\PathAndContentAwareInterface;

class Inspection implements PathAndContentAwareInterface
{
    const INSPECTION_PATTERN_FILE = '/xml/inspections.xml';

    const SEARCH_PATTERNS = [
        '{PHPMD_FILENAME}',
    ];

    const PATH = 'inspectionProfiles/Project_Default.xml';

    private $content;

    private function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @param Setting $setting
     *
     * @return Inspection
     */
    public static function createFromSetting(Setting $setting)
    {
        $InspectionPattern = file_get_contents(__DIR__ . self::INSPECTION_PATTERN_FILE);

        $content = str_replace(self::SEARCH_PATTERNS, self::getInspectionSettings($setting), $InspectionPattern);

        return new self($content);
    }

    public function getPath()
    {
        return self::PATH;
    }

    public function getContent()
    {
        return $this->content;
    }

    private static function getInspectionSettings(Setting $setting)
    {
        return [
            $setting->getInspection()->getPhpmd()
        ];
    }
}
