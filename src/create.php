<?php

use Virgil\Sdk\Client\Requests\Constants\CardScopes;
use Virgil\Sdk\Client\Requests\CreateCardRequest;

require 'base.php';

$request = new CreateCardRequest($identity(), $identityType, $crypto->exportPublicKey($publicKeyReference), $scope);

$requestSigner->selfSign($request, $privateKeyReference)
              ->authoritySign(
                  $request,
                  $appId,
                  $crypto->importPrivateKey(
                      $appPrivateKeyBuffer,
                      $appPrivateKeyPassword
                  )
              )
;

$card = $virgilClient->createCard($request);

echo "Created card id:\n";
echo $card->getId();
echo "\n";
