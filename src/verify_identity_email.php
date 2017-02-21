<?php

use Virgil\Sdk\Client\Requests\Constants\IdentityTypes;

require 'base.php';


return $virgilClient->verifyIdentity($email, IdentityTypes::TYPE_EMAIL);
