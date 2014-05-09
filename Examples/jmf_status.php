<?php

require '../Class/Container.php'; // Include the JDF class

$IDP_Worker = 'http://192.168.1.40:8080/prodflow/jmf/';
$device5500 = $IDP_Worker.'192.168.1.45';
$deviceDFE  = $IDP_Worker.'dfe';



$Container = new Container();

$JMF = $Container->getJMF();

$JMF->requestStatus(true);

$Manager = $Container->getManager();

$Manager->load($JMF);

$response = $Manager->postXML($device5500);

$ResponseJMF = $Container->getJMF();
$ResponseJMF->load($response);
$DeviceInfo = $ResponseJMF->getDeviceInfo();

//header("Content-type: text/xml; charset=utf-8");

print_r($DeviceInfo);
