<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
abstract class Pack
{
    /**
     * @var integer
     */
    protected $count;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $personIds;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return array
     */
    public function getPersonIds()
    {
        return $this->personIds;
    }

    /**
     * @param string[] $personIds
     */
    public function setPersonIds($personIds)
    {
        $this->personIds = $personIds;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;
    }
}
