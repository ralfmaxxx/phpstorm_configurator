<?php

namespace Phpstorm\Configurator\Configuration\File;

use Phpstorm\Configurator\Configuration\Settings;
use RuntimeException;

class Saver
{
    const INSPECTION_PATTERN_FILE = '/xml/inspections.xml';

    const PHPSTORM_INSPECTION_FILE = './.idea/inspectionProfiles/Project_Default.xml';

    /**
     * @var Settings
     */
    protected $settings;

    /**
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @throws RuntimeException
     */
    public function importInspections()
    {
        if ($this->isFileExists(self::PHPSTORM_INSPECTION_FILE)) {
            throw new RuntimeException('Inspection file already exists!');
        }
        $inspectionPatternContent = $this->getInspectionPatternContent();
        $inspectionContent = $this->getInspectionContent($inspectionPatternContent);
        if (!$this->saveInspectionFile($inspectionContent)) {
            throw new RuntimeException('Inspection file can\'t be saved');
        }

    }

    /**
     * @param string $file
     *
     * @return bool
     */
    protected function isFileExists($file)
    {
        return file_exists($file);
    }

    /**
     * @param string $inspectionContent
     *
     * @return int
     */
    protected function saveInspectionFile($inspectionContent)
    {
        return file_put_contents(self::PHPSTORM_INSPECTION_FILE, $inspectionContent);
    }

    /**
     * @return string
     */
    protected function getInspectionPatternContent()
    {
        return file_get_contents(__DIR__.self::INSPECTION_PATTERN_FILE);
    }

    /**
     * @param string $inspectionPatternContent
     *
     * @return mixed
     */
    protected function getInspectionContent($inspectionPatternContent)
    {
        return str_replace('{PHPMD_FILENAME}', $this->settings->getPhpMdFilename(), $inspectionPatternContent);
    }
}
