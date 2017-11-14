<?php

namespace KissDev\ChileanVacation;

use KissDev\ChileanVacation\Contracts\Employment;
use KissDev\ChileanVacation\Contracts\NaturalPerson;

/**
 * Class Person
 * @package KissDev\ChileanVacation
 */
class Person implements NaturalPerson
{
    /**
     * @var \KissDev\ChileanVacation\Employment
     */
    protected $job;

    /**
     * Person constructor.
     * @param Employment $job
     */
    public function __construct(Employment $job)
    {
        $this->job = $job;
    }

    /**
     * @return Employment
     */
    public function job() : Employment
    {
        return $this->job;
    }
}