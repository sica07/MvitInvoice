<?php
namespace MvitInvoice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MvitInvoice\Entity\Invoice;
use MvitInvoice\Entity\Row;
use MvitInvoice\Form\InvoiceForm;
use MvitInvoice\Form\InvoiceRowForm;
use Doctrine\ORM\EntityManager;

class InvoiceController extends AbstractActionController {
    /**            
     * @var Doctrine\ORM\EntityManager
     */                
    protected $em;

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function addrowAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $invoicerow = new InvoiceRow();
        $data = array('invoice' => $id);
        $invoicerow->exchangeArray($data);

        $this->getInvoiceRowTable()->saveRow($invoicerow);
        return $this->redirect()->toRoute('mvitinvoice', array(
            'action' => 'edit', 'id' => $id
        ));
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('mvitinvoice', array(
                'action' => 'add'
            ));
        }

        $form = new InvoiceForm();
        $invoice = $this->getEntityManager()->getRepository('MvitInvoice\Entity\Invoice')->find($id);
        $form->bind($invoice);
        $form->get('submit')->setAttribute('value', 'Edit');

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
#var_dump($invoice->getRows());
				$this->getEntityManager()->persist($invoice);
				$this->getEntityManager()->flush();
            } else {
                echo "not valid!";
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function indexAction() {
		return new ViewModel(array(
			'invoices' => $this->getEntityManager()->getRepository('MvitInvoice\Entity\Invoice')->findBy(array(), array('id' => 'DESC'), 10, 0),
		));
        return new ViewModel(array(
            'invoices' => $this->getInvoiceTable()->fetchAll(),
        ));
    }
}
