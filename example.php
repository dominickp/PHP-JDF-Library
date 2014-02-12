<?php

# I'll need this http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html

// Include the JDF class
include 'JDF/CreateJDF.php';

// Create the JDF Object
$JDF = new CreateJDF('MyTestJDF', 'DigitalPrinting');

// Set a comment
$JDF->setComment("Test comment");

// Call the CreateJDF method
$created = $JDF->CreateJDF();

Header('Content-type: text/xml');

print_r($created);

?>