<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Models\Impl\PackBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Person;
use OpenClassrooms\FrontDesk\Services\PackService;
use OpenClassrooms\FrontDesk\Services\PersonPackService;
use OpenClassrooms\FrontDesk\Services\PersonService;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonPackServiceImpl implements PersonPackService
{
    /**
     * @var PackService
     */
    private $packService;

    /**
     * @var PersonService
     */
    private $personService;

    /**
     * @var int
     */
    private $packProductId;

    /**
     * @var int
     */
    private $count;

    /**
     * @param int $packProductId
     * @param int $count
     */
    public function __construct($packProductId, $count)
    {
        $this->packProductId = $packProductId;
        $this->count = $count;
    }

    /**
     * {@inheritdoc}
     */
    public function create(Person $person, \DateTime $startDate, \DateTime $endDate)
    {
        $personId = $this->personService->create($person);

        $packBuilder = new PackBuilderImpl();
        $pack = $packBuilder
            ->create()
            ->withCount($this->count)
            ->withEndDate($endDate)
            ->withPersonIds([$personId])
            ->withStartDate($startDate)
            ->build();

        $packId = $this->packService->create($pack, $this->packProductId);

        return [
            'personId' => $personId,
            'packId' => $packId,
        ];
    }

    public function setPackService(PackService $packService)
    {
        $this->packService = $packService;
    }

    public function setPersonService(PersonService $personService)
    {
        $this->personService = $personService;
    }
}
