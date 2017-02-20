<?php

use Virgil\Sdk\Buffer;
use Virgil\Sdk\Client\Requests\Constants\CardScopes;
use Virgil\Sdk\Client\Requests\RequestSigner;
use Virgil\Sdk\Client\VirgilClient;
use Virgil\Sdk\Client\VirgilClientParams;
use Virgil\Sdk\Cryptography\VirgilCrypto;

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config.php';

$identityType = 'phpsdktest';
$scope = CardScopes::TYPE_APPLICATION;

$publicKeyBuffer = Buffer::fromBase64($config['public_key']);
$privateKeyBuffer = Buffer::fromBase64($config['private_key']);

$appId = $config['app_id'];
$appPrivateKeyBuffer = Buffer::fromBase64($config['app_private_key']);
$appPrivateKeyPassword = $config['app_private_key_password'];

$crypto = new VirgilCrypto();

$publicKeyReference = $crypto->importPublicKey($publicKeyBuffer);
$privateKeyReference = $crypto->importPrivateKey($privateKeyBuffer);

$identity = baseIdentityGenerator('ykuzichtest');

$params = new VirgilClientParams($config['access_token']);

$params->setCardsServiceAddress($config['cards_service_host']);
$params->setReadCardsServiceAddress($config['read_cards_service_host']);
$params->setIdentityServiceAddress($config['identity_service_host']);
$params->setRegistrationAuthorityService($config['ra_service_host']);

$virgilClient = new VirgilClient($params);
$requestSigner = new RequestSigner($crypto);


function baseIdentityGenerator($base)
{
    $g = call_user_func(
        function ($val) {
            while (true) {
                yield $val . uniqid();
            }
        },
        $base
    );

    return function () use ($g) {
        $c = $g->current();
        $g->next();

        return $c;
    };
}
