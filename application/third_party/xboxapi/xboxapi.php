<?php
/**
 * # Instantiate.
 */
require __DIR__ . '/vendor/autoload.php';
use \OpenXBL\Api;

$xbox = new Api('ws844s04kco40skogwws0gk8w440sk44gcg');

print $xbox->get('/account');
?>