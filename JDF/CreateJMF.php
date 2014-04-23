<?php

include 'parameters.php';

class CreateJMF
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
        $JDFStart = $XMLEncoding . '<JMF xmlns="' . $XMLNS . '" xmlns:xsi="' . $XMLSXSI . '" SenderID="' . $SenderID . '" Version="' . $Version . '"></JDF>';

        $this->JMFInitialize = new SimpleXMLElement($JDFStart, LIBXML_NOEMPTYTAG);

    }

    public function getStatus()
    {
        $this->Query = $this->JMFInitialize->addChild("Query");
        $this->Query->addAttribute("Type", "Status");
        $this->Query->addAttribute("xsi:type", "QueryStatus");
        $this->Query->addAttribute("id", "misb4c3c9f88d02c8ea"); // Need to check HP spec...

        $StatusQuParams = $this->Query->addChild('StatusQuParams');
        $StatusQuParams->addAttribute('DeviceDetails', 'Details');
    }


    public function getXML()
    {
        $ReturnXML = $this->JMFInitialize->asXML();
        return $ReturnXML;
    }

}