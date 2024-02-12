<?php

namespace ContainerCV58Hm0;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Y5HIvDqService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.y5HIvDq' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.y5HIvDq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'tipoMesaRepository' => ['privates', 'App\\Repository\\TipoMesaRepository', 'getTipoMesaRepositoryService', true],
        ], [
            'tipoMesaRepository' => 'App\\Repository\\TipoMesaRepository',
        ]);
    }
}
