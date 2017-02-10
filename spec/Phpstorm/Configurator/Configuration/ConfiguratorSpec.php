<?php

namespace spec\Phpstorm\Configurator\Configuration;

use PhpSpec\ObjectBehavior;
use Phpstorm\Configurator\Configuration\Config\Configuration;
use Phpstorm\Configurator\Configuration\Config\ConfigurationFactoryInterface;
use Phpstorm\Configurator\Configuration\Config\Indent;
use Phpstorm\Configurator\Configuration\Config\Inspection;
use Phpstorm\Configurator\Configuration\Config\Setting;
use Phpstorm\Configurator\Configuration\Config\SettingBuilderInterface;
use Phpstorm\Configurator\Configuration\Configurator;
use Phpstorm\Configurator\Configuration\Entity\Indent as IndentEntity;
use Phpstorm\Configurator\Configuration\Entity\Inspection as InspectionEntity;
use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\Repository\Exception\CouldNotSaveFileException;
use Phpstorm\Configurator\Configuration\Repository\FileSystemRepositoryInterface;
use Prophecy\Argument;
use RuntimeException;

/**
 * @mixin Configurator
 */
class ConfiguratorSpec extends ObjectBehavior
{
    const INDENT_ARRAY = [
        'php' => 4,
        'js' => 4,
        'yml' => 4,
        'gherkin' => 4,
        'json' => 4,
        'css' => 4,
        'scss' => 4,
        'html' => 4,
        'xml' => 4,
    ];

    function let(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $this->beConstructedWith($configurationFactory, $settingBuilder, $filesystemRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Configurator::class);
    }

    function it_sets_up_indents(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $configuration = new Configuration([]);

        $configurationFactory
            ->fromFilePath(null)
            ->shouldBeCalled()
            ->willReturn($configuration);

        $settingBuilder
            ->build($configuration)
            ->shouldBeCalled()
            ->willReturn($this->getSetting());

        $filesystemRepository
            ->save(Argument::type(IndentEntity::class))
            ->shouldBeCalled();

        $this->setUpIndents();
    }

    function it_throws_exception_when_repository_throws_exception_and_con_not_save_indents(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $exceptionMessage = 'Message';
        $couldNotSaveFileException = new CouldNotSaveFileException($exceptionMessage);

        $configuration = new Configuration([]);

        $configurationFactory
            ->fromFilePath(null)
            ->shouldBeCalled()
            ->willReturn($configuration);

        $settingBuilder
            ->build($configuration)
            ->shouldBeCalled()
            ->willReturn($this->getSetting());

        $filesystemRepository
            ->save(Argument::type(IndentEntity::class))
            ->shouldBeCalled()
            ->willThrow($couldNotSaveFileException);

        $this->shouldThrow(new ConfigurationException($exceptionMessage))->duringSetUpIndents();
    }

    function it_sets_up_inspections(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $configuration = new Configuration([]);

        $configurationFactory
            ->fromFilePath(null)
            ->shouldBeCalled()
            ->willReturn($configuration);

        $settingBuilder
            ->build($configuration)
            ->shouldBeCalled()
            ->willReturn($this->getSetting());

        $filesystemRepository
            ->save(Argument::type(InspectionEntity::class))
            ->shouldBeCalled();

        $this->setUpInspections();
    }

    function it_throws_exception_when_repository_throws_exception_and_con_not_save_inspections(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $exceptionMessage = 'Message';
        $couldNotSaveFileException = new CouldNotSaveFileException($exceptionMessage);

        $configuration = new Configuration([]);

        $configurationFactory
            ->fromFilePath(null)
            ->shouldBeCalled()
            ->willReturn($configuration);

        $settingBuilder
            ->build($configuration)
            ->shouldBeCalled()
            ->willReturn($this->getSetting());

        $filesystemRepository
            ->save(Argument::type(InspectionEntity::class))
            ->shouldBeCalled()
            ->willThrow($couldNotSaveFileException);

        $this->shouldThrow(new ConfigurationException($exceptionMessage))->duringSetUpInspections();
    }

    function it_throws_exception_when_configuration_factory_throws_exception(
        ConfigurationFactoryInterface $configurationFactory,
        SettingBuilderInterface $settingBuilder,
        FileSystemRepositoryInterface $filesystemRepository
    ) {
        $exceptionMessage = 'Message';
        $runtimeException = new RuntimeException($exceptionMessage);

        $configurationFactory
            ->fromFilePath(null)
            ->shouldBeCalled()
            ->willThrow($runtimeException);

        $settingBuilder
            ->build(Argument::any())
            ->shouldNotBeCalled();

        $filesystemRepository
            ->save(Argument::any())
            ->shouldNotBeCalled();

        $this->shouldThrow(new ConfigurationException($exceptionMessage))->duringSetUpIndents();
        $this->shouldThrow(new ConfigurationException($exceptionMessage))->duringSetUpInspections();
    }

    private function getSetting()
    {
        $indent = Indent::fromArray(self::INDENT_ARRAY);
        $inspection = new Inspection('phpmd.xml', 'phpcs.xml');

        return new Setting($indent, $inspection);
    }
}
