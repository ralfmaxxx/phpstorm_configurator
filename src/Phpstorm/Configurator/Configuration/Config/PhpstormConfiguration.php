<?php

namespace Phpstorm\Configurator\Configuration\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class PhpstormConfiguration implements ConfigurationInterface
{
    const DEFAULT_INDENT = 4;

    const DEFAULT_PHPMD_FILE = 'phpmd.xml';

    const DEFAULT_PHPCS_FILE = 'ruleset.xml';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('settings')->isRequired();

        $rootNode
            ->children()
                ->arrayNode('inspection')
                ->isRequired()
                    ->children()
                        ->scalarNode('phpmd')->defaultValue(self::DEFAULT_PHPMD_FILE)->end()
                        ->scalarNode('phpcs')->defaultValue(self::DEFAULT_PHPCS_FILE)->end()
                    ->end()
                ->end()
                ->arrayNode('indent')
                    ->isRequired()
                    ->children()
                        ->integerNode('php')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('js')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('gherkin')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('yml')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('json')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('css')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('scss')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('html')->defaultValue(self::DEFAULT_INDENT)->end()
                        ->integerNode('xml')->defaultValue(self::DEFAULT_INDENT)->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
