<?php

namespace ContainerOSBO1Ro;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_H2_Bi0kService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.H2.Bi0k' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.H2.Bi0k'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\JuegoController::delete' => ['privates', '.service_locator.d4qBJN9', 'get_ServiceLocator_D4qBJN9Service', true],
            'App\\Controller\\JuegoController::edit' => ['privates', '.service_locator.d4qBJN9', 'get_ServiceLocator_D4qBJN9Service', true],
            'App\\Controller\\JuegoController::getTodas' => ['privates', '.service_locator.yYxWLqA', 'get_ServiceLocator_YYxWLqAService', true],
            'App\\Controller\\JuegoController::index' => ['privates', '.service_locator.yYxWLqA', 'get_ServiceLocator_YYxWLqAService', true],
            'App\\Controller\\JuegoController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\JuegoController::show' => ['privates', '.service_locator.RnT3SSH', 'get_ServiceLocator_RnT3SSHService', true],
            'App\\Controller\\MesaController::delete' => ['privates', '.service_locator.a0WsX_G', 'get_ServiceLocator_A0WsXGService', true],
            'App\\Controller\\MesaController::edit' => ['privates', '.service_locator.a0WsX_G', 'get_ServiceLocator_A0WsXGService', true],
            'App\\Controller\\MesaController::index' => ['privates', '.service_locator.ipSiPat', 'get_ServiceLocator_IpSiPatService', true],
            'App\\Controller\\MesaController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\MesaController::show' => ['privates', '.service_locator.i8vUD2P', 'get_ServiceLocator_I8vUD2PService', true],
            'App\\Controller\\ReservaController::delete' => ['privates', '.service_locator.hqrEWjo', 'get_ServiceLocator_HqrEWjoService', true],
            'App\\Controller\\ReservaController::edit' => ['privates', '.service_locator.hqrEWjo', 'get_ServiceLocator_HqrEWjoService', true],
            'App\\Controller\\ReservaController::index' => ['privates', '.service_locator.atZY5CF', 'get_ServiceLocator_AtZY5CFService', true],
            'App\\Controller\\ReservaController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservaController::show' => ['privates', '.service_locator.3DipYnt', 'get_ServiceLocator_3DipYntService', true],
            'App\\Controller\\RolController::delete' => ['privates', '.service_locator.1UUgBO7', 'get_ServiceLocator_1UUgBO7Service', true],
            'App\\Controller\\RolController::edit' => ['privates', '.service_locator.1UUgBO7', 'get_ServiceLocator_1UUgBO7Service', true],
            'App\\Controller\\RolController::index' => ['privates', '.service_locator.GWbKldh', 'get_ServiceLocator_GWbKldhService', true],
            'App\\Controller\\RolController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\RolController::show' => ['privates', '.service_locator.EggCzqy', 'get_ServiceLocator_EggCzqyService', true],
            'App\\Controller\\TipoMesaController::delete' => ['privates', '.service_locator._u1C5vC', 'get_ServiceLocator_U1C5vCService', true],
            'App\\Controller\\TipoMesaController::edit' => ['privates', '.service_locator._u1C5vC', 'get_ServiceLocator_U1C5vCService', true],
            'App\\Controller\\TipoMesaController::index' => ['privates', '.service_locator.y5HIvDq', 'get_ServiceLocator_Y5HIvDqService', true],
            'App\\Controller\\TipoMesaController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\TipoMesaController::show' => ['privates', '.service_locator.ksHHnsI', 'get_ServiceLocator_KsHHnsIService', true],
            'App\\Controller\\UsuarioController::delete' => ['privates', '.service_locator.aeGeJQa', 'get_ServiceLocator_AeGeJQaService', true],
            'App\\Controller\\UsuarioController::edit' => ['privates', '.service_locator.aeGeJQa', 'get_ServiceLocator_AeGeJQaService', true],
            'App\\Controller\\UsuarioController::index' => ['privates', '.service_locator.1.181F_', 'get_ServiceLocator_1_181FService', true],
            'App\\Controller\\UsuarioController::new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\UsuarioController::show' => ['privates', '.service_locator.zjjydGR', 'get_ServiceLocator_ZjjydGRService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\JuegoController:delete' => ['privates', '.service_locator.d4qBJN9', 'get_ServiceLocator_D4qBJN9Service', true],
            'App\\Controller\\JuegoController:edit' => ['privates', '.service_locator.d4qBJN9', 'get_ServiceLocator_D4qBJN9Service', true],
            'App\\Controller\\JuegoController:getTodas' => ['privates', '.service_locator.yYxWLqA', 'get_ServiceLocator_YYxWLqAService', true],
            'App\\Controller\\JuegoController:index' => ['privates', '.service_locator.yYxWLqA', 'get_ServiceLocator_YYxWLqAService', true],
            'App\\Controller\\JuegoController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\JuegoController:show' => ['privates', '.service_locator.RnT3SSH', 'get_ServiceLocator_RnT3SSHService', true],
            'App\\Controller\\MesaController:delete' => ['privates', '.service_locator.a0WsX_G', 'get_ServiceLocator_A0WsXGService', true],
            'App\\Controller\\MesaController:edit' => ['privates', '.service_locator.a0WsX_G', 'get_ServiceLocator_A0WsXGService', true],
            'App\\Controller\\MesaController:index' => ['privates', '.service_locator.ipSiPat', 'get_ServiceLocator_IpSiPatService', true],
            'App\\Controller\\MesaController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\MesaController:show' => ['privates', '.service_locator.i8vUD2P', 'get_ServiceLocator_I8vUD2PService', true],
            'App\\Controller\\ReservaController:delete' => ['privates', '.service_locator.hqrEWjo', 'get_ServiceLocator_HqrEWjoService', true],
            'App\\Controller\\ReservaController:edit' => ['privates', '.service_locator.hqrEWjo', 'get_ServiceLocator_HqrEWjoService', true],
            'App\\Controller\\ReservaController:index' => ['privates', '.service_locator.atZY5CF', 'get_ServiceLocator_AtZY5CFService', true],
            'App\\Controller\\ReservaController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservaController:show' => ['privates', '.service_locator.3DipYnt', 'get_ServiceLocator_3DipYntService', true],
            'App\\Controller\\RolController:delete' => ['privates', '.service_locator.1UUgBO7', 'get_ServiceLocator_1UUgBO7Service', true],
            'App\\Controller\\RolController:edit' => ['privates', '.service_locator.1UUgBO7', 'get_ServiceLocator_1UUgBO7Service', true],
            'App\\Controller\\RolController:index' => ['privates', '.service_locator.GWbKldh', 'get_ServiceLocator_GWbKldhService', true],
            'App\\Controller\\RolController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\RolController:show' => ['privates', '.service_locator.EggCzqy', 'get_ServiceLocator_EggCzqyService', true],
            'App\\Controller\\TipoMesaController:delete' => ['privates', '.service_locator._u1C5vC', 'get_ServiceLocator_U1C5vCService', true],
            'App\\Controller\\TipoMesaController:edit' => ['privates', '.service_locator._u1C5vC', 'get_ServiceLocator_U1C5vCService', true],
            'App\\Controller\\TipoMesaController:index' => ['privates', '.service_locator.y5HIvDq', 'get_ServiceLocator_Y5HIvDqService', true],
            'App\\Controller\\TipoMesaController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\TipoMesaController:show' => ['privates', '.service_locator.ksHHnsI', 'get_ServiceLocator_KsHHnsIService', true],
            'App\\Controller\\UsuarioController:delete' => ['privates', '.service_locator.aeGeJQa', 'get_ServiceLocator_AeGeJQaService', true],
            'App\\Controller\\UsuarioController:edit' => ['privates', '.service_locator.aeGeJQa', 'get_ServiceLocator_AeGeJQaService', true],
            'App\\Controller\\UsuarioController:index' => ['privates', '.service_locator.1.181F_', 'get_ServiceLocator_1_181FService', true],
            'App\\Controller\\UsuarioController:new' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\UsuarioController:show' => ['privates', '.service_locator.zjjydGR', 'get_ServiceLocator_ZjjydGRService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\JuegoController::delete' => '?',
            'App\\Controller\\JuegoController::edit' => '?',
            'App\\Controller\\JuegoController::getTodas' => '?',
            'App\\Controller\\JuegoController::index' => '?',
            'App\\Controller\\JuegoController::new' => '?',
            'App\\Controller\\JuegoController::show' => '?',
            'App\\Controller\\MesaController::delete' => '?',
            'App\\Controller\\MesaController::edit' => '?',
            'App\\Controller\\MesaController::index' => '?',
            'App\\Controller\\MesaController::new' => '?',
            'App\\Controller\\MesaController::show' => '?',
            'App\\Controller\\ReservaController::delete' => '?',
            'App\\Controller\\ReservaController::edit' => '?',
            'App\\Controller\\ReservaController::index' => '?',
            'App\\Controller\\ReservaController::new' => '?',
            'App\\Controller\\ReservaController::show' => '?',
            'App\\Controller\\RolController::delete' => '?',
            'App\\Controller\\RolController::edit' => '?',
            'App\\Controller\\RolController::index' => '?',
            'App\\Controller\\RolController::new' => '?',
            'App\\Controller\\RolController::show' => '?',
            'App\\Controller\\TipoMesaController::delete' => '?',
            'App\\Controller\\TipoMesaController::edit' => '?',
            'App\\Controller\\TipoMesaController::index' => '?',
            'App\\Controller\\TipoMesaController::new' => '?',
            'App\\Controller\\TipoMesaController::show' => '?',
            'App\\Controller\\UsuarioController::delete' => '?',
            'App\\Controller\\UsuarioController::edit' => '?',
            'App\\Controller\\UsuarioController::index' => '?',
            'App\\Controller\\UsuarioController::new' => '?',
            'App\\Controller\\UsuarioController::show' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\JuegoController:delete' => '?',
            'App\\Controller\\JuegoController:edit' => '?',
            'App\\Controller\\JuegoController:getTodas' => '?',
            'App\\Controller\\JuegoController:index' => '?',
            'App\\Controller\\JuegoController:new' => '?',
            'App\\Controller\\JuegoController:show' => '?',
            'App\\Controller\\MesaController:delete' => '?',
            'App\\Controller\\MesaController:edit' => '?',
            'App\\Controller\\MesaController:index' => '?',
            'App\\Controller\\MesaController:new' => '?',
            'App\\Controller\\MesaController:show' => '?',
            'App\\Controller\\ReservaController:delete' => '?',
            'App\\Controller\\ReservaController:edit' => '?',
            'App\\Controller\\ReservaController:index' => '?',
            'App\\Controller\\ReservaController:new' => '?',
            'App\\Controller\\ReservaController:show' => '?',
            'App\\Controller\\RolController:delete' => '?',
            'App\\Controller\\RolController:edit' => '?',
            'App\\Controller\\RolController:index' => '?',
            'App\\Controller\\RolController:new' => '?',
            'App\\Controller\\RolController:show' => '?',
            'App\\Controller\\TipoMesaController:delete' => '?',
            'App\\Controller\\TipoMesaController:edit' => '?',
            'App\\Controller\\TipoMesaController:index' => '?',
            'App\\Controller\\TipoMesaController:new' => '?',
            'App\\Controller\\TipoMesaController:show' => '?',
            'App\\Controller\\UsuarioController:delete' => '?',
            'App\\Controller\\UsuarioController:edit' => '?',
            'App\\Controller\\UsuarioController:index' => '?',
            'App\\Controller\\UsuarioController:new' => '?',
            'App\\Controller\\UsuarioController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}