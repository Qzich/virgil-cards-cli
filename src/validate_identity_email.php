<?php

use Virgil\Sdk\Client\Requests\Constants\IdentityTypes;

require 'base.php';


return $virgilClient->isIdentityValid(IdentityTypes::TYPE_EMAIL, $email, $argv[1]);
