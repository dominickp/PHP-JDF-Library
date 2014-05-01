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
                        The JDF object allows you to define a job using a several methods. Once your JDF object is
                        defined, you can get the JDF as XML, a .jdf file, or post it directly to a device.
                    </p>

                    <h3>Start using the class</h3>

                    <section>

                        <h4>getJDF()</h4>

                        <p>Load the PHPJDFLibrary class and make an instance of the JDF object.</p>
                        <pre>object getJDF(string $jobName, string $process [, int $quantity ])</pre>
                        <pre><code class="php">require 'JDF/PHPJDFLibrary.php';

$PHPJDFLibrary = new PHPJDFLibrary();

$JDF = $PHPJDFLibrary->getJDF('MyTestJDF', 'DigitalPrinting', 100);</code></pre>

                        <ul>
                            <li>The two required parameters are job name and process name, both as strings.</li>
                            <li>Valid processes are one of the following:</li>
                            <ul>
                                <li>Binding, Cutting, DigitalPrinting, FinalImaging, FinalRIPing, Folding, Newsprinting,
                                    PostPress, PrePress, Printing, ProofImaging, ProofRIPing, PublishingPreparation.
                                    RIPing, WebPrinting
                                </li>
                            </ul>
                            <li>The third parameter is quantity. Leaving this blank will default to 1.</li>
                        </ul>

                    </section>

                    <h3>Required Methods</h3>

                    <section>

                        <h4>setFile()</h4>

                        <p>Allow the class to analyze the local file you're building the JDF for.</p>
                        <pre>string setFile(string $localFileLocation [, string $runListID [, string $status ]])</pre>
                        <pre><code class="php">$URL = $JDF->setFile('files/my_job.pdf');</code></pre>

                    </section>

                    <h3>Optional Methods</h3>

                    <section>

                        <h4>setComment()</h4>

                        <p>Adds a comment to the job.</p>
                        <pre>void setComment(string $comment)</pre>
                        <pre><code class="php">$JDF->setComment('Test comment');</code></pre>

                    </section>
                    <section>

                        <h4>setMedia()</h4>

                        <p>Used to define the press substrate/paper the job uses.</p>
                        <pre>void setMedia(string $substrateName [, string $mediaID [, string $status ]])</pre>
                        <pre><code class="php">$JDF->setMedia('12x18 100# Gloss Cover');</code></pre>
                        <ul>
                            <li>This has to match the substrate name as found on the press/DFE exactly for it to show up
                                on press.
                            </li>
                        </ul>

                    </section>
                    <section>

                        <h4>setDevice()</h4>

                        <p>Set the job location. This tells the press/DFE if the job should be held in the DFE queue,
                            print queue, or even to print automatically.</p>
                        <pre> void setDevice( [string $IDUsage [, string $IDValue [, string $ID [, string $class [, string $status ]]]])</pre>
                        <pre><code class="php">$JDF->setDevice('QueueDestination', 'Held');</code></pre>
                        <ul>
                            <li>Default settings (specifying no parameters) will send the job to be held in the print
                                queue.
                            </li>
                            <li>I think these values might be implementation (HP) specific, so I'll need to determine
                                all of the possible options and then modify this function to throw an exception in case
                                of a bad value.
                            </li>
                        </ul>

                    </section>
                    <section>

                        <h4>setLayoutPreparationParams()</h4>

                        <p>Used to choose an imposition template and tumble setting.</p>
                        <pre>void setLayoutPreparationParams(string $side_type [, mixed $impositionTemplateURL [, string $ID [, string $status [, string $class ]]]])</pre>
                        <pre><code class="php">$JDF->setLayoutPreparationParams('TwoSidedFlipY', 'urn:8_up_postcards');</code></pre>

                        <ul>
                            <li>Tumble setting must be one of the following</li>
                            <ul>
                                <li>OneSidedBackFlipX, OneSidedBackFlipY, OneSidedFront, TwoSidedFlipX, TwoSidedFlipY
                                </li>
                            </ul>
                            <li>The external imposition template is an optional parameter and it must be the complete
                                location of the imposition template, where the print device/DFE can locate it.
                            </li>
                        </ul>

                    </section>
                    <section>

                        <h4>setCustomerInfo()</h4>

                        <p>Set billing code and customer.</p>
                        <pre>void setCustomerInfo(string $jobNumber, string $customer)</pre>
                        <pre><code class="php">$JDF->setCustomerInfo('MyJobNumber', 'MyCustomer');</code></pre>

                    </section>
                    <section>

                        <h4>setGatheringParams()</h4>

                        <p>Set gathering parameters. Will research a bit more, but this seems to be HP implementation
                            specific instructions on what to do after the job prints, e.g. insert a slip sheet.</p>
                        <pre>void setGatheringParams( [string $sheetType [, string $sheetUsage [, string $ID [, string $status [, string $class ]]]]])</pre>
                        <pre><code class="php">$JDF->setGatheringParams('SeparatorSheet', 'Trailer');</code></pre>
                        <ul>
                            <li>Will find out what set values are allowed here and add some exception handling.</li>
                        </ul>

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