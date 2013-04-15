<?php

namespace MvitInvoice\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class InvoiceForm extends Form {
    public function __construct() {
        parent::__construct('invoiceform');

        $this->setAttribute('method', 'post')
             ->setHydrator(new ClassMethodsHydrator(false))
             ->setInputFilter(new InputFilter());

        $this->add(array(
            'type' => 'MvitInvoice\Form\InvoiceFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send'
            )
        ));

        $this->setValidationGroup(array(
            'csrf',
            'invoice' => array(
                'id',
                'number',
                'baseDate',
                'dueDays',
                'sentDate',
                'payedDate',
                'clientId',
                'reference',
                'text',
                'rows' => array(
                    'id',
                    'invoiceId',
                    'price',
                    'vat',
                    'quantity',
                    'text',
                    'work',
                )
            )
        ));
    }
}
