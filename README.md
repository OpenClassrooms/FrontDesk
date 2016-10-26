# FrontDesk
[![Build Status](https://travis-ci.org/OpenClassrooms/FrontDesk.svg?branch=master)](https://travis-ci.org/OpenClassrooms/FrontDesk)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/a938d1ba-3c55-43a9-b6a6-0f9612c526d9/mini.png)](https://insight.sensiolabs.com/projects/a938d1ba-3c55-43a9-b6a6-0f9612c526d9)
[![Coverage Status](https://coveralls.io/repos/github/OpenClassrooms/FrontDesk/badge.svg?branch=OC-5843_create_frontdesk_library)](https://coveralls.io/github/OpenClassrooms/FrontDesk?branch=OC-5843_create_frontdesk_library)

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

##### Gateway
The library provides Gateway for a person, a pack, a plan and a visit:
```php
use OpenClassrooms\FrontDesk\Repository\PersonRepository;
use OpenClassrooms\FrontDesk\Repository\PackRepository;

$personGateway = new PersonRepository();         
$personGateway->setClient($client);         
...
$packGateway = new PackRepository();         
$packGateway->setClient($client); 
...
$visitGateway = new VisitRepository();         
$visitGateway->setClient($client);  
...
$planGateway = new PlanRepository();         
$planGateway->setClient($client);          
```

##### Builder
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
                        ->build();
```

Same thing with a pack:
 
```php
use OpenClassrooms\FrontDesk\Models\PackBuilder;

$pack = $packBuilder->create()
                      ->withCount(PackStub1::COUNT)
                      ->withEndDate(new \DateTime(PackStub1::END_DATE))
                      ->withPersonIds(PackStub1::PERSON_IDS)
                      ->withStartDate(new \DateTime(PackStub1::START_DATE))
                      ->build();
```

## Services
##### Services Instanciation
The library provide a service for person, plan, pack and visit 
```php
use OpenClassrooms\FrontDesk\Services\Impl\PersonServiceImpl;
use OpenClassrooms\FrontDesk\Services\Impl\PackServiceImpl;
use OpenClassrooms\FrontDesk\Services\Impl\PackServiceImpl;

$service = new PersonServiceImpl();
...
$service = new PackServiceImpl();
...
$service = new VisitServiceImpl();
...
$service = new PlanServiceImpl
```
##### Post a person or a pack 
Just see here an exemple of a full person creation, this is the same logic for the pack: 

```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');        
$service = new PersonServiceImpl();        
$personGateway = new PersonRepository();        
$personGateway->setClient($client);       
$service->setPersonGateway($personGateway);        
$service->create(new PersonStub1()); 
```

##### Get Visit by person id
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new VisitServiceImpl();
$visitGateway = new VisitRepository();
$visitGateway->setApiClient($client);
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

##### Get Plans by person id
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new PlanServiceImpl();
$planGateway = new PlanRepository();
$planGateway->setApiClient($client);
$service->setPlanGateway($planGateway);
$service->getPlans($personId);
```

##### Delete a pack by id 
```php
$factory = new ClientFactoryImpl();        
$client = $factory->create('server_name', 'your_token');
$service = new PackServiceImpl();
$packGateway = new PackRepository();        
$packGateway->setClient($client);       
$service->setPacknGateway($packGateway);        
$service->deletePack($packId); 
