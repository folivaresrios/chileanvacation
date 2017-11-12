<?php

namespace KissDev\ChileanVacation\Contracts;


/**
 * Interface NaturalPerson
 * @package Contracts
 */
/**
 * Interface NaturalPerson
 * @package KissDev\Vacation\Contracts
 */
interface NaturalPerson
{
    /**
     * @return \DateTime
     */
    public function getStartDateJob() : \DateTime;

    /**
     * @return \DateTime
     */
    public function getEndDateJob(): \DateTime;

    /**
     * @return array
     */
    public function getVacationsDaysTaken(): array;
    /**
     * @return array
     */
    public function getCountVacationsDaysTaken(): int;

    /**
     * @return array
     */
    public function getProgressiveDaysTaken(): array;
    /**
     * @return array
     */
    public function getCountProgressiveDaysTaken(): int;

    /**
     * @return int
     */
    public function getQuotedYears(): int;

    /**
     * @return \DateTime
     */
    public function getDocumentDeliveryDate(): \DateTime;

}