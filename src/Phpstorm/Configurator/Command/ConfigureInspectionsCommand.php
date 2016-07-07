<?php

namespace Phpstorm\Configurator\Command;

use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\Configurator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigureInspectionsCommand extends Command implements PhpstormCommandInterface
{
    const COMMAND_NAME = 'configure:inspections';
    const COMMAND_DESCRIPTION = 'Configure PphStorm inspection based on phpstorm.yml';

    const SUCCESS_MESSAGE = 'Inspections are imported.';

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $configuration = new Configurator(self::PHPSTORM_YML_NAME);
            if ($configuration->setUpInspections()) {
                $output->writeln(self::SUCCESS_MESSAGE);
            }
        } catch (ConfigurationException $e) {
            $output->writeln($e->getMessage());
        }
    }
}
