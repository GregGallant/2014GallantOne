<?php
namespace Clients;

return array(
    'controllers' => array(
        'invokables' => array(
            'Clients\Controller\Clients' => 'Clients\Controller\ClientsController',
        ),
    ),

    'router' => array(
        'routes' => array(
            // Main Clients page
            'clients' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/clients[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clients\Controller\Clients',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'clients' => __DIR__ . '/../view',
        ),
    ),
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);