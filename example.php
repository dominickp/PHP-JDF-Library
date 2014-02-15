<?php

include 'parameters.php'; // Include the parameters
include 'JDF/CreateJDF.php'; // Include the JDF class

/*
 * In this example, the JDF file is built with all optional methods
 * and the JDF is saved to a .JDF file in the /Output/ directory
 * and also displayed on the screen when viewed on a browser.
 */


// Example
$MyFile = 'example_image.jpg';

// Create the JDF Object. Job name and JDF type required.
$JDF = new CreateJDF('MyTestJDF', 'DigitalPrinting', 100);

// Set a comment, optional.
$JDF->setComment("Test comment");

// Set substrate, optional. Name must match the name on the press/DFE.
$JDF->setMedia("Substrate Name 1");

// Input the local file, returns the final file URL
$URL = $JDF->setFile($InputLocation.$MyFile);

// Determines the location of the job, whether held in print queue or direct to print. Default is queue.
$JDF->setDevice();

// Set the tumble of the job and an optional imposition template
$Tumble = "TwoSidedFlipY";
$ExternalImpositionURL = "urn:8_up_postcards";
$JDF->setLayoutPreparationParams($Tumble, $ExternalImpositionURL);

// Set some customer information for HP Indigo billing
$JDF->setCustomerInfo('MyJobNumber', 'MyCustomer');

$created = $JDF->getXML(); // Call the getXML method

$JDF->save('MySavedJDF'); // Save the JDF file to the output location in parameters

Header('Content-type: text/xml');

print_r($created);
