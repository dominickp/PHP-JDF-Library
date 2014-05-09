<?php

require '../Class/Container.php'; // Include the JDF class

require 'params.php';


$Container = new Container();

$JMF = $Container->getJMF();
$Manager = $Container->getManager();

$JMF->requestQueueStatus(true);

$Manager->load($JMF);

$response = $Manager->postXML($device7600);

$ResponseJMF = $Container->getJMF();
$ResponseJMF->load($response);

$responseObject = $ResponseJMF->getResponse();

//header("Content-type: text/xml; charset=utf-8");

echo '<pre>';
print_r($responseObject);
echo '</pre>';