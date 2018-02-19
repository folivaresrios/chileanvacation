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
     * @var int
     */
    protected $requestedDays;

    /**
     * @var \DateTime
     */
    protected $requestedDate;

    /**
     * @var int
     */
    protected $vacationDaysTaken;

    /**
     * @var int
     */
    protected $progressiveDaysTaken;

    /**
     * Vacation constructor.
     * @param string $requestedDate
     * @param int $requestedDays
     * @param int $vacationDaysTaken
     * @param int $progressiveDaysTaken
     */
    public function __construct(string $requestedDate = null, int $requestedDays = 0, int $vacationDaysTaken = 0, int $progressiveDaysTaken = 0)
    {
        $this->requestedDays = $requestedDays;
        $this->requestedDate = ($requestedDate) ? new \DateTime($requestedDate) : new \DateTime();
        $this->vacationDaysTaken = $vacationDaysTaken;
        $this->progressiveDaysTaken = $progressiveDaysTaken;
    }

    /**
     * @param int $requestedDays
     */
    public function setRequestedDays(int $requestedDays)
    {
        $this->requestedDays = $requestedDays;
    }

    /**
     * @param \DateTime $requestedDate
     */
    public function setRequestedDate(\DateTime $requestedDate)
    {
        $this->requestedDate = $requestedDate;
    }

    /**
     * @return int
     */
    public function getRequestedDays(): int
    {
        return $this->requestedDays;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDate(): \DateTime
    {
        return $this->requestedDate;
    }

    /**
     * @return int
     */
    public function getVacationDaysTaken(): int
    {
        return $this->vacationDaysTaken;
    }

    /**
     * @return int
     */
    public function getProgressiveDaysTaken(): int
    {
        return $this->progressiveDaysTaken;
    }

    /**
     * @param ChileanHoliday $holiday
     * @return string
     */
    public function getReturnDate(ChileanHoliday $holiday): string
    {
        while ($this->requestedDays >= 0) {
            if ($holiday->isWorkingDay($this->requestedDate)) {
                $this->requestedDays--;
            }
            $this->requestedDate->modify('+1 day');
        }
        return $this->requestedDate->modify('-1 day')->format('d-m-Y');
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return int
     */
    public function getWorkedDays(NaturalPerson $naturalPerson): int
    {
        return $naturalPerson->job()->getStartDate()->diff($naturalPerson->job()->getEndDate() ?? new \DateTime())->days;
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return int
     */
    public function getWorkedYears(NaturalPerson $naturalPerson): int
    {
        return $naturalPerson->job()->getStartDate()->diff($naturalPerson->job()->getEndDate() ?? new \DateTime())->y;
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return float
     * @internal param \DateTime $vacationStartDate
     */
    public function getProportionalDays(NaturalPerson $naturalPerson): float
    {
        $diffMonth = $this->requestedDate->diff($naturalPerson->job()->getStartDate())->days / 30;
        return floor($diffMonth) * 1.25;
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return float
     */
    public function getRemainingVacations(NaturalPerson $naturalPerson): float
    {
        return $this->getProportionalDays($naturalPerson) - $this->vacationDaysTaken - $this->requestedDays;
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return int
     */
    public function getRemainingProgressiveVacations(NaturalPerson $naturalPerson, $year, $month): int
    {
        return $this->getProgressiveVacations($naturalPerson, $year, $month) - $this->progressiveDaysTaken - $this->requestedDays;
    }

    /**
     * @param NaturalPerson $naturalPerson
     * @return int
     */
    public function getProgressiveVacations(NaturalPerson $naturalPerson, $year = null, $month = null): int
    {
        $vacationYear = (int)$naturalPerson->job()->getStartDate()->format('Y') + (13 - $naturalPerson->job()->certificate()->getQuotedYears());
        $startYear = 3;
        $totalYearPostStartJob = $this->getWorkedYears($naturalPerson) - $startYear;
        $progressiveYear = 0;
        $progressiveDays = 0;
        $vacations = [];
        while ($progressiveYear <= $totalYearPostStartJob) {
            if ((int)$naturalPerson->job()->certificate()->getDocumentDeliveryDate()->format('Y') <= ($vacationYear + $progressiveYear)) {
                if (($vacationYear + $progressiveYear) == ($year ?? (new \DateTime())->format('Y')) && $naturalPerson->job()->certificate()->getDocumentDeliveryDate()->format('m') > ($month ?? (new \DateTime())->format('m'))) {
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
}
