<?php

namespace KissDev\ChileanVacation\Contracts;

/**
 * Interface NaturalPerson
 * @package KissDev\ChileanVacation\Contracts
 */
interface NaturalPerson
{
    /**
     * @return \KissDev\ChileanVacation\Contracts\Employment
     */
    public function job() : Employment;

}