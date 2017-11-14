<?php


namespace KissDev\ChileanVacation;


use KissDev\ChileanVacation\Contracts\ChileanHoliday;
use KissDev\ChileanVacation\Contracts\Document;
use KissDev\ChileanVacation\Contracts\Employment;

/**
 * Class Job
 * @package KissDev\ChileanVacation
 */
class Job implements Employment
{
    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var \KissDev\ChileanVacation\Contracts\Document
     */
    protected $certificate;

    /**
     * @var \KissDev\ChileanVacation\Contracts\ChileanHoliday
     */
    protected $holiday;

    /**
     * Job constructor.
     * @param string $startDate
     * @param string|null $endDate
     * @param ChileanHoliday $holiday
     * @param Document|null $certificate
     */
    public function __construct(string $startDate, string $endDate = null, ChileanHoliday $holiday, Document $certificate = null)
    {
        $this->startDate = new \DateTime($startDate);
        $this->endDate = ($endDate) ? new \DateTime($endDate) : $endDate;
        $this->certificate = $certificate;
        $this->holiday = $holiday;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @param Document $certificate
     */
    public function setCertificate(Document $certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @return Document
     */
    public function certificate() : Document
    {
        return $this->certificate;
    }

    /**
     * @return ChileanHoliday
     */
    public function holiday() : ChileanHoliday
    {
        return $this->holiday();
    }
}