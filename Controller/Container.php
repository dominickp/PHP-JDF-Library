<?php

namespace DominickPeluso\JdfLibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DominickPeluso\JdfLibraryBundle\Controller\JDF;
use DominickPeluso\JdfLibraryBundle\Controller\JMF;
use DominickPeluso\JdfLibraryBundle\Controller\Manager;

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