<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/juego' => [[['_route' => 'app_juego_index', '_controller' => 'App\\Controller\\JuegoController::index'], null, ['GET' => 0], null, true, false, null]],
        '/juego/insertarJuego' => [[['_route' => 'insertarJuego', '_controller' => 'App\\Controller\\JuegoController::insertarJuego'], null, ['POST' => 0], null, false, false, null]],
        '/juego/getJuegos' => [[['_route' => 'getJuegos', '_controller' => 'App\\Controller\\JuegoController::getTodas'], null, ['GET' => 0], null, false, false, null]],
        '/juego/new' => [[['_route' => 'app_juego_new', '_controller' => 'App\\Controller\\JuegoController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/mesa' => [[['_route' => 'app_mesa_index', '_controller' => 'App\\Controller\\MesaController::index'], null, ['GET' => 0], null, true, false, null]],
        '/mesa/getMesas' => [[['_route' => 'getMesas', '_controller' => 'App\\Controller\\MesaController::getMesas'], null, ['GET' => 0], null, false, false, null]],
        '/mesa/new' => [[['_route' => 'app_mesa_new', '_controller' => 'App\\Controller\\MesaController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/reserva' => [[['_route' => 'app_reserva_index', '_controller' => 'App\\Controller\\ReservaController::index'], null, ['GET' => 0], null, true, false, null]],
        '/reserva/buscarReserva' => [[['_route' => 'buscarReserva', '_controller' => 'App\\Controller\\ReservaController::buscarReserva'], null, ['POST' => 0], null, false, false, null]],
        '/reserva/listado' => [[['_route' => 'app_reserva_listado', '_controller' => 'App\\Controller\\ReservaController::listado'], null, ['GET' => 0], null, false, false, null]],
        '/reserva/new' => [[['_route' => 'app_reserva_new', '_controller' => 'App\\Controller\\ReservaController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/rol' => [[['_route' => 'app_rol_index', '_controller' => 'App\\Controller\\RolController::index'], null, ['GET' => 0], null, true, false, null]],
        '/rol/new' => [[['_route' => 'app_rol_new', '_controller' => 'App\\Controller\\RolController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tipo/mesa' => [[['_route' => 'app_tipo_mesa_index', '_controller' => 'App\\Controller\\TipoMesaController::index'], null, ['GET' => 0], null, true, false, null]],
        '/tipo/mesa/new' => [[['_route' => 'app_tipo_mesa_new', '_controller' => 'App\\Controller\\TipoMesaController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/usuario' => [[['_route' => 'app_usuario_index', '_controller' => 'App\\Controller\\UsuarioController::index'], null, ['GET' => 0], null, true, false, null]],
        '/usuario/buscarUsuario' => [[['_route' => 'buscarUsuario', '_controller' => 'App\\Controller\\UsuarioController::buscarUsuario'], null, ['POST' => 0], null, false, false, null]],
        '/usuario/crearUsuario' => [[['_route' => 'crearUsuario', '_controller' => 'App\\Controller\\UsuarioController::crearUsuario'], null, ['POST' => 0], null, false, false, null]],
        '/usuario/new' => [[['_route' => 'app_usuario_new', '_controller' => 'App\\Controller\\UsuarioController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/juego/([^/]++)(?'
                    .'|(*:220)'
                    .'|/edit(*:233)'
                    .'|(*:241)'
                .')'
                .'|/mesa/([^/]++)(?'
                    .'|(*:267)'
                    .'|/edit(*:280)'
                    .'|(*:288)'
                .')'
                .'|/r(?'
                    .'|eserva/([^/]++)(?'
                        .'|(*:320)'
                        .'|/edit(*:333)'
                        .'|(*:341)'
                    .')'
                    .'|ol/([^/]++)(?'
                        .'|(*:364)'
                        .'|/edit(*:377)'
                        .'|(*:385)'
                    .')'
                .')'
                .'|/tipo/mesa/([^/]++)(?'
                    .'|(*:417)'
                    .'|/edit(*:430)'
                    .'|(*:438)'
                .')'
                .'|/usuario/([^/]++)(?'
                    .'|(*:467)'
                    .'|/edit(*:480)'
                    .'|(*:488)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        220 => [[['_route' => 'app_juego_show', '_controller' => 'App\\Controller\\JuegoController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        233 => [[['_route' => 'app_juego_edit', '_controller' => 'App\\Controller\\JuegoController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        241 => [[['_route' => 'app_juego_delete', '_controller' => 'App\\Controller\\JuegoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        267 => [[['_route' => 'app_mesa_show', '_controller' => 'App\\Controller\\MesaController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        280 => [[['_route' => 'app_mesa_edit', '_controller' => 'App\\Controller\\MesaController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        288 => [[['_route' => 'app_mesa_delete', '_controller' => 'App\\Controller\\MesaController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        320 => [[['_route' => 'app_reserva_show', '_controller' => 'App\\Controller\\ReservaController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        333 => [[['_route' => 'app_reserva_edit', '_controller' => 'App\\Controller\\ReservaController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        341 => [[['_route' => 'app_reserva_delete', '_controller' => 'App\\Controller\\ReservaController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        364 => [[['_route' => 'app_rol_show', '_controller' => 'App\\Controller\\RolController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        377 => [[['_route' => 'app_rol_edit', '_controller' => 'App\\Controller\\RolController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        385 => [[['_route' => 'app_rol_delete', '_controller' => 'App\\Controller\\RolController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        417 => [[['_route' => 'app_tipo_mesa_show', '_controller' => 'App\\Controller\\TipoMesaController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        430 => [[['_route' => 'app_tipo_mesa_edit', '_controller' => 'App\\Controller\\TipoMesaController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        438 => [[['_route' => 'app_tipo_mesa_delete', '_controller' => 'App\\Controller\\TipoMesaController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        467 => [[['_route' => 'app_usuario_show', '_controller' => 'App\\Controller\\UsuarioController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        480 => [[['_route' => 'app_usuario_edit', '_controller' => 'App\\Controller\\UsuarioController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        488 => [
            [['_route' => 'app_usuario_delete', '_controller' => 'App\\Controller\\UsuarioController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
