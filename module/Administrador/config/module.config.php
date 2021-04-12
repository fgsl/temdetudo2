<?php

namespace Administrador;

use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Router\Http\Segment;
use Administrador\Model\ProdutoTable;
use Administrador\Model\ProdutoTableFactory;

return [
    'router' => [
        'routes' => [
            'admin' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:controller[/:action]]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'produto' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/produto[/:action]',
                    'defaults' => [
                        'controller' => Controller\ProdutoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],            
        ],
    ],
    'controllers' => [
        'aliases' => [
            'index' => Controller\IndexController::class,
            'produto' => Controller\ProdutoController::class
        ],
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\ProdutoController::class => InvokableFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'application/index/index' => __DIR__ . '/../view/cliente/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        ProdutoTable::class => ProdutoTableFactory::class        
    ]
];

