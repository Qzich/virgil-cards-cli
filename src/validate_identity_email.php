<?php

require 'base.php';


return $virgilClient->isIdentityValid('email', $email, $argv[1]);
