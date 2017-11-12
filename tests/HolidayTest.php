<?php

namespace Tests;


class HolidayTest extends TestCase
{
    /**
     * @test
     */
    public function can_know_if_weekend()
    {
        $this->createAllEntities();
        $this->assertTrue($this->holiday->isWeekend(new \DateTime('05-11-2017')));
    }

    /**
     * @test
     */
    public function can_know_if_not_weekend()
    {
        $this->createAllEntities();
        $this->assertFalse($this->holiday->isWeekend(new \DateTime('03-11-2017')));
    }

    /**
     * @test
     */
    public function can_know_if_leap_year()
    {
        $this->createAllEntities();
        $this->assertTrue($this->holiday->isLeapYear(new \DateTime('31-12-2016')));
    }

    /**
     * @test
     */
    public function can_know_if_not_leap_year()
    {
        $this->createAllEntities();
        $this->assertFalse($this->holiday->isLeapYear(new \DateTime('31-12-2017')));
    }


    /**
     * @test
     */
    public function can_know_if_working_day()
    {
        $this->createAllEntities();
        $this->assertFalse($this->holiday->isWorkingDay(new \DateTime('08-12-2017')));
    }

    /**
     * @test
     */
    public function can_know_if_not_working_day()
    {
        $this->createAllEntities();
        $this->assertTrue($this->holiday->isWorkingDay(new \DateTime('07-12-2017')));
    }
}