<?php

namespace KissDev\ChileanVacation;

use KissDev\ChileanVacation\Contracts\ChileanHoliday;
use KissDev\ChileanVacation\Contracts\NaturalPerson;

/**
 * Class Vacation
 * @package KissDev\Vacation
 */
class Vacation
{
    /**
     * @var Holiday
     */
    protected $holidays;

    /**
     * @var Person
     */
    protected $naturalPerson;

    /**
     * Vacation constructor.
     * @param $holidays
     * @param $naturalPerson
     */
    public function __construct(ChileanHoliday $holidays, NaturalPerson $naturalPerson)
    {
        $this->holidays = $holidays;
        $this->naturalPerson = $naturalPerson;
    }

    /**
     * @param int $requestedDays
     * @param \DateTime $requestedDate
     * @return string
     */
    public function getReturnDate(int $requestedDays, \DateTime $requestedDate): string
    {
        while ($requestedDays >= 0) {
            if ($this->holidays->isWorkingDay($requestedDate)) {
                $requestedDays--;
            }
            $requestedDate->modify('+1 day');
        }
        return $requestedDate->modify('-1 day')->format('d-m-Y');
    }

    /**
     * @return int
     */
    public function getWorkedDays(): int
    {
        return $this->naturalPerson->getStartDateJob()->diff($this->naturalPerson->getEndDateJob() ?? new \DateTime())->days;
    }

    /**
     * @return int
     */
    public function getWorkedYears(): int
    {
        return $this->naturalPerson->getStartDateJob()->diff($this->naturalPerson->getEndDateJob() ?? new \DateTime())->y;
    }

    /**
     * @param \DateTime $vacationStartDate
     * @return float
     */
    public function getTotalProportionalDays(\DateTime $vacationStartDate = null): float
    {
        $diffMonth = $vacationStartDate->diff($this->naturalPerson->getStartDateJob())->days / 30;
        return floor($diffMonth) * 1.25;
    }

    /**
     * @return int
     */
    public function getProgressiveVacations() : int
    {
        $vacationYear = (int)$this->naturalPerson->getStartDateJob()->format('Y') + (13 - $this->naturalPerson->getQuotedYears());
        $startYear = 3;
        $totalYearPostStartJob = $this->getWorkedYears() - $startYear;
        $progressiveYear = 0;
        $progressiveDays = 0;
        $vacations = [];
        while ($progressiveYear <= $totalYearPostStartJob) {
            if ((int)$this->naturalPerson->getDocumentDeliveryDate()->format('Y') <= ($vacationYear + $progressiveYear)) {
                if (($vacationYear + $progressiveYear) == (new \DateTime())->format('Y') && $this->naturalPerson->getDocumentDeliveryDate()->format('m') > (new \DateTime())->format('m')) {

                } else {
                    $vacations[$vacationYear + $progressiveYear] = floor($startYear / 3);
                    $startYear++;
                }
            }
            $progressiveDays += floor($startYear / 3);
            $progressiveYear++;
        }
        $progressiveDays = array_sum($vacations);

        return $progressiveDays;
    }

    /**
     * @return float
     */
    public function getRemainingVacations() : float
    {
        return $this->getTotalProportionalDays() - $this->naturalPerson->getCountVacationsDaysTaken();
    }

    /**
     * @return int
     */
    public function getRemainingProgressiveVacations(): int
    {
        return $this->getProgressiveVacations() - $this->naturalPerson->getCountProgressiveDaysTaken();
    }
}