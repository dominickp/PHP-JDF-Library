<?php

require 'JDF.php';
require 'JMF.php';
require 'Manager.php';


class Container{

    public function getJDF($DescriptiveName, $Types, $Quantity){

        $JDF = new JDF($DescriptiveName, $Types, $Quantity);

        return $JDF;
    }

    public function getJMF(){

        $JMF = new JMF();

        return $JMF;
    }

    public function getManager(){

        $Manager = new Manager();

        return $Manager;
    }

}