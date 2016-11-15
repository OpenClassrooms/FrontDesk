<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Models\Impl\PersonBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Impl\PersonImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PersonRepository
     */
    private $personRepository;

    /**
     * @test
     */
    public function insert_ReturnPersonId()
    {
        ApiClientMock::$response = json_encode(['people' => [0 => ['id' => PersonStub1::ID]]]);
        $person = $this->buildPerson();
        $result = $this->personRepository->insert($person);

        $this->assertEquals(PersonStub1::ID, $result);
        $this->assertEquals(PersonRepository::RESOURCE_NAME, ApiClientMock::$resource);
        $this->assertEquals(json_encode($person), json_encode(ApiClientMock::$params));
    }

    /**
     * @return PersonImpl
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
            ->withJoinedAt(new \DateTime(PersonStub1::JOINED_AT))
            ->withLastName(PersonStub1::LAST_NAME)
            ->withPhone(PersonStub1::PHONE)
            ->build();
    }

    protected function setUp()
    {
        $this->personRepository = new PersonRepository();
        $this->personRepository->setApiClient(new ApiClientMock());
    }
}
