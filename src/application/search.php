<?php

use Virgil\Sdk\Client\Requests\Constants\CardScopes;
use Virgil\Sdk\Client\Requests\SearchCardRequest;

require_once __DIR__ . '/../base.php';


$searchCardRequest = new SearchCardRequest($identityType, CardScopes::TYPE_APPLICATION);

$searchCardRequest->setIdentities([$argv[1]]);


return $virgilClient->searchCards($searchCardRequest);

