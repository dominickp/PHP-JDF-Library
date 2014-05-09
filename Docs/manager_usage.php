<?php
$pageTitle = 'Manager Usage';
include('inc/header.php');
?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-12">
                    <h2><?php echo $pageTitle; ?></h2>

                    <p>
                        The Manager object allows you to convert a <a href="jdf_usage.php">JDF</a> or <a href="jmf_usage.php">JMF</a> object into usable XML. This class also has other helpful methods for sending and saving the XML.
                    </p>


                    <h3>Required Methods</h3>

                    <section>

                        <h4 id="load">load()</h4>

                        <p>Load a JMF or JDF object into the Manager.</p>
                        <pre>void load(object $JDF)</pre>
                        <pre><code class="php">$Manager->load($JDF);</code></pre>

                    </section>

                    <h3>Optional Methods</h3>

                    <section>

                        <h4 id="get_xml">getXML()</h4>

                        <p>Get the loaded object as an XML string.</p>
                        <pre>string getXML()</pre>
                        <pre><code class="php">$MyXML = $Manager->getXML();

header("Content-type: text/xml; charset=utf-8");
print_r($MyXML);</code></pre>

                    </section>

                    <section>

                        <h4 id="post_xml">postXML()</h4>

                        <p>Post the loaded object as XML to a server and capture the response.</p>
                        <pre>string postXML(string $ServerAddress)</pre>
                        <pre><code class="php">$Response = $Manager->postXML('192.168.1.101');

header("Content-type: text/xml; charset=utf-8");
print_r($Response);</code></pre>

                        <ul>
                            <li>The URL scheme for a DFE is: "http://[DFE IP]:8080/prodflow/jmf/dfe".</li>
                            <li>If you have other devices connected to your DFE, you can access those by replacing "dfe" with the device IP: "http://[DFE IP]:8080/prodflow/jmf/[DEVICE IP]"</li>
                        </ul>


                    </section>

                </div>

            </div>
        </div>
        <div class="col-md-4">

            <h3>Quick Jump</h3>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="#load">load()</a></li>
                <li><a href="#get_xml">getXML()</a></li>
                <li><a href="#post_xml">postXML()</a></li>
            </ul>

        </div>
    </div>
<?php include('inc/footer.php'); ?>