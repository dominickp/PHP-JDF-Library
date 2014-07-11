<?php

namespace DominickPeluso\JdfLibraryBundle\Controller;

class Manager
{

    protected $SimpleXMLObject;

    protected $multiSimplyXMLObjects;

    public function load($SimpleXMLObject)
    {

        $this->SimpleXMLObject = $SimpleXMLObject;

    }

    public function loadMulti($array)
    {
        $this->multiSimplyXMLObjects = $array;
    }

    public function checkCurlInstalled()
    {
        // Make sure cURL is enabled
        if(!function_exists('curl_version')) throw new \Exception("cURL must be installed for sendJMF() to work.");

        return true;
    }

    public function postXML($IDP_Worker)
    {
        $this->checkCurlInstalled();

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

    public function multiPostXML($IDP_Worker)
    {
        $this->checkCurlInstalled();

        $mh = curl_multi_init();

        $curlHandles = array();

        foreach($this->multiSimplyXMLObjects as $key => $SimplyXMLObject)
        {
            $ch = curl_init($IDP_Worker);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $SimplyXMLObject->asXML());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-type: application/vnd.cip4-jmf+xml'
            ));

            $curlHandles[$key] =  $ch;
            curl_multi_add_handle($mh,$ch);

        }

        $active = null;
        //execute the handles
        do {
            $mrc = curl_multi_exec($mh, $active);
        }
        while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) != -1) {
                do {
                    $mrc = curl_multi_exec($mh, $active);
                } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }
        }

        $returnArray = array();

        /* This is the relevant bit */
        // iterate through the handles and get your content
        foreach ($curlHandles as $key => $ch) {
            $response = curl_multi_getcontent($ch); // get the content
            // do what you want with the HTML
            curl_multi_remove_handle($mh, $ch); // remove the handle (assuming  you are done with it);

            $returnArray[$key] = $response;
        }
        /* End of the relevant bit */

        curl_multi_close($mh); // close the curl multi handler

        return $returnArray;

    }

    public function getXML()
    {
        $ReturnXML = $this->SimpleXMLObject->asXML();
        return $ReturnXML;
    }

    public function saveFile($fileName)
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