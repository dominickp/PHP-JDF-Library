<?php

require 'Class/Container.php';

include 'parameters.php'; // Include the parameters
#include 'JDF/PHPJDFLibrary.php'; // Include the JDF class

/*
 * In this example, the JDF file is built with all optional methods
 * and the JDF is saved to a .JDF file in the /Output/ directory
 * and also displayed on the screen when viewed on a browser.
 */


// Example
$MyFile = 'example_image.jpg';

// Create the JDF Object. Job name and JDF type required.
$PHPJDFLibrary = new Container();

$JDF = $PHPJDFLibrary->getJDF('MyTestJDF', 'DigitalPrinting', 100);

// Set a comment, optional.
$JDF->setComment("Test comment");

// Set substrate, optional. Name must match the name on the press/DFE.
$JDF->setMedia("Substrate Name 1");

// Input the local file, returns the final file URL
$URL = $JDF->setFile($InputLocation.$MyFile);

// Determines the location of the job, whether held in print queue or direct to print. Default is queue.
$JDF->setDevice();

// Set streaming on or off. Tells the HP DFE to start sending the job to the press device when it hits a certain threshold on the rip.
$JDF->setHPStreaming(true, 100);

// Set the tumble of the job and an optional imposition template
$Tumble = "TwoSidedFlipY";
$ExternalImpositionURL = "urn:8_up_postcards";
$JDF->setLayoutPreparationParams($Tumble, $ExternalImpositionURL);

// Set some customer information for HP Indigo billing
$JDF->setCustomerInfo('MyJobNumber', 'MyCustomer');

// Gathering params. This is for a slip sheet in between jobs and stuff. HP implementation specific I think.
$JDF->setGatheringParams('SeparatorSheet', 'Trailer');

$created = $JDF->getXML(); // Call the getXML method

$JDF->save('MySavedJDF'); // Save the JDF file to the output location in parameters

Header('Content-type: text/xml');

print_r($created);


/* Example JMF

<?xml version="1.0" encoding="UTF-8"?>
<JMF xmlns="http://www.CIP4.org/JDFSchema_1_1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SenderID="MIS System" TimeStamp="2006-04-19T17:47:10-07:00" Version="1.2">
  <Query ID="misb4c3c9f88d02c8ea" Type="Status" xsi:type="QueryStatus">
    <StatusQuParams DeviceDetails="Details" />
  </Query>
</JMF>

*/