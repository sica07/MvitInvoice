<?php
namespace MvitInvoice\Form;

use MvitInvoice\Entity\Invoice;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;


class InvoiceFieldset extends Fieldset implements InputFilterProviderInterface {
    public function __construct() {
        parent::__construct('invoice');
        $this->setHydrator(new ClassMethodsHydrator(false))->setObject(new Invoice());

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'number',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Number',
            ),
        ));

        $this->add(array(
            'name' => 'baseDate',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Date created',
            ),
        ));

        $this->add(array(
            'name' => 'dueDays',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Credit days',
            ),
        ));

        $this->add(array(
            'name' => 'sentDate',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Date sent',
            ),
        ));

        $this->add(array(
            'name' => 'payedDate',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Date payed',
            ),
        ));

        $this->add(array(
            'name' => 'clientId',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Client id',
            ),
        ));

        $this->add(array(
            'name' => 'reference',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Reference',
            ),
        ));

        $this->add(array(
            'name' => 'text',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Text',
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

        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'rows',
            'options' => array(
                'label' => 'Invoice rows',
                'count' => 1,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'MvitInvoice\Form\RowFieldset'
                )
            )
        ));
    }

    /**
     * @return array
    \*/
    public function getInputFilterSpecification() {
        return array(
            'id' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'number' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'baseDate' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 10,
                        ),
                    ),
                ),
            ),

            'dueDays' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'sentDate' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 10,
                        ),
                    ),
                ),
            ),

            'payedDate' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 10,
                        ),
                    ),
                ),
            ),

            'clientId' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'reference' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ),

            'text' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 0,
                            'max'      => 200,
                        ),
                    ),
                ),
            ),
        );
    }
}
