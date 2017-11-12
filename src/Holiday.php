<?php

namespace KissDev\ChileanVacation;

use KissDev\ChileanVacation\Contracts\ChileanHoliday;

/**
 * Class Holiday
 * @package KissDev\Vacation
 */
class Holiday implements ChileanHoliday
{
    /**
     * @var array
     */
    protected $holidays;

    /**
     * Holiday constructor.
     * @param $holidays
     */
    public function __construct(array $holidays)
    {
        $this->holidays = $holidays;
    }

    /**
     * @return array
     */
    public function getHolidays(): array
    {
        return $this->holidays;
    }

    /**
     * @param \DateTime|null $date
     * @return bool
     */
    public function isWeekend(\DateTime $date = null): bool
    {
        return ($date ?? new \DateTime())->format('N') >= 6;
    }

    /**
     * @param \DateTime $date
     * @return bool
     */
    public function isWorkingDay(\DateTime $date): bool
    {
        if ($this->isWeekend($date)) {
            return false;
        }
        if (in_array($date->format('d-m-Y'), $this->getHolidays())) {
            return false;
        }
        return true;
    }

    /**
     * @param \DateTime|null $date
     * @return bool
     */
    public function isLeapYear(\DateTime $date = null): bool
    {
        return ($date ?? new \DateTime())->format('L');
    }

}