<?php

include 'parameters.php'; // Include the parameters
include 'JDF/CreateJDF.php'; // Include the JDF class

// Example
$MyFile = 'example_image.jpg';

$JDF = new CreateJDF('MyTestJDF', 'DigitalPrinting'); // Create the JDF Object
$JDF->setComment("Test comment"); // Set a comment
$JDF->setMedia("Substrate Name 1"); // Set substrate
$URL = $JDF->setFile($InputLocation.$MyFile); // Input the file, returns the final file URL

$created = $JDF->getXML(); // Call the getXML method

Header('Content-type: text/xml');

print_r($created);
