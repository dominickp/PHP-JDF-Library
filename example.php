<?php

include 'JDF/JDF.php';

$JDF = new JDF();
$created = $JDF->CreateJDF();

Header('Content-type: text/xml');

print_r($created);

?>