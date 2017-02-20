<?php
use Virgil\Sdk\Client\Requests\Constants\RevocationReasons;

use Virgil\Sdk\Client\Requests\RevokeGlobalCardRequest;

use Virgil\Sdk\Client\VirgilServices\Model\ValidationModel;

require_once __DIR__ . '/../base.php';


$validationToken = $argv[1];
$validationModel = new ValidationModel($validationToken);

$revokeRequest = new RevokeGlobalCardRequest($argv[1], RevocationReasons::TYPE_UNSPECIFIED, $validationModel);

return $virgilClient->revokeGlobalCard($revokeRequest);
