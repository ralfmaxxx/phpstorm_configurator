<?php

namespace Phpstorm\Configurator\Command;

use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\Configurator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigureInspectionsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('configure:inspections')
            ->setDescription('Configure PphStorm inspection based on phpstorm.yml');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $configuration = new Configurator('phpstorm.yml');
            if ($configuration->setUpInspections()) {
                $output->writeln('Inspections are imported.');
            }
        } catch (ConfigurationException $e) {
            $output->writeln($e->getMessage());
        }
    }
}
