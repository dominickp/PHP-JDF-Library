<?php

$JDFString = '<JDF Type="Combined" xmlns="http://www.CIP4.org/JDFSchema_1_1" ID="rootNodeId" Status="Waiting" JobPartID="000.cdp.797" Version="1.2" Types="DigitalPrinting" DescriptiveName="JDFCreatorTicket"/>';

$xml = new SimpleXMLElement($JDFString);

for ($i = 1; $i <= 8; ++$i) {
$track = $xml->addChild('track');
$track->addChild('path', "song$i.mp3");
$track->addChild('title', "Track $i - Track Title");
}

Header('Content-type: text/xml');
print($xml->asXML());

?>