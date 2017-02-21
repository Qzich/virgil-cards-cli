<?php

require 'base.php';


return $virgilClient->confirmIdentity($argv[1], $argv[2], 3600, 2);
