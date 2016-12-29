<?php

use Virgil\Sdk\Client\Requests\SearchCardRequest;

require 'base.php';


$searchCardRequest = new SearchCardRequest($identityType, $scope);

$searchCardRequest->setIdentities([$argv[1]]);


$cards = $virgilClient->searchCards($searchCardRequest);

echo "found cards:";
echo count($cards);
echo "\n";

