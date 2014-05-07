<?php

class Manager
{

    protected $SimpleXMLObject;

    public function __construct($SimpleXMLObject){

        $this->SimpleXMLObject = $SimpleXMLObject;

    }

    public function postXML($IDP_Worker){

        // Make sure cURL is enabled
        if(!function_exists('curl_version')) throw new Exception("cURL must be installed for sendJMF() to work.");

        $ch = curl_init($IDP_Worker);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->SimpleXMLObject->asXML());
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
        $ReturnXML = $this->SimpleXMLObject->asXML();
        return $ReturnXML;
    }

    public function saveAs($fileName)
    {
        if(empty($fileName)) throw new Exception("Filename must be set to use the save() method.");

        // Attempt to preserve white space (formatting
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->SimpleXMLObject->asXML());
        file_put_contents($this->OutputDirectory.$fileName.'.jdf',  $dom->saveXML());
    }

}