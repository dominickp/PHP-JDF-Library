<?php

require 'JDF.php';
require 'JMF.php';


class PHPJDFLibrary{

    public function getJDF($DescriptiveName, $Types, $Quantity){

        $JDF = new JDF($DescriptiveName, $Types, $Quantity);

        return $JDF;
    }

    public function getJMF(){

        $JMF = new JMF();

        return $JMF;
    }

}