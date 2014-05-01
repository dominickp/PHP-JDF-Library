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
                        The JDF object allows...
                    </p>

                    <h3>Start using the class</h3>

                    <section>

                        <h4>new JMF()</h4>

                        <p>Load the JMF class in PHP and then create an instance of it.</p>
                        <pre>object JMF()</pre>
                        <pre><code class="php">$JMF = new JMF();</code></pre>

                    </section>

                    <h3>Get basic status information</h3>

                    <section>

                        <h4>getStatus()</h4>

                        <p>Allow the class to analyze the local file you're building the JDF for.</p>
                        <pre>void getStatus()</pre>
                        <pre><code class="php">$JMF->getStatus();</code></pre>

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