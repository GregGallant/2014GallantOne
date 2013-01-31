<?php
namespace Admin;

return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
        ),
    ),

    'router' => array(
        'routes' => array(
            // Main Admin page
            'admin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/[:slug]',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Admin',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                /*
                'child_routes' => array(
                    // Segment route for viewing one blog post
                    'phpinfo' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/[:slug]',
                            'constraints' => array(
                                'slug' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            )
                        )
                    ),
                */
                    // Literal admin static pages
                    /*
                    'typography' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/',
                            'constraints' => '[A-Za-z0-9]+',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Admin',
                                'action' => 'index',
                            )
                        )
                    )
                ),
                    */
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
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