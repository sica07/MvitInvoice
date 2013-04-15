<?php
namespace MvitInvoice\Form;

use Zend\Form\Form;

class InvoiceRowForm extends Form {
    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct('invoice');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'invoice',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'price',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Price',
            ),
        ));

        $this->add(array(
            'name' => 'count',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Count',
            ),
        ));

        $this->add(array(
            'name' => 'text',
            'attributes' => array(
                'type'  => 'hidden',
            ),
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Text',
            ),
        ));

        $this->add(array(
            'name' => 'work',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Work',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
