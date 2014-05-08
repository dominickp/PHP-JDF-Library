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
                        The JDF object allows you to define a job using a several methods.

                    <h3>Required Methods</h3>

                    <section>

                        <h4 id="set_file">setFile()</h4>

                        <p>Allow the class to analyze the local file you're building the JDF for.</p>
                        <pre>string setFile(string $localFileLocation, string $externalDirectory [, string $runListID [, string $status ]])</pre>
                        <pre><code class="php">$URL = $JDF->setFile('files/my_job.pdf');</code></pre>

                    </section>

                    <h3>Optional Methods</h3>

                    <section>

                        <h4 id="set_comment">setComment()</h4>

                        <p>Adds a comment to the job.</p>
                        <pre>void setComment(string $comment)</pre>
                        <pre><code class="php">$JDF->setComment('Test comment');</code></pre>

                    </section>
                    <section>

                        <h4 id="set_media">setMedia()</h4>

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

                        <h4 id="set_devices">setDevice()</h4>

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

                        <h4 id="set_layout_prep_params">setLayoutPreparationParams()</h4>

                        <p>Used to choose an imposition template and tumble setting.</p>
                        <pre>void setLayoutPreparationParams(string $side_type [, mixed $impositionTemplateURL [, string $ID [, string $status [, string $class ]]]])</pre>
                        <pre><code class="php">$JDF->setLayoutPreparationParams('TwoSidedFlipY', 'urn:8_up_postcards');</code></pre>

                        <ul>
                            <li>Tumble setting must be one of the following
                                <ul>
                                    <li>OneSidedBackFlipX, OneSidedBackFlipY, OneSidedFront, TwoSidedFlipX, TwoSidedFlipY
                                    </li>
                                </ul>
                            </li>
                            <li>The external imposition template is an optional parameter and it must be the complete
                                location of the imposition template, where the print device/DFE can locate it.
                            </li>
                        </ul>

                    </section>
                    <section>

                        <h4 id="set_customer_info">setCustomerInfo()</h4>

                        <p>Set billing code and customer.</p>
                        <pre>void setCustomerInfo(string $jobNumber, string $customer)</pre>
                        <pre><code class="php">$JDF->setCustomerInfo('MyJobNumber', 'MyCustomer');</code></pre>

                    </section>
                    <section>

                        <h4 id="set_gathering_params">setGatheringParams()</h4>

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

            <h3>Quick Jump</h3>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="#set_file">setFile</a></li>
                <li><a href="#set_comment">setComment()</a></li>
                <li><a href="#set_media">setMedia()</a></li>
                <li><a href="#set_devices">setDevice()</a></li>
                <li><a href="#set_layout_prep_params">setLayoutPreparationParams()</a></li>
                <li><a href="#set_customer_info">setCustomerInfo()</a></li>
                <li><a href="#set_gathering_params">setGatheringParams()</a></li>
            </ul>

        </div>
    </div>
<?php include('inc/footer.php'); ?>