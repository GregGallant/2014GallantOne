<?php
namespace Photography;

return array(
    'controllers' => array(
        'invokables' => array(
            'Photography\Controller\Photography' => 'Photography\Controller\PhotographyController',
        ),
    ),

    'router' => array(
        'routes' => array(
            // Main Photography page
            'photography' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/photography[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Photography\Controller\Photography',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'photography' => __DIR__ . '/../view',
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