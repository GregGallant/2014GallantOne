<?php
namespace Auth;

return array(
    'controllers' => array(
        'invokables' => array(
            'Auth\Controller\Auth' => 'Auth\Controller\AuthController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/login',
                    'constraints' => array( ),
                    'defaults' => array(
                        'controller' => 'Auth\Controller\Auth',
                        'action' => 'login',
                    ),
                ),
            ),
            'register' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/register',
                    'constraints' => array( ),
                    'defaults' => array(
                        'controller' => 'Auth\Controller\Auth',
                        'action' => 'register',
                    ),
                ),
            ),
            'success' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/success',
                    'constraints' => array( ),
                    'defaults' => array(
                        'controller' => 'Auth\Controller\Auth',
                        'action' => 'success',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'auth' => __DIR__ . '/../view',
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
