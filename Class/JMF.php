<?php

//include 'parameters.php';

class JMF
{

    public $JMFInitialize;

    public $Query;

    public function __construct()
    {

        // These are used to generate the initial XML field attributes
        $XMLEncoding = '<?xml version="1.0" encoding="UTF-8"?>';
        $XMLNS = 'http://www.CIP4.org/JDFSchema_1_1';
        $XMLSXSI = "http://www.w3.org/2001/XMLSchema-instance";
        $SenderID = 'PHPJDFLibrary';
        $Version = '1.2';


        // Initialize the JMF
        $JMFStart = $XMLEncoding . '<JMF xmlns="' . $XMLNS . '" xmlns:xsi="' . $XMLSXSI . '" SenderID="' . $SenderID . '" Version="' . $Version . '"></JMF>';

        $this->JMFInitialize = new SimpleXMLElement($JMFStart, LIBXML_NOEMPTYTAG);

        // Namespace
        $this->JMFInitialize->registerXPathNamespace('xsi', $XMLSXSI);

    }

    public function getStatus($detailed = false)
    {

        if($detailed){
            $DeviceDetails = 'Full';
        } else {
            $DeviceDetails = 'Details';
        }

        $this->Query = $this->JMFInitialize->addChild("Query");
        $this->Query->addAttribute("Type", "Status");
        $this->Query->addAttribute("xsi:type", "QueryStatus", "http://www.w3.org/2001/XMLSchema-instance");
        $this->Query->addAttribute("ID", "misb4c3c9f88d02c8ea"); // Need to check HP spec...

        $StatusQuParams = $this->Query->addChild('StatusQuParams');
        $StatusQuParams->addAttribute('DeviceDetails', $DeviceDetails);
    }



    public function asXML(){

        return $this->JMFInitialize->asXML();

    }

}