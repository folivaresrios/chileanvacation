<?php

namespace Tests;


class VacationTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_return_date()
    {
        $this->createAllEntities();
        $this->assertEquals('12-12-2017', $this->vacation->getReturnDate(2, new \DateTime('07-12-2017')));
    }

    /**
     * @test
     */
    public function can_get_count_worked_days()
    {
        $this->createAllEntities();
        $this->assertEquals(365, $this->vacation->getWorkedDays());
    }

    /**
     * @test
     */
    public function can_get_total_proportional_days()
    {
        $this->createAllEntities();
        $this->assertEquals(15, $this->vacation->getTotalProportionalDays(new \DateTime('31-12-2017')));
    }

    /**
     * @test
     */
    public function progressive_days()
    {
        $this->person = $this->createPerson('31-12-2010', '31-12-2017', [], [],10, '30-12-2013');
        $this->holiday = $this->createHoliday();
        $this->vacation = $this->createVacation();

        $this->assertEquals(5, $this->vacation->getProgressiveVacations());
    }
}