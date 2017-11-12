<?php

namespace KissDev\ChileanVacation;

use KissDev\ChileanVacation\Contracts\NaturalPerson;

/**
 * Class Person
 * @package KissDev\Vacation
 */
class Person implements NaturalPerson
{
    /**
     * @var \DateTime
     */
    protected $startDateJob;

    /**
     * @var \DateTime
     */
    protected $endDateJob;

    /**
     * @var array
     */
    protected $vacationDaysTaken;

    /**
     * @var int
     */
    protected $quotedYears;

    /**
     * @var \DateTime
     */
    protected $documentDeliveryDate;

    /**
     * @var array
     */
    protected $progressiveDaysTaken;

    /**
     * Person constructor.
     * @param string $startDateJob
     * @param string $endDateJob
     * @param array $vacationDaysTaken
     * @param array $progressiveDaysTaken
     * @param int $quotedYears
     * @param string $documentDeliveryDate
     */
    public function __construct(string $startDateJob, string $endDateJob = null, array $vacationDaysTaken = [], array $progressiveDaysTaken = [], int $quotedYears = 0, string $documentDeliveryDate = null)
    {
        $this->startDateJob = new \DateTime($startDateJob);
        $this->endDateJob = ($endDateJob) ? new \DateTime($endDateJob) : $endDateJob;
        $this->vacationDaysTaken = $vacationDaysTaken;
        $this->quotedYears = $quotedYears;
        $this->documentDeliveryDate = ($documentDeliveryDate) ? new \DateTime($documentDeliveryDate) : $documentDeliveryDate;
        $this->progressiveDaysTaken = $progressiveDaysTaken;
    }

    /**
     * @return \DateTime
     */
    public function getStartDateJob(): \DateTime
    {
        return $this->startDateJob;
    }

    /**
     * @return \DateTime
     */
    public function getEndDateJob(): \DateTime
    {
        return $this->endDateJob;
    }

    /**
     * @return array
     */
    public function getVacationsDaysTaken(): array
    {
        return $this->vacationDaysTaken;
    }

    /**
     * @return array
     */
    public function getCountVacationsDaysTaken(): int
    {
        return count($this->vacationDaysTaken);
    }

    /**
     * @return array
     */
    public function getProgressiveDaysTaken(): array
    {
        return $this->progressiveDaysTaken;
    }

    /**
     * @return array
     */
    public function getCountProgressiveDaysTaken(): int
    {
        return count($this->progressiveDaysTaken);
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
        return $this->documentDeliveryDate;
    }
}