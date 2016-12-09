# FrontDesk

This is a PHP5 library that provides [FrontDesk Core API](https://developer.frontdeskhq.com/docs/api/v2) functionality in your application.

## Install
The easiest way to install FrontDesk Library is via [composer](http://getcomposer.org/).

Create the following `composer.json` file and run the `php composer.phar install` command to install it.

```json
{
    "require": {
        "openclassrooms/front-desk": "*"
    }
}
```
```php
<?php
require 'vendor/autoload.php';

use OpenClassrooms\FrontDesk\Services\PackService;
use OpenClassrooms\FrontDesk\Services\PersonService;

//do things
```

## USAGE
### Instanciation
If you plan to use FrontDesk in a Symfony2 project, check out the [FrontDeskBundle](https://github.com/OpenClassrooms/FrontDeskBundle). The bundle provides an easy configuration option for this library.

##### Factory 
The library provides a factory to create a client 
```php
use OpenClassrooms\FrontDesk\Client\Impl\ClientFactoryImpl; 

$factory = new ClientFactoryImpl();         
$client = $factory->create('your_front_desk_server_name', 'your_token');
```
## ENDPOINTS
### PACK
#### Gateway
```php
use OpenClassrooms\FrontDesk\Repository\PackRepository;

$packGateway = new PackRepository();         
$packGateway->setClient($client);      
```

#### Builder
```php
use OpenClassrooms\FrontDesk\Models\PersonBuilder;

$person = $personBuilder->create()
                        ->withAddress(PersonStub1::ADDRESS)
                        ->withCustomFields(PersonStub1::CUSTOM_FIELDS)
                        ->withEmail(PersonStub1::EMAIL)
                        ->withFirstName(PersonStub1::FIRST_NAME)
                        ->withJoinedAt(new \DateTime(PersonStub1::JOINED_AT))
                        ->withLastName(PersonStub1::LAST_NAME)
                        ->withPhone(PersonStub1::PHONE)
                        ...
                        ->build();
```
#### Services
##### Services Instanciation
```php
use OpenClassrooms\FrontDesk\Services\Impl\PackServiceImpl;

$service = new PackServiceImpl();
```

##### Delete a pack by id 
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new PackServiceImpl();
$packGateway = new PackRepository();        
$packGateway->setApiClient($client);       
$service->setPacknGateway($packGateway);        
$service->deletePack($packId); 
```

### PERSON
#### Gateway
```php
use OpenClassrooms\FrontDesk\Repository\PersonRepository;

$personGateway = new PersonRepository();         
$personGateway->setClient($client); 
$personGateway->setPersonBuilder(new PersonBuilderImpl());            
```
#### Builder
The library provides a builder to create a Person:
 
```php
use OpenClassrooms\FrontDesk\Models\PersonBuilder;

$person = $personBuilder->create()
                        ->withAddress(PersonStub1::ADDRESS)
                        ->withCustomFields(PersonStub1::CUSTOM_FIELDS)
                        ->withEmail(PersonStub1::EMAIL)
                        ->withFirstName(PersonStub1::FIRST_NAME)
                        ->withJoinedAt(new \DateTime(PersonStub1::JOINED_AT))
                        ->withLastName(PersonStub1::LAST_NAME)
                        ->withPhone(PersonStub1::PHONE)
                        ...
                        ->build();
```

#### Services
##### Services Instanciation
```php
use OpenClassrooms\FrontDesk\Services\Impl\PersonServiceImpl;

$service = new PersonServiceImpl();
```
##### Post a person 
Just see here an exemple of a full person creation: 
```php
        $factory = new ClientFactoryImpl();
        $client = $factory->create('server_name', 'your_token');
        $service = new PersonServiceImpl();
        $personGateway = new PersonRepository();
        $personGateway->setApiClient($client);
        $personGateway->setPersonBuilder(new PersonBuilderImpl());
        $service->setPersonGateway($personGateway);
        $service->findAll();
```

### PLAN
#### Gateway
##### Gateway
The library provides Gateway for a person, a pack, a plan and a visit:
```php
$planGateway = new PlanRepository();         
$planGateway->setClient($client);  
$planGateway->setPlanBuilder(new PlanBuilderImpl());        
```

#### Services
##### Services Instanciation
```php
$service = new PlanServiceImpl
```

##### Get Plans by person id
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new PlanServiceImpl();
$planGateway = new PlanRepository();
$planGateway->setApiClient($client);
$planGateway->setPlanBuilder(new PlanBuilderImpl());
$service->setPlanGateway($planGateway);
$service->getPlans($personId);
```

### VISIT
#### Gateway
```php
use OpenClassrooms\FrontDesk\Repository\VisitRepository;

$visitGateway = new VisitRepository();         
$visitGateway->setClient($client);  
$visitGateway->setVisitBuilder(new VisitBuilderImpl());
```

#### Services
##### Services Instanciation
```php
$service = new VisitServiceImpl();
```

##### Get Visit by person id
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new VisitServiceImpl();
$visitGateway = new VisitRepository();
$visitGateway->setApiClient($client);
$visitGateway->setVisitBuilder(new VisitBuilderImpl());
$service->setVisitGateway($visitGateway);
$service->getVisits($personId, $from, $to);
```

##### Delete Visit by id
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new VisitServiceImpl();
$visitGateway = new VisitRepository();
$visitGateway->setApiClient($client);
$service->setVisitGateway($visitGateway);
$service->deleteVisit($visitId);
```
