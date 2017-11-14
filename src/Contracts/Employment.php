<?php


namespace KissDev\ChileanVacation\Contracts;

/**
 * Interface Employment
 * @package KissDev\ChileanVacation\Contracts
 */
interface Employment
{

    /**
     * @return Document
     */
    public function certificate() : Document;


    /**
     * @return ChileanHoliday
     */
    public function holiday() : ChileanHoliday;

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime;

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime;

}