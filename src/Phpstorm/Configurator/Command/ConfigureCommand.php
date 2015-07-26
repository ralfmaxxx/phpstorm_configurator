<?php

namespace Phpstorm\Configurator\Command;

use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Phpstorm\Configurator\Configuration\Configurator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigureCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('configure')
            ->setDescription('Configure PphStorm based on phpstorm.yml');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $configuration = new Configurator('phpstorm.yml');
            $configuration->setUpProject();
        } catch (ConfigurationException $e) {
            $output->writeln($e->getMessage());
        }
    }
}
