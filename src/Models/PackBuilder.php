<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PackBuilder
{
    /**
     * @return PackBuilder
     */
    public function create();

    /**
     * @param int $count
     *
     * @return PackBuilder
     */
    public function withCount($count);

    /**
     * @return PackBuilder
     */
    public function withEndDate(\DateTime $endDate = null);

    /**
     * @param int[] $personIds
     *
     * @return PackBuilder
     */
    public function withPersonIds($personIds);

    /**
     * @param \DateTime $startDate
     *
     * @return PackBuilder
     */
    public function withStartDate(\DateTime $startDate);

    /**
     * @return Pack
     */
    public function build();
}
