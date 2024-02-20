<?php

namespace ContainerQuqyDz7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_3DipYntService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.3DipYnt' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.3DipYnt'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'reserva' => ['privates', '.errored..service_locator.3DipYnt.App\\Entity\\Reserva', NULL, 'Cannot autowire service ".service_locator.3DipYnt": it needs an instance of "App\\Entity\\Reserva" but this type has been excluded in "config/services.yaml".'],
        ], [
            'reserva' => 'App\\Entity\\Reserva',
        ]);
    }
}
