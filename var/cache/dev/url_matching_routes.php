<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/gestionnaire/burgers' => [[['_route' => 'burger_index', '_controller' => 'App\\Controller\\BurgerController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/gestionnaire/clients' => [[['_route' => 'client_index', '_controller' => 'App\\Controller\\ClientController::index'], null, ['GET' => 0], null, false, false, null]],
        '/gestionnaire/commandes' => [[['_route' => 'commande_index', '_controller' => 'App\\Controller\\CommandeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/gestionnaire/complements' => [[['_route' => 'complement_index', '_controller' => 'App\\Controller\\ComplementController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/gestionnaire' => [[['_route' => 'dashboard_index', '_controller' => 'App\\Controller\\DashboardController::index'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/gestionnaire/livraisons' => [[['_route' => 'livraison_board', '_controller' => 'App\\Controller\\LivraisonController::board'], null, ['GET' => 0], null, false, false, null]],
        '/gestionnaire/menus' => [[['_route' => 'menu_index', '_controller' => 'App\\Controller\\MenuController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
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
                .'|/gestionnaire/(?'
                    .'|burgers/(?'
                        .'|(\\d+)/archive(*:243)'
                        .'|(\\d+)/unarchive(*:266)'
                    .')'
                    .'|c(?'
                        .'|lients/(?'
                            .'|(\\d+)(*:294)'
                            .'|(\\d+)/commandes/(\\d+)/cancel(*:330)'
                        .')'
                        .'|om(?'
                            .'|mandes/(?'
                                .'|(\\d+)(*:359)'
                                .'|(\\d+)/cancel(*:379)'
                                .'|(\\d+)/validate(*:401)'
                                .'|(\\d+)/terminate(*:424)'
                            .')'
                            .'|plements/(?'
                                .'|(\\d+)/archive(*:458)'
                                .'|(\\d+)/unarchive(*:481)'
                            .')'
                        .')'
                    .')'
                    .'|livraisons/(?'
                        .'|(\\d+)/assign(*:518)'
                        .'|zone/(\\d+)/assign(*:543)'
                        .'|(\\d+)/terminer(*:565)'
                    .')'
                    .'|menus/(?'
                        .'|(\\d+)/archive(*:596)'
                        .'|(\\d+)/unarchive(*:619)'
                    .')'
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
        243 => [[['_route' => 'burger_archive', '_controller' => 'App\\Controller\\BurgerController::archive'], ['id'], ['POST' => 0], null, false, false, null]],
        266 => [[['_route' => 'burger_unarchive', '_controller' => 'App\\Controller\\BurgerController::unarchive'], ['id'], ['POST' => 0], null, false, false, null]],
        294 => [[['_route' => 'client_details', '_controller' => 'App\\Controller\\ClientController::details'], ['id'], ['GET' => 0], null, false, true, null]],
        330 => [[['_route' => 'client_commande_cancel', '_controller' => 'App\\Controller\\ClientController::cancelCommandeForClient'], ['idClient', 'idCommande'], ['POST' => 0], null, false, false, null]],
        359 => [[['_route' => 'commande_details', '_controller' => 'App\\Controller\\CommandeController::details'], ['id'], ['GET' => 0], null, false, true, null]],
        379 => [[['_route' => 'commande_cancel', '_controller' => 'App\\Controller\\CommandeController::cancel'], ['id'], ['POST' => 0], null, false, false, null]],
        401 => [[['_route' => 'commande_validate', '_controller' => 'App\\Controller\\CommandeController::validate'], ['id'], ['POST' => 0], null, false, false, null]],
        424 => [[['_route' => 'commande_terminate', '_controller' => 'App\\Controller\\CommandeController::terminate'], ['id'], ['POST' => 0], null, false, false, null]],
        458 => [[['_route' => 'complement_archive', '_controller' => 'App\\Controller\\ComplementController::archive'], ['id'], ['POST' => 0], null, false, false, null]],
        481 => [[['_route' => 'complement_unarchive', '_controller' => 'App\\Controller\\ComplementController::unarchive'], ['id'], ['POST' => 0], null, false, false, null]],
        518 => [[['_route' => 'livraison_assign', '_controller' => 'App\\Controller\\LivraisonController::assign'], ['idCommande'], ['POST' => 0], null, false, false, null]],
        543 => [[['_route' => 'livraison_assign_zone', '_controller' => 'App\\Controller\\LivraisonController::assignZone'], ['idZone'], ['POST' => 0], null, false, false, null]],
        565 => [[['_route' => 'livraison_terminer', '_controller' => 'App\\Controller\\LivraisonController::terminer'], ['idCommande'], ['POST' => 0], null, false, false, null]],
        596 => [[['_route' => 'menu_archive', '_controller' => 'App\\Controller\\MenuController::archive'], ['id'], ['POST' => 0], null, false, false, null]],
        619 => [
            [['_route' => 'menu_unarchive', '_controller' => 'App\\Controller\\MenuController::unarchive'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
