<?php

namespace Container2cs75b5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_IpSiPatService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.ipSiPat' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ipSiPat'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'mesaRepository' => ['privates', 'App\\Repository\\MesaRepository', 'getMesaRepositoryService', true],
        ], [
            'mesaRepository' => 'App\\Repository\\MesaRepository',
        ]);
    }
}
