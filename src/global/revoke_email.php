<?php
use Virgil\Sdk\Client\Requests\Constants\RevocationReasons;

use Virgil\Sdk\Client\Requests\RevokeGlobalCardRequest;

use Virgil\Sdk\Client\VirgilServices\Model\ValidationModel;

require_once __DIR__ . '/../base.php';


$validationToken = $argv[2];
$cardId = $argv[1];

$validationModel = new ValidationModel($validationToken);

$revokeRequest = new RevokeGlobalCardRequest($cardId, RevocationReasons::TYPE_UNSPECIFIED, $validationModel);

$requestSigner->authoritySign($revokeRequest, $cardId, $privateKeyReference);

return $virgilClient->revokeGlobalCard($revokeRequest);
