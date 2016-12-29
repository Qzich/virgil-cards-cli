<?php

require 'base.php';

$card = $virgilClient->getCard($argv[1]);

echo $card->getIdentity();
echo "\n";
