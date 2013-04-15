<?php
namespace MvitInvoice\Form;

use MvitInvoice\Entity\Row;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\Form\Element\Checkbox;

class RowFieldset extends Fieldset implements InputFilterProviderInterface {
    public function __construct() {
        parent::__construct('row');
        $this->setHydrator(new ClassMethodsHydrator(false))->setObject(new Row());

        $this->setLabel('');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'invoiceId',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'type'  => 'Zend\Form\Element\Checkbox',
            'name' => 'work',
            'attributes' => array(
                'class' => 'work',
            ),
        ));

        $this->add(array(
            'name' => 'price',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'price',
            ),
        ));

        $this->add(array(
            'name' => 'vat',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'vat',
            ),
        ));

        $this->add(array(
            'name' => 'quantity',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'quantity',
            ),
        ));

        $this->add(array(
            'name' => 'text',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'text',
            ),
        ));

        $this->add(array(
            'name' => 'delete',
            'attributes' => array(
                'type'  => 'button',
                'value' => 'Delete',
                'class' => 'delete',
                'onclick' => 'return del_row(this)',
            ),
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

            'invoiceId' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'price' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'vat' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'quantity' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            'text' => array(
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

            'work' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),
        );
    }
}
