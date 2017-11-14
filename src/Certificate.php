<?php


namespace KissDev\ChileanVacation;


use KissDev\ChileanVacation\Contracts\Document;

class Certificate implements Document
{
    /**
     * @var int
     */
    protected $quotedYears;

    /**
     * @var \DateTime
     */
    protected $deliveryDate;

    /**
     * Certificate constructor.
     * @param int $quotedYears
     * @param string $deliveryDate
     */
    public function __construct($quotedYears = 0, string $deliveryDate = null)
    {
        $this->quotedYears = $quotedYears;
        $this->deliveryDate = ($deliveryDate) ? new \DateTime($deliveryDate) : $deliveryDate;
    }

    /**
     * @return int
     */
    public function getQuotedYears(): int
    {
        return $this->quotedYears;
    }

    /**
     * @return \DateTime
     */
    public function getDocumentDeliveryDate(): \DateTime
    {
        return $this->deliveryDate;
    }
}