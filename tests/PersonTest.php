<?php


namespace Tests;


class PersonTest extends TestCase
{
    /**
     * @test
     */
    public function get_count_progressive_days_taken()
    {
        $this->person = $this->createPerson('31-12-2010', '31-12-2017', [], ['02-11-2017'], 10, '30-12-2013');
        $this->assertCount(1, $this->person->getProgressiveDaysTaken());
    }

    /**
     * @test
     */
    public function get_count_vacations_days_taken()
    {
        $this->person = $this->createPerson('31-12-2010', '31-12-2017', ['02-11-2017'], [], 10, '30-12-2013');
        $this->assertCount(1, $this->person->getVacationsDaysTaken());
    }
}