<?php

namespace ContainerWvx83dL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EggCzqyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.EggCzqy' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.EggCzqy'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'rol' => ['privates', '.errored..service_locator.EggCzqy.App\\Entity\\Rol', NULL, 'Cannot autowire service ".service_locator.EggCzqy": it needs an instance of "App\\Entity\\Rol" but this type has been excluded in "config/services.yaml".'],
        ], [
            'rol' => 'App\\Entity\\Rol',
        ]);
    }
}
