<?php

declare(strict_types=1);

namespace Ssch\Typo3DebugDumpPass\DependencyInjection;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\XmlDumper;
use TYPO3\CMS\Core\Core\Environment;

final class ContainerBuilderDebugDumpPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $environment = $this->resolveEnvironmentName();
        $cache = new ConfigCache(Environment::getVarPath() . '/cache/' . strtolower($environment) . '/App_Kernel' . $environment . 'DebugContainer.xml', true);
        if (!$cache->isFresh()) {
            $cache->write((new XmlDumper($container))->dump(), $container->getResources());
        }
    }

    private function resolveEnvironmentName(): string
    {
        if (Environment::getContext()->isProduction()) {
            return 'Production';
        }

        if (Environment::getContext()->isDevelopment()) {
            return 'Development';
        }

        if (Environment::getContext()->isTesting()) {
            return 'Testing';
        }

        throw new \UnexpectedValueException('No context given');
    }
}
