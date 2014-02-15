<?php

include 'parameters.php';

class CreateJDF
{

    public $JDFInitialize;
    public $ResourcePool;
    public $ResourceLinkPool;
    public $FileDirectory;
    public $OutputDirectory;
    public $Params;
    public $DescriptiveName;

    public function __construct($DescriptiveName, $Types = 'DigitalPrinting', $Quantity = 1)
    {
        global $UltimateFileDestination;
        $this->FileDirectory = $UltimateFileDestination;

        global $OutputLocation;
        $this->OutputDirectory = $OutputLocation;

        // These are used to generate the initial XML field attributes
        $XMLEncoding = '<?xml version="1.0" encoding="UTF-8"?>';
        $JDFType = 'Combined';
        $XMLNS = 'http://www.CIP4.org/JDFSchema_1_1';
        $Id = 'rootNodeId';
        $Status = 'Waiting';
        $JobPartId = '000.cdp.797';

        // Check for acceptable types
        $AcceptableTypes = array(
            'Binding', 'Cutting', 'DigitalPrinting', 'FinalImaging', 'FinalRIPing', 'Folding', 'Newsprinting', 'PostPress', 'PrePress', 'Printing', 'ProofImaging', 'ProofRIPing', 'PublishingPreparation', 'RIPing', 'WebPrinting'
        );

        if (!in_array($Types, $AcceptableTypes)) throw new Exception("[$Types] is not an acceptable JDF type.");

        $Version = '1.3';

        // Initialize the JDF
        $JDFStart = $XMLEncoding . '<JDF Type="' . $JDFType . '" xmlns="' . $XMLNS . '" ID="' . $Id . '" Status="' . $Status . '" JobPartID="' . $JobPartId . '" Version="' . $Version . '" Types="' . $Types . '" DescriptiveName="' . $DescriptiveName . '"></JDF>';

        $this->JDFInitialize = new SimpleXMLElement($JDFStart, LIBXML_NOEMPTYTAG);

        // Add some information about where this JDF came from
        $AuditPool = $this->JDFInitialize->addChild('AuditPool');
        $Comments = $AuditPool->addChild("Created");
        $Comments->addAttribute("AgentName", "PHP-JDF-LIbrary");
        $Comments->addAttribute("TimeStamp", date("Y-m-d H:i:s"));

        // Add children that we will need regardless
        $this->setResourcePool();
        $this->setResourceLinkPool();
        $this->setParams($Types);
        $this->setComponent($Quantity);
    }

    public function setResourcePool()
    {
        $this->ResourcePool = $this->JDFInitialize->addChild("ResourcePool");
    }

    public function setParams($Types, $ID = "DPP001", $Class = "Parameter", $Status = "Available")
    {
        $this->Params = $this->ResourcePool->addChild($Types . "Params");
        $this->Params->addAttribute("Class", $Class);
        $this->Params->addAttribute("ID", $ID);
        $this->Params->addAttribute("Status", $Status);
        // Update link pool
        $MediaLink = $this->ResourceLinkPool->addChild($Types . "ParamsLink");
        $MediaLink->addAttribute("rRef", $ID);
        $MediaLink->addAttribute("Usage", "Input");
    }

    public function setComponent($Quantity = 1, $Class = "Quantity", $ID = "Component", $Status = "Unavailable", $ComponentType = "FinalProduct")
    {
        $Component = $this->ResourcePool->addChild("Component");
        $Component->addAttribute("Class", $Class);
        $Component->addAttribute("ID", $ID);
        $Component->addAttribute("Status", $Status);
        $Component->addAttribute("ComponentType", $ComponentType);

        // Update the link pool
        $ComponentLink = $this->ResourceLinkPool->addChild("ComponentLink");
        $ComponentLink->addAttribute("rRef", $ID);
        $ComponentLink->addAttribute("Usage", "Output");
        $ComponentLink->addAttribute("Amount", $Quantity);
    }

    public function setComment($Comment)
    {
        $Comments = $this->JDFInitialize->addChild('Comment', $Comment);
        $Comments->addAttribute("Name", "GeneralComments");
    }

    public function setMedia($SubstrateName, $MediaID = 'M001', $Status = 'Available')
    {
        $Media = $this->ResourcePool->addChild("Media");
        $Media->addAttribute("Class", "Consumable");
        $Media->addAttribute("ID", $MediaID);
        $Media->addAttribute("Status", $Status);
        $Media->addAttribute("DescriptiveName", $SubstrateName);
        // Set the linked Params media reference
        $MediaRef = $this->Params->addChild("MediaRef");
        $MediaRef->addAttribute("rRef", $MediaID);

        // Update the link pool
        $MediaLink = $this->ResourceLinkPool->addChild("MediaLink");
        $MediaLink->addAttribute("rRef", $MediaID);
        $MediaLink->addAttribute("Usage", "Input");
    }

