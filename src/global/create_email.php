<?php
use Virgil\Sdk\Client\Requests\PublishGlobalCardRequest;

use Virgil\Sdk\Client\VirgilServices\Model\ValidationModel;

require_once __DIR__ . '/../base.php';


$validationToken = $argv[1];
$validationModel = new ValidationModel($validationToken);

$request = new PublishGlobalCardRequest(
    $identity(), 'email', $crypto->exportPublicKey($publicKeyReference), $validationModel
);

$requestSigner->selfSign($request, $privateKeyReference);

return $virgilClient->publishGlobalCard($request);
