<?php
/*
    This script builds a basic JDF based on form data
*/

require_once('../../Class/Container.php'); // Include the container class

// Get post variables
//print_r($_POST); die;

$jobName = $_POST['job_name'];
$jobType = $_POST['job_type'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];
$substrate = $_POST['substrate'];
$comment = $_POST['comment'];


$Container = new Container(); // Get Container object

$JDF = $Container->getJDF($jobName, $jobType, $quantity); // Get the JDF object
$JDF->setFile('../examples/input/example_image.jpg', $location); // Set the input file and output directory

if($substrate) $JDF->setMedia($substrate); // Set paper
if($comment) $JDF->setComment($comment); // Set comment

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