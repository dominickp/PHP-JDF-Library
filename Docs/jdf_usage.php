<?php
	$pageTitle = 'JDF Usage';
	include('inc/header.php');
?>
<div class="row">
    <div class="col-md-8">
        <div class="row">

            <div class="col-md-12">
                <h2><?php echo $pageTitle; ?></h2>
                <p>
                    The JDF object allows you to define a job using a several methods. Once your JDF object is defined, you can get the JDF as XML, a .jdf file, or post it directly to a device.
                </p>

                <section>

                    <h3>Start using the class</h3>
                    <h4>new JDF()</h4>
                    <pre><code class="php">object JDF(string $jobName, string $process [, int $quantity ]);</code></pre>
                    <p>Load the JDF class in PHP and then create an instance of it.</p>
                    <pre><code class="php">$JDF = new JDF('MyJobName', 'DigitalPrinting', 100);</code></pre>

                    <ul>
                        <li>The two required parameters are job name and process name, both as strings.</li>
                        <li>Valid processes are one of the following:</li>
                        <ul>
                            <li>Binding, Cutting, DigitalPrinting, FinalImaging, FinalRIPing, Folding, Newsprinting, PostPress, PrePress, Printing, ProofImaging, ProofRIPing, PublishingPreparation. RIPing, WebPrinting</li>
                        </ul>
                        <li>The third parameter is quantity. Leaving this blank will default to 1.</li>
                    </ul>

                </section>

                <section>

                    <h3>Required Methods</h3>
                    <h4>setFile()</h4>
                    <pre><code class="php">string setFile(string $localFileLocation [, string $runListID [, string $status ]]);</code></pre>
                    <p>Allow the class to analyze the local file you're building the JDF for.</p>
                    <pre><code class="php">$URL = $JDF->setFile('files/my_job.pdf');</code></pre>

                </section>

                <section>

                    <h3>Optional Methods</h3>
                    <h4>setComment()</h4>
                    <pre><code class="php">void setComment(string $comment)</code></pre>
                    <p>Add a comment to your job</p>
                    <pre><code class="php">$JDF->setComment("Test comment");</code></pre>

                </section>





            </div>

        </div>
    </div>
    <div class="col-md-4">

        <h3>Placeholder</h3>
        <p>
            Scrollspy here maybe
        </p>

    </div>
</div>
<?php include('inc/footer.php'); ?>