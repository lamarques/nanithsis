<?php
namespace Patrimonio;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'patrimonio' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/patrimonio[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'funcionarios' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/funcionarios[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FuncionariosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'equipamentos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/equipamentos[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\EquipamentosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Patrimonio_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'Patrimonio\Entity' => 'Patrimonio_driver'
                ]
            ]
        ],
        'fixtures' => [
            'PatrimonioFixture' => __DIR__ . '/../src/Fixture'
        ]
    ]
];
