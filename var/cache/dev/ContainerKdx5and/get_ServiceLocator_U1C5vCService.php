<?php

namespace ContainerKdx5and;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_U1C5vCService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator._u1C5vC' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator._u1C5vC'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'tipoMesa' => ['privates', '.errored..service_locator._u1C5vC.App\\Entity\\TipoMesa', NULL, 'Cannot autowire service ".service_locator._u1C5vC": it needs an instance of "App\\Entity\\TipoMesa" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'tipoMesa' => 'App\\Entity\\TipoMesa',
        ]);
    }
}
