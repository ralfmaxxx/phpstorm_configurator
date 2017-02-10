<?php

namespace Phpstorm\Configurator\Command;

use Phpstorm\Configurator\Configuration\Exception\ConfigurationException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigureIndentsCommand extends AbstractPhpstormCommand
{
    const COMMAND_NAME = 'configure:indents';
    const COMMAND_DESCRIPTION = 'Configure PphStorm indents based on phpstorm.yml';

    const SUCCESS_MESSAGE = 'Indents are imported.';

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            if (!$this->hasInitializationError()) {
                $this->getConfiguration()->setUpIndents(self::PHPSTORM_YML_NAME);
                $output->writeln(self::SUCCESS_MESSAGE);

                return self::SUCCESS_EXIT_CODE;
            }

            $output->writeln($this->getInitializationError());
        } catch (ConfigurationException $exception) {
            $output->writeln($exception->getMessage());
        }
    }
}
