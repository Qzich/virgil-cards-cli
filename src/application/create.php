<?php
use Virgil\Sdk\Client\Requests\PublishCardRequest;

require_once __DIR__ . '/../base.php';


$request = new PublishCardRequest($identity(), $identityType, $crypto->exportPublicKey($publicKeyReference));

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

return $virgilClient->createCard($request);
