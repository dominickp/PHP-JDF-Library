<?php

# I'll need this http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html

// Include the JDF class
include 'JDF/JDF.php';

// Create the JDF Object
$JDF = new JDF();
// Call the CreateJDF method
$created = $JDF->CreateJDF();

Header('Content-type: text/xml');

print_r($created);

?>