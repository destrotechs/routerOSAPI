<?php
use PEAR2\Net\RouterOS;

require_once 'PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php';

try {
    $client = new RouterOS\Client('ADDRESS', 'LOGIN', 'PASSWORD');
    $responses = $client->sendSync(new RouterOS\Request('/ip/hotspot/active/print'));

	foreach ($responses as $response) {
	    if ($response->getType() === RouterOS\Response::TYPE_DATA) {
	        echo 'User: ', $response->getProperty('user'),
	        "\n";
	    }
	}
}
catch (Exception $e) {
    die($e);
    // echo "failed";
}

?>