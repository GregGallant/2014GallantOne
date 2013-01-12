<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Portfolio\Controller\Portfolio' => 'Portfolio\Controller\PortfolioController',
        ),
    ),

    'router' => array(
        'routes' => array(
            // Main Portfolio page
            'portfolio' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/portfolio[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Portfolio\Controller\Portfolio',
                        'action' => 'index',
                    ),
                ),
            ),
            // LightBox portLayout Route
            'light' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/light[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Portfolio\Controller\Portfolio',
                        'action' => 'light',
                    ),
                ),
            ),
            // PortScreen Controls
            'portcontrol' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/portcontrol[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Portfolio\Controller\Portfolio',
                        'action' => 'portcontrol',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'portfolio' => __DIR__ . '/../view',
        ),
    ),
);