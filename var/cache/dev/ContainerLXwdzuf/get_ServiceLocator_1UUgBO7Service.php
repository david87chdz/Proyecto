<?php

namespace ContainerLXwdzuf;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_1UUgBO7Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.1UUgBO7' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.1UUgBO7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'rol' => ['privates', '.errored..service_locator.1UUgBO7.App\\Entity\\Rol', NULL, 'Cannot autowire service ".service_locator.1UUgBO7": it needs an instance of "App\\Entity\\Rol" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'rol' => 'App\\Entity\\Rol',
        ]);
    }
}
