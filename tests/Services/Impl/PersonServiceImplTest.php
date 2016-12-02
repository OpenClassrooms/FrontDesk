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
        PersonGatewayMock::$id = PersonStub1::ID;
        $result = $this->service->create($this->buildPerson());

        $this->assertEquals(PersonStub1::ID, $result);
        $this->assertPerson(new PersonStub1(), PersonGatewayMock::$people[PersonStub1::ID]);
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
            ->withBirthdate(new \DateTime(PersonStub1::BIRTHDATE))
            ->withCustomFields(PersonStub1::CUSTOM_FIELDS)
            ->withEmail(PersonStub1::EMAIL)
            ->withFirstName(PersonStub1::FIRST_NAME)
            ->withGuardianEmail(PersonStub1::GUARDIAN_EMAIL)
            ->withGuardianName(PersonStub1::GUARDIAN_NAME)
            ->withJoinedAt(new \DateTime(PersonStub1::JOINED_AT))
            ->withMiddleName(PersonStub1::MIDDLE_NAME)
            ->withLastName(PersonStub1::LAST_NAME)
            ->withLocationId(PersonStub1::LOCATION_ID)
            ->withPhone(PersonStub1::PHONE)
            ->withSendInvite(PersonStub1::SEND_INVITE)
            ->withSkipComplimentaryPasses(PersonStub1::SKIP_COMPLIMENTARY_PASSES)
            ->build();
    }

    /**
     * @test
     */
    public function find_ReturnPeople()
    {
        PersonGatewayMock::$people = [new PersonStub1()];

        $result = $this->service->find(PersonStub1::ID);

        $this->assertEquals(PersonGatewayMock::$people, $result);
    }

    /**
     * @test
     */
    public function findAll_ReturnPeople()
    {
        PersonGatewayMock::$people = [new PersonStub1()];

        $result = $this->service->findAll();

        $this->assertEquals(PersonGatewayMock::$people, $result);
    }

    /**
     * @test
     */
    public function search_ReturnPeople()
    {
        PersonGatewayMock::$people = [new PersonStub1()];

        $result = $this->service->search(PersonStub1::EMAIL);

        $this->assertEquals(PersonGatewayMock::$people, $result);
    }

    /**
     * @test
     */
    public function update_ReturnId()
    {
        PersonGatewayMock::$id = PersonStub1::ID;
        $result = $this->service->update($this->buildPerson());

        $this->assertEquals(PersonStub1::ID, $result);
        $this->assertPerson(new PersonStub1(), PersonGatewayMock::$people[PersonStub1::ID]);
    }

    protected function setUp()
    {
        $this->service = new PersonServiceImpl();
        $this->service->setPersonGateway(new PersonGatewayMock());
    }
}
