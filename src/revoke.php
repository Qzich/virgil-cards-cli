<?php
use Virgil\Sdk\Client\Requests\Constants\RevocationReasons;
use Virgil\Sdk\Client\Requests\RevokeCardRequest;

require 'base.php';

$revokeRequest = new RevokeCardRequest($argv[1], RevocationReasons::TYPE_UNSPECIFIED);

$requestSigner->authoritySign(
    $revokeRequest,
    $appId,
    $crypto->importPrivateKey(
        $appPrivateKeyBuffer,
        $appPrivateKeyPassword
    )
);


$virgilClient->revokeCard($revokeRequest);
