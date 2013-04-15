<?php

namespace MvitInvoice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A invoicerow.
 *
 * @ORM\Entity
 * @ORM\Table(name="MVIT_ADM__InvoiceRows")
 */
class Row {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="IR_Id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="IR_InvoiceId")
     */
    protected $invoiceId;

    /**
     * @ORM\Column(type="integer", name="IR_Price")
     */
    protected $price;

    /**
     * @ORM\Column(type="integer", name="IR_Vat")
     */
    protected $vat;

    /**
     * @ORM\Column(type="integer", name="IR_Quantity")
     */
    protected $quantity;

    /**
     * @ORM\Column(type="string", name="IR_Text")
     */
    protected $text;

    /**
     * @ORM\Column(type="integer", name="IR_Work")
     */
    protected $work;

    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="rows")
     * @ORM\JoinColumn(name="IR_InvoiceId", referencedColumnName="I_Id")
     **/
    private $invoice;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get invoiceId.
     *
     * @return int
     */
    public function getInvoiceId() {
        return $this->invoiceId;
    }

    /**
     * Set invoiceId.
     *
     * @param int $invoiceId
     */
    public function setInvoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * Get price.
     *
     * @return int
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set price.
     *
     * @param int $price
     */
    public function setPrice($price) {
        $this->price = (int) $price;
        return $this;
    }

    /**
     * Get VAT.
     *
     * @return int
     */
    public function getVat() {
        return $this->vat;
    }

    /**
     * Set VAT.
     *
     * @param int $vat
     */
    public function setVat($vat) {
        $this->vat = (int) $vat;
        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = (int) $quantity;
        return $this;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set text.
     *
     * @param string $text
     */
    public function setText($text) {
        $this->text = (string) $text;
        return $this;
    }

    /**
     * Get work.
     *
     * @return int
     */
    public function getWork() {
        return $this->work;
    }

    /**
     * Set work.
     *
     * @param int $work
     */
    public function setWork($work) {
        $this->work = (int) $work;
        return $this;
    }

    /**
     * Get invoice.
     *
     * @return int
     */
    public function getInvoice() {
        return $this->invoice;
    }

    /**
     * Set invoice.
     *
     * @param int $invoice
     */
    public function setInvoice($invoice) {
        $this->invoice[] = $invoice;
        return $this;
    }

}
