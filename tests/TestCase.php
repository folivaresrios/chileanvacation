<?php

namespace Tests;

use KissDev\ChileanVacation\Holiday;
use KissDev\ChileanVacation\Vacation;
use KissDev\ChileanVacation\Person;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @var Holiday
     */
    protected $holiday;
    /**
     * @var Vacation
     */
    protected $vacation;
    /**
     * @var Person
     */
    protected $person;

    protected function createAllEntities()
    {
        $this->person = $this->createPerson();
        $this->holiday = $this->createHoliday();
        $this->vacation = $this->createVacation();
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

    protected function createPerson($startDateJob = '31-12-2016', $endDateJob = '31-12-2017', $takenHolidays = [], $takenProgressiveHolidays = [], $quotedYears = 0,$documentDeliveryDate = null)
    {
        if ($this->person) {
            return $this->person;
        }

        return new Person($startDateJob, $endDateJob, $takenHolidays, $takenProgressiveHolidays, $quotedYears, $documentDeliveryDate);
    }

    protected function createVacation()
    {
        if ($this->vacation) {
           return $this->vacation;
        }

        return new Vacation($this->holiday, $this->person);
    }
}