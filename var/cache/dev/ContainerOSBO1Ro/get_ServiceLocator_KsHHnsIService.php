<?php

namespace ContainerOSBO1Ro;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KsHHnsIService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.ksHHnsI' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ksHHnsI'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'tipoMesa' => ['privates', '.errored..service_locator.ksHHnsI.App\\Entity\\TipoMesa', NULL, 'Cannot autowire service ".service_locator.ksHHnsI": it needs an instance of "App\\Entity\\TipoMesa" but this type has been excluded in "config/services.yaml".'],
        ], [
            'tipoMesa' => 'App\\Entity\\TipoMesa',
        ]);
    }
}
