<?php

namespace MvitInvoice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A invoice.
 *
 * @ORM\Entity
 * @ORM\Table(name="MVIT_ADM__Invoices")
 */
class Invoice {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="I_Id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="I_Number")
     */
    protected $number;

    /**
     * @ORM\Column(type="integer", name="I_BaseDate")
     */
    protected $baseDate;

    /**
     * @ORM\Column(type="integer", name="I_DueDays")
     */
    protected $dueDays;

    /**
     * @ORM\Column(type="integer", name="I_SentDate")
     */
    protected $sentDate;

    /**
     * @ORM\Column(type="integer", name="I_PayedDate")
     */
    protected $payedDate;

    /**
     * @ORM\Column(type="integer", name="I_ClientId")
     */
    protected $clientId;

    /**
     * @ORM\Column(type="integer", name="I_Reference")
     */
    protected $reference;

    /**
     * @ORM\Column(type="integer", name="I_Text")
     */
    protected $text;

    /**
     * @ORM\OneToMany(targetEntity="Row", mappedBy="invoice" ,cascade={"persist"})
     */
    protected $rows;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="invocies")
     * @ORM\JoinColumn(name="I_ClientId", referencedColumnName="C_Id")
     */
    protected $client;

    public function __construct() {
        $this->rows = new \Doctrine\Common\Collections\ArrayCollection();
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
     */
    public function setId($id) {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * Set number.
     *
     * @param int $number
     */
    public function setNumber($number) {
        $this->number = (int) $number;
        return $this;
    }

    /**
     * Get baseDate.
     *
     * @return string
     */
    public function getBaseDate() {
        return $this->baseDate;
    }

    /**
     * Set baseDate.
     *
     * @param string $basedate
     */
    public function setBaseDate($baseDate) {
        $this->baseDate = (string) $baseDate;
        return $this;
    }

    /**
     * Get dueDays.
     *
     * @return int
     */
    public function getDueDays() {
        return $this->dueDays;
    }

    /**
     * Set dueDays.
     *
     * @param int $dueDays
     */
    public function setDueDays($dueDays) {
        $this->dueDays = (int) $dueDays;
        return $this;
    }

    /**
     * Get sentDate.
     *
     * @return string
     */
    public function getSentDate() {
        return $this->sentDate;
    }

    /**
     * Set sentDate.
     *
     * @param string $sentDate
     */
    public function setSentDate($sentDate) {
        $this->sentDate = (string) $sentDate;
        return $this;
    }

    /**
     * Get payedDate.
     *
     * @return string
     */
    public function getPayedDate() {
        return $this->payedDate;
    }

    /**
     * Set payedDate.
     *
     * @param string $payedDate
     */
    public function setPayedDate($payedDate) {
        $this->payedDate = (string) $payedDate;
        return $this;
    }

    /**
     * Get clientId.
     *
     * @return int
     */
    public function getClientId() {
        return $this->clientId;
    }

    /**
     * Set clientId.
     *
     * @param int $clientId
     */
    public function setClientId($clientId) {
        $this->clientId = (int) $clientId;
        return $this;
    }

    /**
     * Get clientName.
     *
     * @return string
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Set clientName.
     *
     * @param string $clientName
     */
    public function setClient($client) {
        $this->client = $client;
        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference() {
        return $this->reference;
    }

    /**
     * Set reference.
     *
     * @param string $reference
     */
    public function setReference($reference) {
        $this->reference = (string) $reference;
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
     * Get rows.
     *
     * @return array
     */
    public function getRows() {
        return $this->rows;
    }

    /**
     * Set rows.
     *
     * @param array $rows
     */
    public function setRows($rows) {
        $this->rows = $rows;
        return $this;
    }
}
