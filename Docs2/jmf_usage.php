<?php
$pageTitle = 'JMF Usage';
include('inc/header.php');
?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-12">
                    <h2><?php echo $pageTitle; ?></h2>

                    <p>
                        The JMF object allows you to create a JDF message to a print device to obtain information or send instructions.
                    </p>

                    <h3>Build a JMF Request</h3>

                    <section>

                        <h4 id="request_status">requestStatus()</h4>

                        <p>Allow the class to analyze the local file you're building the JDF for.</p>
                        <pre>void requestStatus([bool $detailed])</pre>
                        <pre><code class="php">$JMF->requestStatus(true);</code></pre>

                        <ul>
                            <li>Determine if you want to send the detailed or the basic status call by sending a true or false for the $detailed parameter. Default is false.</li>
                        </ul>

                    </section>

                    <section>

                        <h4 id="request_status">requestQueueStatus()</h4>

                        <p>Shows the jobs on the queue for the particular device.</p>
                        <pre>void requestQueueStatus()</pre>
                        <pre><code class="php">$JMF->requestQueueStatus(true);</code></pre>

                    </section>

                    <h3>Interpret a JMF Response</h3>

                    <section>

                        <h4 id="request_status">load()</h4>

                        <p>Load a JMF (as an XML string) into the class to easily get information out of it.</p>
                        <pre>void load(string $XML)</pre>
                        <pre><code class="php">$JMF->load($XML);</code></pre>

                    </section>
                    <section>

                        <h4 id="request_status">getResponse()</h4>

                        <p>Get the response as an object.</p>
                        <pre>object getResponse(string $XML)</pre>
                        <pre><code class="php">$responseObject = $JMF->getResponse($XML);</code></pre>

                    </section>

                </div>

            </div>
        </div>
        <div class="col-md-4">

            <h3>Quick Jump</h3>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="#request_status">requestStatus()</a></li>
            </ul>

        </div>
    </div>
<?php include('inc/footer.php'); ?>