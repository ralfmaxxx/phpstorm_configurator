<?php

namespace Phpstorm\Configurator\Configuration;

use Phpstorm\Configurator\Configuration\Config\ConfigurationFactoryInterface;
use Phpstorm\Configurator\Configuration\Config\SettingBuilderInterface;
use Phpstorm\Configurator\Configuration\Entity\Indent;
use Phpstorm\Configurator\Configuration\Entity\Inspection;
use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\Repository\Exception\CouldNotSaveFileException;
use Phpstorm\Configurator\Configuration\Repository\FileSystemRepositoryInterface;
use RuntimeException;

class Configurator
{
    private $configurationFactory;

    private $settingBuilder;

    private $fileRepository;

    public function __construct(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $this->settingBuilder = $settingBuilder;
        $this->fileRepository = $filesystemRepository;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param null|string $configurationFile
     *
     * @throws ConfigurationException
     */
    public function setUpInspections($configurationFile = null)
    {
        try {
            $setting = $this->settingBuilder->build(
                $this->configurationFactory->fromFilePath($configurationFile)
            );

            $inspectionFile = Inspection::createFromSetting($setting);

            $this->fileRepository->save($inspectionFile);
        } catch (CouldNotSaveFileException $exception) {
            throw ConfigurationException::fromException($exception);
        } catch (RuntimeException $exception) {
            throw ConfigurationException::fromException($exception);
        }
    }

    /**
     * @param null|string $configurationFile
     *
     * @throws ConfigurationException
     */
    public function setUpIndents($configurationFile = null)
    {
        try {
            $setting = $this->settingBuilder->build(
                $this->configurationFactory->fromFilePath($configurationFile)
            );

            $indentFile = Indent::createFromSetting($setting);

            $this->fileRepository->save($indentFile);
        } catch (CouldNotSaveFileException $exception) {
            throw ConfigurationException::fromException($exception);
        } catch (RuntimeException $exception) {
            throw ConfigurationException::fromException($exception);
        }
    }
}
