<?php

namespace Starfruit\MaintenanceBundle\Cleanup;

use Symfony\Component\Finder\Finder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use ReflectionClass;

class ProcessCleanup implements ProcessCleanupInterface
{
    public function process(): void
    {
        $enableServices = $this->getEnableService();

        if (!empty($enableServices)) {
            $processServices = [];

            $finder = new Finder();
            $finder->files()->in(__DIR__)->name('*.php');

            foreach ($finder as $file) {
                $className = $this->getClassFullNameFromFile($file->getRealPath());

                if ($className) {
                    $reflectionClass = new ReflectionClass($className);

                    if ($reflectionClass->implementsInterface("\\Starfruit\\MaintenanceBundle\\Cleanup\\ServiceCleanupInterface") && !$reflectionClass->isAbstract()) {
                        $service = new $className;

                        if (array_key_exists($service->getName(), $enableServices)) {
                            $processServices[] = $service;
                        }
                    }
                }
            }

            if (!empty($processServices)) {
                foreach ($processServices as $service) {
                    $service->cleanup();
                }
            }
        }
    }

    private function getClassFullNameFromFile($filePath)
    {
        $content = file_get_contents($filePath);
        $namespace = '';
        $class = '';

        if (preg_match('/namespace\s+(.+);/', $content, $matches)) {
            $namespace = $matches[1];
        }

        if (preg_match('/class\s+(\w+)/', $content, $matches)) {
            $class = $matches[1];
        }

        return $namespace && $class ? $namespace . '\\' . $class : null;
    }

    private function getConfig()
    {
        $config = \Pimcore::getContainer()->getParameter('starfruit_maintenance.cleanup_services');
        return $config;
    }

    private function getEnableService()
    {
        $config = BaseCleanup::getConfig();

        if (empty($config)) {
            return [];
        }

        return array_filter($config, fn($e) => $e['enable']);
    }
}
