<?php

namespace ContainerWvx83dL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_GWbKldhService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.GWbKldh' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.GWbKldh'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'rolRepository' => ['privates', 'App\\Repository\\RolRepository', 'getRolRepositoryService', true],
        ], [
            'rolRepository' => 'App\\Repository\\RolRepository',
        ]);
    }
}
