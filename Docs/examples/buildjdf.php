<?php
/*
This script builds a basic JDF and displays it as raw XML
*/

require_once('../Class/Container.php'); // Include the container class

$Container = new Container(); // Get Container object

$JDF = $Container->getJDF('MyTestJDF', 'DigitalPrinting', 100); // Get the JDF object
$JDF->setFile('examples/input/example_image.jpg', 'FILE://hppro01-sm1/Jobs/'); // Set the input file and output directory
$JDF->setMedia("100# Gloss Cover"); // Set paper
$JDF->setLayoutPreparationParams('TwoSidedFlipY', 'urn:8_up_postcards'); // Set imposition settings

$Manager = $Container->getManager(); // Get the Manager
$Manager->load($JDF); // Load our JDF object into the Manager

$MyXML = $Manager->getXML(); // Get XML

#header("Content-type: text/xml; charset=utf-8"); // Set HTTP header to XML
#print_r(strval($MyXML));

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($MyXML);
echo htmlspecialchars($dom->saveXML());

//print_r(htmlspecialchars($MyXML));