<?php

namespace Tests;

use KissDev\ChileanVacation\Certificate;
use KissDev\ChileanVacation\Contracts\ChileanHoliday;
use KissDev\ChileanVacation\Contracts\Document;
use KissDev\ChileanVacation\Contracts\Employment;
use KissDev\ChileanVacation\Contracts\NaturalPerson;
use KissDev\ChileanVacation\Holiday;
use KissDev\ChileanVacation\Job;
use KissDev\ChileanVacation\Vacation;
use KissDev\ChileanVacation\Person;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @var ChileanHoliday
     */
    public $holiday;
    /**
     * @var Vacation
     */
    public $vacation;
    /**
     * @var NaturalPerson
     */
    public $person;

    /**
     * @var Employment
     */
    public $job;

    /**
     * @var Document
     */
    public $certificate;

    protected function createAllEntities()
    {
        $this->certificate = $this->createCertificate();
        $this->holiday = $this->createHoliday();
        $this->job = $this->createJob('31-12-2016', '31-12-2017', $this->holiday, $this->certificate);
        $this->person = $this->createPerson($this->job);
        $this->vacation = $this->createVacation('07-12-2017');
    }

    protected function createHoliday()
    {
        if ($this->holiday) {
            return $this->holiday;
        }

        $holidays = [
            '01-01-2017',
            '02-01-2017',
            '14-04-2017',
            '15-04-2017',
            '19-04-2017',
            '01-05-2017',
            '21-05-2017',
            '02-07-2017',
            '16-07-2017',
            '15-08-2017',
            '18-09-2017',
            '19-09-2017',
            '09-10-2017',
            '27-10-2017',
            '01-11-2017',
            '19-11-2017',
            '08-12-2017',
            '17-12-2017',
            '25-12-2017',
        ];
        return new Holiday($holidays);
    }

    protected function createPerson(Employment $employment)
    {
        if ($this->person) {
            return $this->person;
        }

        return new Person($employment);
    }

    protected function createVacation($requestedDate = null, $requestedDays = 0, $vacationDaysTaken = 0, $progressiveDaysTaken = 0)
    {
        if ($this->vacation) {
            return $this->vacation;
        }

        return new Vacation($requestedDate, $requestedDays, $vacationDaysTaken, $progressiveDaysTaken);
    }

    protected function createCertificate($quotedYears = 0, $documentDeliveryDate = null)
    {
        if ($this->job) {
            return $this->job;
        }
        return new Certificate($quotedYears, $documentDeliveryDate);
    }

    protected function createJob($startDate = '31-12-2016', $endDate = '31-12-2017', ChileanHoliday $holiday = null, Document $certificate = null)
    {
        if ($this->job) {
            return $this->job;
        }

        return new Job($startDate, $endDate, $holiday, $certificate);
    }
}