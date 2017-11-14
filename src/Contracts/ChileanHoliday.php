<?php

namespace KissDev\ChileanVacation\Contracts;

/**
 * Interface ChileanHoliday
 * @package KissDev\ChileanVacation\Contracts
 */
interface ChileanHoliday
{
    /**
     * @return array
     */
    public function getHolidays(): array;

    /**
     * @param \DateTime|null $date
     * @return bool
     */
    public function isWeekend(\DateTime $date = null): bool;

    /**
     * @param \DateTime $date
     * @return bool
     */
    public function isWorkingDay(\DateTime $date): bool;

    /**
     * @param \DateTime|null $date
     * @return bool
     */
    public function isLeapYear(\DateTime $date = null): bool;
}