    public function setDevice($IDUsage = "QueueDestination", $IDValue = "Held", $ID = "D001", $Class = "Implementation", $Status = "Available")
    {
        $Device = $this->ResourcePool->addChild("Device");
        $Device->addAttribute("Class", $Class);
        $Device->addAttribute("ID", $ID);
        $Device->addAttribute("Status", $Status);

        $GeneralID = $Device->addChild("GeneralID");
        $GeneralID->addAttribute("IDUsage", $IDUsage);
        $GeneralID->addAttribute("IDValue", $IDValue);

        // Update the link pool
        $DeviceLink = $this->ResourceLinkPool->addChild("DeviceLink");
        $DeviceLink->addAttribute("rRef", $ID);
        $DeviceLink->addAttribute("Usage", "Input");
    }

    public function setLayoutPreparationParams($Sides = "OneSidedFront", $ImpositionTemplateURL = null, $ID = "LPP001", $Status = "Available", $Class = "Parameter")
    {
        // Check to make sure the selected Sides variable is an OK JDF value
        $AcceptableTypes = array('OneSidedBackFlipX', 'OneSidedBackFlipY', 'OneSidedFront', 'TwoSidedFlipX', 'TwoSidedFlipY');
        if (!in_array($Sides, $AcceptableTypes)) throw new Exception("[$Sides] is not an acceptable JDF EnumSides value.");

        $LayoutPreparationParams = $this->ResourcePool->addChild("LayoutPreparationParams");
        $LayoutPreparationParams->addAttribute("Class", $Class);
        $LayoutPreparationParams->addAttribute("ID", $ID);
        $LayoutPreparationParams->addAttribute("Status", $Status);
        $LayoutPreparationParams->addAttribute("Sides", $Sides);

        if (!empty($ImpositionTemplateURL)) {
            $ExternalImpositionTemplate = $LayoutPreparationParams->addChild("ExternalImpositionTemplate");
            $FileSpec = $ExternalImpositionTemplate->addChild("FileSpec");
            $FileSpec->addAttribute("URL", $ImpositionTemplateURL);
        }
        // Update the link pool
        $LayoutPreparationParamsLink = $this->ResourceLinkPool->addChild("LayoutPreparationParamsLink");
        $LayoutPreparationParamsLink->addAttribute("rRef", $ID);
        $LayoutPreparationParamsLink->addAttribute("Usage", "Input");
    }

    public function setFile($LocalFile, $RunListID = 'RunList_1', $Status = 'Available')
    {
        $RunList = $this->ResourcePool->addChild("RunList");
        $RunList->addAttribute("ID", $RunListID);
        $RunList->addAttribute("Status", $Status);
        $RunList->addAttribute("Class", 'Parameter');

        $LayoutElement = $RunList->addChild("LayoutElement");

        $FileSpec = $LayoutElement->addChild("FileSpec");

        // Get MIME type of file passed through
        if (!file_exists($LocalFile)) throw new Exception("[$LocalFile] cannot be found and therefore the MIME type cannot be determined.");
        $FileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $MIMEType = finfo_file($FileInfo, $LocalFile);
        finfo_close($FileInfo);
        $FileSpec->addAttribute("MimeType", $MIMEType);

        $URL = $this->FileDirectory . basename($LocalFile);
        $FileSpec->addAttribute("URL", $URL);

        // Update the link pool
        $RunListLink = $this->ResourceLinkPool->addChild("RunListLink");
        $RunListLink->addAttribute("rRef", $RunListID);
        $RunListLink->addAttribute("Usage", "Input");

        // Return the final file destination that the print device will be looking for
        return $URL;
    }

    public function setGatheringParams($SheetType = "SeparatorSheet", $SheetUsage = "Trailer", $ID = "GP001", $Status = "Available", $Class = "Parameter")
    {
        $GatheringParams = $this->ResourcePool->addChild("GatheringParams");
        $GatheringParams->addAttribute("Class", $Class);
        $GatheringParams->addAttribute("ID", $ID);
        $GatheringParams->addAttribute("Status", $Status);

        $Disjointing = $GatheringParams->addChild("Disjointing");
        $Disjointing->addAttribute("Number", 1);

        $InsertSheet = $Disjointing->addChild("InsertSheet");
        $InsertSheet->addAttribute("SheetType", $SheetType);
        $InsertSheet->addAttribute("SheetUsage", $SheetUsage);

        // Update the link pool
        $GatheringParamsLink = $this->ResourceLinkPool->addChild("GatheringParamsLink");
        $GatheringParamsLink->addAttribute("rRef", $ID);
        $GatheringParamsLink->addAttribute("Usage", 'Input');
    }

    public function setCustomerInfo($BillingCode, $CustomerID)
    {
        $CustomerInfo = $this->JDFInitialize->addChild("CustomerInfo");
        $CustomerInfo->addAttribute("BillingCode", $BillingCode);
        $CustomerInfo->addAttribute("CustomerID", $CustomerID);
    }

    public function setResourceLinkPool()
    {
        // Initiate the link pool
        $this->ResourceLinkPool = $this->JDFInitialize->addChild("ResourceLinkPool");
    }

    public function getXML()
    {
        $ReturnXML = $this->JDFInitialize->asXML();
        return $ReturnXML;
    }

    public function save($fileName)
    {
        if(empty($fileName)) throw new Exception("Filename must be set to use the save() method.");

        // Attempt to preserve white space (formatting
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->JDFInitialize->asXML());
        file_put_contents($this->OutputDirectory.$fileName.'.jdf',  $dom->saveXML());
    }

}