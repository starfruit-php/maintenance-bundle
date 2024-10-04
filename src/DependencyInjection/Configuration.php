<?php

namespace Starfruit\MaintenanceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('starfruit_maintenance');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('cleanup_services')
                    ->children()
                        ->arrayNode('log_data')
                            ->children()
                                ->booleanNode('enable')
                                    ->info('Yes or no that run service')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('output_cache')
                            ->children()
                                ->booleanNode('enable')
                                    ->info('Yes or no that run service')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('recycle_bin')
                            ->children()
                                ->booleanNode('enable')
                                    ->info('Yes or no that run service')
                                    ->defaultFalse()
                                ->end()
                                ->integerNode('max_days')
                                    ->info('Days to keep records in recycle bin')
                                    ->min(7)
                                    ->defaultValue(60)
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('temporary_file')
                            ->children()
                                ->booleanNode('enable')
                                    ->info('Yes or no that run service')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('version')
                            ->children()
                                ->booleanNode('enable')
                                    ->info('Yes or no that run service')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
