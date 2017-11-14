<?php

namespace Tests;


class VacationTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_return_date()
    {
        $this->holiday = $this->createHoliday();
        $this->vacation = $this->createVacation('07-12-2017', 2);
        $this->assertEquals('12-12-2017', $this->vacation->getReturnDate($this->holiday));
    }

    /**
     * @test
     */
    public function can_get_worked_days()
    {
        $this->createAllEntities();
        $this->assertEquals(365, $this->vacation->getWorkedDays($this->person));
    }

    /**
     * @test
     */
    public function can_get_proportional_days()
    {
        $this->holiday = $this->createHoliday();
        $this->certificate = $this->createCertificate();
        $this->vacation = $this->createVacation('31-12-2017');
        $this->job = $this->createJob('31-12-2016', '31-12-2017', $this->holiday, $this->certificate);
        $this->person = $this->createPerson($this->job);
        $this->assertEquals(15, $this->vacation->getProportionalDays($this->person));
    }

    /**
     * @test
     */
    public function can_get_progressive_days()
    {
        $this->holiday = $this->createHoliday();
        $this->certificate = $this->createCertificate(10, '30-12-2013');
        $this->vacation = $this->createVacation();
        $this->job = $this->createJob('31-12-2010', '31-12-2017', $this->holiday, $this->certificate);
        $this->person = $this->createPerson($this->job);

        $this->assertEquals(5, $this->vacation->getProgressiveVacations($this->person));
    }

    /**
     * @test
     */
    public function can_get_remaining_progressive_days()
    {
        $this->holiday = $this->createHoliday();
        $this->certificate = $this->createCertificate(10, '30-12-2013');
        $this->vacation = $this->createVacation('07-12-2017', 1, 12, 1);
        $this->job = $this->createJob('31-12-2010', '31-12-2017', $this->holiday, $this->certificate);
        $this->person = $this->createPerson($this->job);
        $this->assertEquals(3, $this->vacation->getRemainingProgressiveVacations($this->person));
    }
    /**
     * @test
     */
    public function can_get_remaining_vacation_days()
    {
        $this->holiday = $this->createHoliday();
        $this->certificate = $this->createCertificate();
        $this->vacation = $this->createVacation('31-12-2017', 1, 12, 1);
        $this->job = $this->createJob('31-12-2016', '31-12-2017', $this->holiday, $this->certificate);
        $this->person = $this->createPerson($this->job);
        $this->assertEquals(2, $this->vacation->getRemainingVacations($this->person));
    }
}