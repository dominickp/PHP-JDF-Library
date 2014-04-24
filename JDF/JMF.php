<?php

include 'parameters.php';

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

    public function getStatus()
    {
        $this->Query = $this->JMFInitialize->addChild("Query");
        $this->Query->addAttribute("Type", "Status");
        $this->Query->addAttribute("xsi:type", "QueryStatus", "http://www.w3.org/2001/XMLSchema-instance");
        $this->Query->addAttribute("ID", "misb4c3c9f88d02c8ea"); // Need to check HP spec...

        $StatusQuParams = $this->Query->addChild('StatusQuParams');
        $StatusQuParams->addAttribute('DeviceDetails', 'Details');
    }

    public function getStatusDetailsFull()
    {
        $this->Query = $this->JMFInitialize->addChild("Query");
        $this->Query->addAttribute("Type", "Status");
        $this->Query->addAttribute("xsi:type", "QueryStatus", "http://www.w3.org/2001/XMLSchema-instance");
        $this->Query->addAttribute("ID", "misb4c3c9f88d02c8ea"); // Need to check HP spec...

        $StatusQuParams = $this->Query->addChild('StatusQuParams');
        $StatusQuParams->addAttribute('DeviceDetails', 'Full');
    }

    public function sendJMF($IDP_Worker){

        // Make sure cURL is enabled
        if(!function_exists('curl_version')) throw new Exception("cURL must be installed for sendJMF() to work.");

        $ch = curl_init($IDP_Worker);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->JMFInitialize->asXML());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-type: application/vnd.cip4-jmf+xml'
        ));
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;

    }


    public function getXML()
    {
        $ReturnXML = $this->JMFInitialize->asXML();
        return $ReturnXML;
    }

}