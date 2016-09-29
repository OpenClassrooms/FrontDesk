<?php

namespace OpenClassrooms\FrontDesk\Models\Impl;

use OpenClassrooms\FrontDesk\Models\PackBuilder;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackBuilderImpl implements PackBuilder
{
    /**
     * @var PackImpl
     */
    private $pack;


    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->pack = new PackImpl();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withCount($count)
    {
        $this->pack->setCount($count);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withEndDate(\DateTime $endDate = null)
    {
        $this->pack->setEndDate($endDate);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPersonIds($personIds)
    {
        $this->pack->setPersonIds($personIds);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withStartDate(\DateTime $startDate)
    {
        $this->pack->setStartDate($startDate);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->pack;
    }
}
