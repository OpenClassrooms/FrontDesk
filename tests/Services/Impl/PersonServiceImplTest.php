<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\PersonGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonTestCase;
use OpenClassrooms\FrontDesk\Models\Impl\PersonBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonServiceImplTest extends \PHPUnit_Framework_TestCase
{
    use PersonTestCase;

    /**
     * @var PersonServiceImpl
     */
    private $service;

    /**
     * @test
     */
    public function create_ReturnId()
    {
        $result = $this->service->create($this->buildPerson());

        $this->assertEquals(PersonStub1::ID, $result);
        $this->assertPerson(new PersonStub1(), PersonGatewayMock::$person[PersonStub1::ID]);
    }

    /**
     * @return Person
     */
    private function buildPerson()
    {
        $personBuilder = new PersonBuilderImpl();

        return $personBuilder
            ->create()
            ->withAddress(PersonStub1::ADDRESS)
            ->withEmail(PersonStub1::EMAIL)
            ->withFirstName(PersonStub1::FIRST_NAME)
            ->withJoinedAt(new \DateTime(PersonStub1::JOINED_AT))
            ->withLastName(PersonStub1::LAST_NAME)
            ->withPhone(PersonStub1::PHONE)
            ->build();
    }

    protected function setUp()
    {
        $this->service = new PersonServiceImpl();
        $this->service->setPersonGateway(new PersonGatewayMock());
    }
}
