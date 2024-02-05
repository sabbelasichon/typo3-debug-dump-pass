<?php

declare(strict_types=1);

use Ssch\Typo3DebugDumpPass\DependencyInjection\ContainerBuilderDebugDumpPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container, ContainerBuilder $containerBuilder) {
    $containerBuilder->addCompilerPass(new ContainerBuilderDebugDumpPass(), PassConfig::TYPE_BEFORE_REMOVING, -255);
};
