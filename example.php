<?php

// Include the parameters
include 'parameters.php';

// Include the JDF class
include 'JDF/CreateJDF.php';

// Create the JDF Object
$JDF = new CreateJDF('MyTestJDF', 'DigitalPrinting');

// Set a comment
$JDF->setComment("Test comment");

// Set substrate
$JDF->setMedia("Substrate Name 1");


// Input the file
$MyFile = 'example_image.jpg';
$JDF->setFile($InputLocation.$MyFile);


// Call the getXML method
$created = $JDF->getXML();

Header('Content-type: text/xml');

print_r($created);

?>