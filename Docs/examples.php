<?php
$pageTitle = 'Code Examples';
include_once('inc/header.php');
?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <h2><?php echo $pageTitle; ?></h2>

                    <p>
                        Here are some ways you can use this library.
                    </p>

                    <section>

                        <h3>Build a JDF for a DFE/Indigo Hotfolder</h3>

                        <pre><code class="php">&lt;?php
/*
    This script builds a basic JDF and displays it as raw XML
*/

require('Class/Container.php'); // Include the container class

$Container = new Container(); // Get Container object

$JDF = $Container->getJDF('MyTestJDF', 'DigitalPrinting', 100); // Get the JDF object
$JDF->setFile('input/example_image.jpg', 'FILE://hppro01-sm1/Jobs/'); // Set the input file and output directory
$JDF->setMedia("100# Gloss Cover"); // Set paper
$JDF->setLayoutPreparationParams('TwoSidedFlipY', 'urn:8_up_postcards'); // Set imposition settings

$Manager = $Container->getManager(); // Get the Manager
$Manager->load($JDF); // Load our JDF object into the Manager

$MyXML = $Manager->getXML(); // Get XML

header("Content-type: text/xml; charset=utf-8"); // Set HTTP header to XML
print_r($MyXML);</code></pre>

                        <h4>Example Output</h4>

                        <pre><code class="xml"><?php include_once('examples/buildjdf.php'); ?></code></pre>

                    </section>

                </div>

            </div>
        </div>
    </div>
<?php include_once('inc/footer.php'); ?>