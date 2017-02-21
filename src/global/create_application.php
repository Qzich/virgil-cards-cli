<?php
use Virgil\Sdk\Client\Requests\Constants\IdentityTypes;
use Virgil\Sdk\Client\Requests\PublishGlobalCardRequest;

require_once __DIR__ . '/../base.php';


$request = new PublishGlobalCardRequest($identity(), IdentityTypes::TYPE_APPLICATION, $crypto->exportPublicKey($publicKeyReference));

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

return $virgilClient->publishGlobalCard($request);
