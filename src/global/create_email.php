<?php
use Virgil\Sdk\Client\Requests\PublishGlobalCardRequest;

use Virgil\Sdk\Client\VirgilServices\Model\ValidationModel;

require_once __DIR__ . '/../base.php';


$validationToken = $argv[1];
$validationModel = new ValidationModel($validationToken);
$data = [$identity()=>$identity()];

$request = new PublishGlobalCardRequest(
    $email, 'email', $crypto->exportPublicKey($publicKeyReference), $validationModel, $data
);

$requestSigner->selfSign($request, $privateKeyReference);

return $virgilClient->publishGlobalCard($request);
