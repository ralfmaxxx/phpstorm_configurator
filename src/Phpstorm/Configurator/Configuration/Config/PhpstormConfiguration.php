<?php

namespace Phpstorm\Configurator\Configuration\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class PhpstormConfiguration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('settings')->isRequired();

        $rootNode
            ->children()
                ->arrayNode('inspection')
                ->isRequired()
                    ->children()
                        ->scalarNode('phpmd')->defaultValue('phpmd.xml')->end()
                        ->scalarNode('phpcs')->defaultValue('ruleset.xml')->end()
                    ->end()
                ->end()
                ->arrayNode('indent')
                    ->isRequired()
                    ->children()
                        ->integerNode('php')->defaultValue(4)->end()
                        ->integerNode('js')->defaultValue(4)->end()
                        ->integerNode('gherkin')->defaultValue(4)->end()
                        ->integerNode('yml')->defaultValue(4)->end()
                        ->integerNode('json')->defaultValue(4)->end()
                        ->integerNode('css')->defaultValue(4)->end()
                        ->integerNode('scss')->defaultValue(4)->end()
                        ->integerNode('html')->defaultValue(4)->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
