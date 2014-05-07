<?php


require('../../Class/Container.php'); // Include the container class

$Container = new Container(); // Get Container object

$JDF = $Container->getJDF('MyTestJDF', 'DigitalPrinting', 100); // Get the JDF object

$JDF->setFile('input/example_image.jpg', 'FILE://hppro01-sm1/Jobs/'); // Set the input file and output directory

$JDF->setMedia("100# Gloss Cover"); // Set Media (paper)

$Manager = $Container->getManager(); // Get the Manager

$Manager->load($JDF); // Load our JDF object into the Manager

$MyXML = $Manager->getXML(); // Get XML

header("Content-type: text/xml; charset=utf-8");
print_r($MyXML);