<?php
use Virgil\Sdk\Client\Requests\Constants\RevocationReasons;

use Virgil\Sdk\Client\Requests\RevokeGlobalCardRequest;

require_once __DIR__ . '/../base.php';


$revokeRequest = new RevokeGlobalCardRequest($argv[1], RevocationReasons::TYPE_UNSPECIFIED);

$requestSigner->authoritySign(
    $revokeRequest,
    $appId,
    $crypto->importPrivateKey(
        $appPrivateKeyBuffer,
        $appPrivateKeyPassword
    )
);


return $virgilClient->revokeGlobalCard($revokeRequest);
