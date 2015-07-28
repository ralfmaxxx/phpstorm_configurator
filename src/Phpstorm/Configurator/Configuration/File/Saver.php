<?php

namespace Phpstorm\Configurator\Configuration\File;

use Phpstorm\Configurator\Configuration\Settings;
use RuntimeException;

class Saver
{
    const INSPECTION_PATTERN_FILE = '/xml/inspections.xml';
    const INDENT_PATTERN_FILE = '/xml/indents.xml';

    const PHPSTORM_INSPECTION_DIR = './.idea/inspectionProfiles';
    const PHPSTORM_INDENT_DIR = './.idea';

    const PHPSTORM_INSPECTION_FILE = 'Project_Default.xml';
    const PHPSTORM_INDENT_FILE = 'codeStyleSettings.xml';

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
     * @return bool
     * @throws RuntimeException
     */
    public function importInspections()
    {
        if ($this->isFileExists(self::PHPSTORM_INSPECTION_DIR.'/'.self::PHPSTORM_INSPECTION_FILE)) {
            throw new RuntimeException(
                'Inspection file already exists! Remove it manually first: '
                .self::PHPSTORM_INSPECTION_DIR
                .'/'
                .self::PHPSTORM_INSPECTION_FILE
            );
        }
        $this->checkIfDirectoryExists(self::PHPSTORM_INSPECTION_DIR);
        $inspectionPatternContent = $this->getInspectionPatternContent();
        $inspectionContent = $this->getInspectionContent($inspectionPatternContent);
        if (!$this->saveInspectionFile($inspectionContent)) {
            throw new RuntimeException('Inspection file can\'t be saved');
        }
        return true;
    }

    /**
     * @return bool
     * @throws RuntimeException
     */
    public function importIndents()
    {
        if ($this->isFileExists(self::PHPSTORM_INDENT_DIR.'/'.self::PHPSTORM_INDENT_FILE)) {
            throw new RuntimeException(
                'Code style file already exists! Remove it manually first: '
                .self::PHPSTORM_INDENT_DIR
                .'/'
                .self::PHPSTORM_INDENT_FILE
            );
        }
        $indentPatternContent = $this->getIndentPatternContent();
        $indentContent = $this->getIndentContent($indentPatternContent);
        if (!$this->saveIndentFile($indentContent)) {
            throw new RuntimeException('Code style file can\'t be saved');
        }
        return true;
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
     * @param string $dir
     *
     * @throws RuntimeException
     */
    protected function checkIfDirectoryExists($dir)
    {
        if (!file_exists($dir)) {
            if (!mkdir($dir, 0755)) {
                throw new RuntimeException('Can\'t create a directory for inspections.');
            }
        }
    }

    /**
     * @param string $inspectionContent
     *
     * @return int
     */
    protected function saveInspectionFile($inspectionContent)
    {
        return file_put_contents(
            self::PHPSTORM_INSPECTION_DIR.
            '/'.
            self::PHPSTORM_INSPECTION_FILE,
            $inspectionContent
        );
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

    /**
     * @param string $indentContent
     *
     * @return int
     */
    protected function saveIndentFile($indentContent)
    {
        return file_put_contents(
            self::PHPSTORM_INDENT_DIR.
            '/'.
            self::PHPSTORM_INDENT_FILE,
            $indentContent
        );
    }

    /**
     * @return string
     */
    protected function getIndentPatternContent()
    {
        return file_get_contents(__DIR__.self::INDENT_PATTERN_FILE);
    }

    /**
     * @param string $indentPatternContent
     *
     * @return mixed
     */
    protected function getIndentContent($indentPatternContent)
    {
        $findPatterns = [
            '{GHERKIN}',
            '{PHP}',
            '{JS}',
            '{YML}'
        ];

        $replacePatterns = [
            $this->settings->getIndentGherkin(),
            $this->settings->getIndentPhp(),
            $this->settings->getIndentJs(),
            $this->settings->getIndentYml()
        ];

        return str_replace($findPatterns, $replacePatterns, $indentPatternContent);
    }
}
