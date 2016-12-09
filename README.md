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
$packGateway->setApiClient($client);      
```

#### Builder
```php
use OpenClassrooms\FrontDesk\Models\PersonBuilder;

$pack = $packBuilder
            ->create()
            ->withCount(5)
            ->withEndDate(new \DateTime())
            ->withPersonIds([21987])
            ->withStartDate(new \DateTime())
            ->build();
```
#### Services
##### Services Instanciation
```php
use OpenClassrooms\FrontDesk\Services\Impl\PackServiceImpl;

$service = new PackServiceImpl();
$service->setPackGateway($packGateway);
```

##### Create Pack 
```php   
...
$service->create($pack, $packProductId); 
```

##### Delete Pack by id 
```php   
...
$service->deletePack($packId); 
```

### PERSON
#### Gateway
```php
use OpenClassrooms\FrontDesk\Repository\PersonRepository;

$personGateway = new PersonRepository();         
$personGateway->setApiClient($client); 
$personGateway->setPersonBuilder(new PersonBuilderImpl());            
```

#### Builder
The library provides a builder to create a Person:
 
```php
use OpenClassrooms\FrontDesk\Models\PersonBuilder;

$person = $personBuilder->create()
                        ->withAddress('address')
                        ->withEmail('email')
                        ->withFirstName('first_name')
                        ->withJoinedAt(new \DateTime())
                        ->withLastName('last_name')
                        ...
                        ->build();
```

#### Services
##### Services Instanciation
```php
use OpenClassrooms\FrontDesk\Services\Impl\PersonServiceImpl;

$service = new PersonServiceImpl();
$service->setPersonGateway($personGateway);
```
##### Post a person 
```php
$service->create($person);
```

##### Put a person 
```php
$service->update($person);
```

##### Get person by id 
```php
$service->find($personId);
```

##### Get all the people
```php
$service->findAll($page);
```

##### Search person by query
```php
$service->search($query);
```

### PLAN
#### Gateway
##### Gateway
The library provides Gateway for a person, a pack, a plan and a visit:
```php
$planGateway = new PlanRepository();         
$planGateway->setApiClient($client);  
$planGateway->setPlanBuilder(new PlanBuilderImpl());        
```

#### Services
##### Services Instanciation
```php
$service = new PlanServiceImpl();
$service->setPlanGateway($planGateway);
```

##### Get Plans by person id
```php
$service->getPlans($personId);
```

### VISIT
#### Gateway
```php
use OpenClassrooms\FrontDesk\Repository\VisitRepository;

$visitGateway = new VisitRepository();         
$visitGateway->setApiClient($client);  
$visitGateway->setVisitBuilder(new VisitBuilderImpl());
```

#### Services
##### Services Instanciation
```php
$service = new VisitServiceImpl();
$service->setVisitGateway($visitGateway);
```

##### Get Visit by person id
```php
$service->getVisits($personId, $from, $to);
```

##### Delete Visit by id
```php
$service->deleteVisit($visitId);
```
