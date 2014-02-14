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

4. Finalize with flush()
 ```php
 $JDF->flush();
 ```
 a. This method completes the JDF and prepares it for output.
 
 b. Any optional methods should be called before flush().
 
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


### JDF Spec
I'm using this as a reference: http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html