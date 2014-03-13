# PHP-JDF-Library

This is intended to be a collection of PHP classes which can be used to create and interpret JDF files. The JDF spec is very broad, so for now I'm going to focus my development efforts on JDFs used by HP Indigos and the HP Digital Front End (DFE). I've built in some exception handling so values that don't comply with the spec are refused.

## How to use
Please [read this wiki page on usage](https://github.com/dominickp/PHP-JDF-Library/wiki/How-to-use)

### Example Output (as of 2/15)
```xml
<?xml version="1.0" encoding="UTF-8"?>
<JDF xmlns="http://www.CIP4.org/JDFSchema_1_1" Type="Combined" ID="rootNodeId" Status="Waiting" JobPartID="000.cdp.797" Version="1.3" Types="DigitalPrinting" DescriptiveName="MyTestJDF">
  <AuditPool>
    <Created AgentName="PHP-JDF-LIbrary" TimeStamp="2014-02-15 23:22:13"/>
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
    <GatheringParams Class="Parameter" ID="GP001" Status="Available">
      <Disjointing Number="1">
        <InsertSheet SheetType="SeparatorSheet" SheetUsage="Trailer"/>
      </Disjointing>
    </GatheringParams>
  </ResourcePool>
  <ResourceLinkPool>
    <DigitalPrintingParamsLink rRef="DPP001" Usage="Input"/>
    <ComponentLink rRef="Component" Usage="Output" Amount="100"/>
    <MediaLink rRef="M001" Usage="Input"/>
    <RunListLink rRef="RunList_1" Usage="Input"/>
    <DeviceLink rRef="D001" Usage="Input"/>
    <LayoutPreparationParamsLink rRef="LPP001" Usage="Input"/>
    <GatheringParamsLink rRef="GP001" Usage="Input"/>
  </ResourceLinkPool>
  <Comment Name="GeneralComments">Test comment</Comment>
  <CustomerInfo BillingCode="MyJobNumber" CustomerID="MyCustomer"/>
</JDF>
```
### Todo
- Setup better example with a form
- More research on HP implementation specific values and error handling for bad input values

### JDF Spec
I'm using this as a reference: http://www.cip4.org/documents/jdf_specifications/html/Structure_of_JDF_Nodes.html
