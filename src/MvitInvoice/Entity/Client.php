<?php

namespace MvitInvoice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A client.
 *
 * @ORM\Entity
 * @ORM\Table(name="MVIT_ADM__Clients")
 */
class Client {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="C_Id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="C_Name")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", name="C_PaymentTerms")
     */
    protected $paymentterms;

    /**
     * @ORM\Column(type="integer", name="C_Reference")
     */
    protected $reference;

    /**
     * @ORM\Column(type="integer", name="C_Orgnr")
     */
    protected $orgnr;

    /**
     * @ORM\Column(type="string", name="C_OrgType")
     */
    protected $orgtype;

    /**
     * @ORM\Column(type="integer", name="C_Updated")
     */
    protected $updated;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="client")
     **/
    private $invoices;

    public function __construct() {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return RowInterface
     */
    public function setId($id) {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Get name.
     *
     * @return int
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param int $name
     * @return RowInterface
     */
    public function setName($name) {
        $this->name = (string) $name;
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
     * @return RowInterface
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
     * @return RowInterface
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
     * @return RowInterface
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
     * @return RowInterface
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
     * @return RowInterface
     */
    public function setWork($work) {
        $this->work = (int) $work;
        return $this;
    }
}
