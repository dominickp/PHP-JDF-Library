# PHP-JDF-Library

This is intended to be a collection of PHP classes which can be used to create and interpret JDF files. The JDF spec is very broad, so for now I'm going to focus my development efforts on JDFs used by HP Indigos and the HP Digital Front End (DFE). I've built in some exception handling so values that don't comply with the spec are refused.

## Creating a JDF
### Required Methods

1. Load the CreateJDF class in PHP and then create an instance of it.
 ```php
 $JDF = new CreateJDF('MyJobName', 'DigitalPrinting');
 ```
 a. The two required parameters are job name and process name, both as strings.

 b. Valid processes are one of the following:
  - Binding, Cutting, DigitalPrinting, FinalImaging, FinalRIPing, Folding, Newsprinting, PostPress, PrePress, Printing, ProofImaging, ProofRIPing, PublishingPreparation. RIPing, WebPrinting

2. Set your file with setFile()
 ```php
 $URL = $JDF->setFile($InputLocation.$MyFile);
 ```
 a. This method requires the path to the local, readable, file. The final is needed locally so the mimetype can be found.
 
 b. This method will return the destination URL. Meaning, the URL the art file is expected to be, where the print device can look for the file on its local system. This means that you will have to move or copy the file from where PHP has access to it to a destination where the print device (DFE in the Indigo's case) can access it.

3. Call any optional methods

4. Output! 
 ```php
 $rawXML = $JDF->getXML();
 ```
 a. I will have another method for creating the .JDF file automatically, but for now this will put the XML in a variable.
 
 b. You can set the following to output the XML properly on a PHP page:
 
 ```php
 Header('Content-type: text/xml');
 print_r($rawXML);
 ```

### Optional Methods

- Set comments

 ```php
 $JDF->setComment("Test comment");
 ```
 
- Assign a substrate/media
 ```php
 $JDF->setMedia("Substrate Name 1");
 ```
 a. This has to match the substrate name as found on the press/DFE exactly for it to show up on press.
 
- Set the job location. This tells the press/DFE if the job should be helf in the DFE queue, print queue, or even to print automatically. 

 ```php
 $JDF->setDevice('QueueDestination', 'Held');
 ```
 a. Default settings (specifying no parameters) will send the job to be held in the print queue.
 
 b. I think these values might be implimentation (HP) specific, so I'll need to determine all of the possible options and then modify this function to throw an exception in case of a bad value.
 
- Choose a tumble setting and imposition template

 ```php
 $JDF->setLayoutPreparationParams('TwoSidedFlipY', 'urn:8_up_postcards');
 ```
 a. Tumble setting must be one of the following
 
  - OneSidedBackFlipX, OneSidedBackFlipY, OneSidedFront, TwoSidedFlipX, TwoSidedFlipY
 
 b. The external imposition template is an optional parameter and it must be the complete location of the imposition template, where the print device/DFE can locate it.
 
- Set billing code and customer
 ```php
 $JDF->setCustomerInfo('MyJobNumber', 'MyCustomer');
 ```

### Example Output (as of 2/13)
```xml
<?xml version="1.0" encoding="UTF-8"?>
<JDF xmlns="http://www.CIP4.org/JDFSchema_1_1" Type="Combined" ID="rootNodeId" Status="Waiting" JobPartID="000.cdp.797" Version="1.3" Types="DigitalPrinting" DescriptiveName="MyTestJDF">
	<AuditPool>
		<Created AgentName="PHP-JDF-LIbrary" TimeStamp="2014-02-14 04:29:33"/>
	</AuditPool>
	<ResourcePool>
		<DigitalPrintingParams Class="Parameter" ID="DPP001" Status="Available">
			<MediaRef rRef="M001"/>
		</DigitalPrintingParams>
		<Component Class="Quantity" ID="Component" Status="Unavailable" ComponentType="FinalProduct"/>
		<Media Class="Consumable" ID="M001" Status="Available" DescriptiveName="Substrate Name 1"/>
		<RunList ID="RunList_1" Status="Available" Class="Parameter">
			<LayoutElement>
				<FileSpec MimeType="image/jpeg" URL="FILE://hppro01-sm1/Jobs/example_image.jpg"/>
			</LayoutElement>
		</RunList>
		<Device Class="Implementation" ID="D001" Status="Available">
			<GeneralID IDUsage="QueueDestination" IDValue="Held"/>
		</Device>
		<LayoutPreparationParams Class="Parameter" ID="LPP001" Status="Available" Sides="TwoSidedFlipY">
			<ExternalImpositionTemplate>
				<FileSpec URL="urn:8_up_postcards"/>
			</ExternalImpositionTemplate>
		</LayoutPreparationParams>
	</ResourcePool>
	<Comment Name="GeneralComments">Test comment</Comment>
	<CustomerInfo BillingCode="MyJobNumber" CustomerID="MyCustomer"/>
	<ResourceLinkPool>
		<MediaLink rRef="M001" Usage="Input"/>
		<DigitalPrintingParamsLink rRef="DPP001" Usage="Input"/>
	</ResourceLinkPool>
</JDF>
```
### Todo
- Generate the rest of the resource link pool
- Setup better example with a form
- Output as a file

### JDF Spec
I'm using this as a reference: http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html
