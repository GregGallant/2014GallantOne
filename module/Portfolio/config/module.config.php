<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Portfolio\Controller\Portfolio' => 'Portfolio\Controller\PortfolioController',
        ),
    ),

    'router' => array(
        'routes' => array(
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
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'portfolio' => __DIR__ . '/../view',
        ),
    ),
);