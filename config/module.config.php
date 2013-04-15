<?php
namespace MvitInvoice;

return array(
    'controllers' => array(
        'invokables' => array(
            'MvitInvoice\Controller\Invoice' => 'MvitInvoice\Controller\InvoiceController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'mvitinvoice' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/invoice[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MvitInvoice\Controller\Invoice',
                        'action'     => 'index',
                    ),
                ),
            ),
            'paginator' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/invoice/[page/:page]',
                    'defaults' => array(
                        'page' => 1,
                        'controller' => 'MvitInvoice\Controller\Invoice',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'mvit-invoice' => __DIR__ . '/../view',
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
                ),
            ),
        ),
    ),
);
