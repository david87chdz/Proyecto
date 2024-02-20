<?php

namespace Container2cs75b5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_AeGeJQaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aeGeJQa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aeGeJQa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'usuario' => ['privates', '.errored..service_locator.aeGeJQa.App\\Entity\\Usuario', NULL, 'Cannot autowire service ".service_locator.aeGeJQa": it needs an instance of "App\\Entity\\Usuario" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'usuario' => 'App\\Entity\\Usuario',
        ]);
    }
}
