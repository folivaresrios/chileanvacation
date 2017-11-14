<?php


namespace KissDev\ChileanVacation\Contracts;

/**
 * Interface Document
 * @package KissDev\ChileanVacation\Contracts
 */
interface Document
{
    /**
     * @return int
     */
    public function getQuotedYears(): int;

    /**
     * @return \DateTime
     */
    public function getDocumentDeliveryDate(): \DateTime;
}