<?php
namespace MvitInvoice\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class InvoiceTable extends AbstractTableGateway {
    protected $table ='invoice';

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Invoice());
        $this->initialize();
    }

    public function fetchAll() {
        $resultSet = $this->select(function (Select $select) {
                $select->join('client', 'invoice.client_id = client.id')
                       ->order('invoice.id DESC')->limit(30);
            });

        return $resultSet;
    }

    public function getInvoice($id) {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveInvoice(Invoice $invoice) {
        $data = array(
            'number' => $invoice->number,
            'base_date' => $invoice->base_date,
            'vat' => $invoice->vat,
            'due_days' => $invoice->due_days,
            'sent_date' => $invoice->sent_date,
            'payed_date' => $invoice->payed_date,
            'client_id' => $invoice->client_id,
            'reference' => $invoice->reference,
            'text' => $invoice->text,
        );
        $id = (int)$invoice->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getInvoice($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteInvoice($id) {
        $this->delete(array('id' => $id));
    }
}

