# PHP-JDF-Library

This is intended to be a collection of PHP classes which can be used to create and interpret JDF files. One such use for these JDFs could be used to automate jobs from a PHP application into an HP Indigo or other JDF ready device. The JDF spec is very broad, so for now I'm going to focus my development efforts on JDFs used by HP Indigos and the HP Digital Front End (DFE).

## Creating a JDF
##### Load the CreateJDF class in PHP and then create an instance of it.
`$JDF = new CreateJDF($JobName, $JobType);`
The job name and type must be specified at this step. The job name is any string but the job type must be a valid JDF job type (Binding, Cutting, DigitalPrinting, FinalImaging, FinalRIPing, Folding, Newsprinting, PostPress, PrePress, Printing, ProofImaging, ProofRIPing, PublishingPreparation. RIPing, WebPrinting).

##### Required Methods
- setFile($LocalFile);

### JDF Spec
I'm using this as a reference: http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html