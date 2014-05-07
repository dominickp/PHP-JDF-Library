<?php
$pageTitle = 'Container Class';
include('inc/header.php');
?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-12">
                    <h2><?php echo $pageTitle; ?></h2>

                    <p>
                        The Container class allows you to access the objects in the library: <a href="jdf.php">JDF</a>, <a href="jmf.php">JMF</a>, and the <a href="manager.php">Manager</a>.
                    </p>

                    <h3>Start using the class</h3>

                    <section>

                        <h4>Create an instance</h4>

                        <p>Make a Container object.</p>
                        <pre><code class="php">require 'Class/Container.php';

$Container = new Container();</code></pre>

                    </section>

                    <h3>Methods</h3>

                    <section>

                        <h4>getJDF()</h4>

                        <p>Make an instance of the JDF object.</p>
                        <pre>object getJMF(string $jobName, string $process [, int $quantity ])</pre>
                        <pre><code class="php">$JDF = $Container->getJDF('MyTestJDF', 'DigitalPrinting', 100);</code></pre>

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

                    <section>

                        <h4>getJMF()</h4>

                        <p>Make an instance of the JMF object.</p>
                        <pre>object getJMF()</pre>
                        <pre><code class="php">$JMF = $Container->getJMF();</code></pre>

                    </section>

                    <section>

                        <h4>getManager()</h4>

                        <p>Make an instance of the Manager object.</p>
                        <pre>object getManager()</pre>
                        <pre><code class="php">$Manager = $Container->getManager();</code></pre>

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