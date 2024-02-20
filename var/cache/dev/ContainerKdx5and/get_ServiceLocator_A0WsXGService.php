<?php

namespace ContainerKdx5and;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_A0WsXGService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.a0WsX_G' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.a0WsX_G'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'mesa' => ['privates', '.errored..service_locator.a0WsX_G.App\\Entity\\Mesa', NULL, 'Cannot autowire service ".service_locator.a0WsX_G": it needs an instance of "App\\Entity\\Mesa" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'mesa' => 'App\\Entity\\Mesa',
        ]);
    }
}
