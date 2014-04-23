<?php

include 'parameters.php'; // Include the parameters
include 'JDF/JMF.php'; // Include the JDF class

$IDP_Worker = 'http://192.168.1.40:8080/prodflow/jmf/dfe';

$Example_JMF = '<?xml version="1.0" encoding="UTF-8"?>
    <JMF xmlns="http://www.CIP4.org/JDFSchema_1_1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SenderID="MIS System" TimeStamp="2006-04-19T17:47:10-07:00" Version="1.2">
      <Query ID="misb4c3c9f88d02c8ea" Type="Status" xsi:type="QueryStatus">
        <StatusQuParams DeviceDetails="Details" />
      </Query>
    </JMF>
';

// Try to cURL POST and get a response
$ch = curl_init($IDP_Worker);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $Example_JMF);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/vnd.cip4-jmf+xml'
));
$result = curl_exec($ch);

curl_close($ch);

header("Content-type: text/xml; charset=utf-8");

print_r($result);