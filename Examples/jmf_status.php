<?php

require '../Class/Container.php'; // Include the JDF class

$IDP_Worker = 'http://192.168.1.40:8080/prodflow/jmf/dfe';
//$IDP_Worker = 'http://192.168.1.45/dpp/jmf';




$Container = new Container();

$JMF = $Container->getJMF();

$JMF->getStatus(true);

$Manager = $Container->getManager();

$Manager->load($JMF);

$response = $Manager->postXML($IDP_Worker);

header("Content-type: text/xml; charset=utf-8");

print_r($response);
