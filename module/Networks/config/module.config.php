<?php
namespace Networks;

return array(
    'controllers' => array(
        'invokables' => array(
            'Networks\Controller\Networks' => 'Networks\Controller\NetworksController',
        ),
    ),

    'router' => array(
        'routes' => array(
            // Main Networks page
            'networks' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/networks',
                    'defaults' => array(
                        'controller' => 'Networks\Controller\Networks',
                        'action' => 'index',
                    ),
                ),
            ),
            'design' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/networks/[:slug]',
                    'defaults' => array(
                        'controller' => 'Networks\Controller\Networks',
                        'action' => 'design',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'networks' => __DIR__ . '/../view',
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
            'Networks_driver_gallantmedia' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Networks/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),
            'orm_gallantmedia' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    'Networks\Entity' => 'Networks_driver_gallantmedia'
                )
            ),
        )
    ),

);