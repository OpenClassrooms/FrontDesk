<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ApiClientMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PersonTestCase;
use OpenClassrooms\FrontDesk\Models\Impl\PersonBuilderImpl;
use OpenClassrooms\FrontDesk\Models\Impl\PersonImpl;
use OpenClassrooms\FrontDesk\Models\Person;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PersonRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const PAGE = 1;

    use PersonTestCase;

    /**
     * @var PersonRepository
     */
    private $personRepository;

    /**
     * @test
     */
    public function findAll_ReturnPeople()
    {
        ApiClientMock::$response = json_encode(['people' => [new PersonStub1()]]);
        $peopleResult = $this->personRepository->findAll(self::PAGE);

        $this->assertPeople($peopleResult);
    }

    /**
     * @test
     */
    public function findAllByQuery_ReturnPeople()
    {
        ApiClientMock::$response = json_encode([[0 => ['person' => new PersonStub1()]], 'total_count' => 1]);

        $peopleResult = $this->personRepository->findAllByQuery(PersonStub1::EMAIL);

        $this->assertPeople($peopleResult);
    }

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
        $this->assertEquals($this->personToJson($person), json_encode(ApiClientMock::$params));
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

    /**
     * @return string
     */
    private function personToJson(Person $person)
    {
        return '{"person":'.json_encode($person).'}';
    }

    /**
     * @test
     */
    public function update_ReturnPersonId()
    {
        ApiClientMock::$response = json_encode(['people' => [0 => ['id' => PersonStub1::ID]]]);
        $person = $this->buildPerson();
        $result = $this->personRepository->update($person);

        $this->assertEquals(PersonStub1::ID, $result);
        $this->assertEquals(PersonRepository::RESOURCE_NAME, ApiClientMock::$resource);
        $this->assertEquals($this->personToJson($person), json_encode(ApiClientMock::$params));
    }

    protected function setUp()
    {
        $this->personRepository = new PersonRepository();
        $this->personRepository->setApiClient(new ApiClientMock());
        $this->personRepository->setPersonBuilder(new PersonBuilderImpl());
    }
}
