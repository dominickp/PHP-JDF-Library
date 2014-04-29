<?php
	$pageTitle = 'Home';
	include('inc/header.php');
?>
<div class="row">
    <div class="col-md-8">
        <div class="row">

            <div class="col-md-12">
                <h2>Description</h2>
                <p>
                    The Job Definition Format (JDF) is a specification, based on XML, which is designed to help print jobs flow through a shop. The standard allows one format that many vendors can use to define jobs and also send messages about the status of jobs and the graphic equipment which is producing them. <?php echo $libraryTitle; ?> is a collection of PHP classes made to create and send JDF and JMF. The focus of this library will be toward HP's specific implementation.
                </p>
                <p>
                    A practical example of how you might use this library could be in a web-to-print workflow. Jobs could come in from the web and using the JDF class, you could create a JDF to send into your Digital Front End (DFE), specifying how it imposes, what paper it prints on and more. This could allow your job to drop on press in an automated fashion. Another example would utilize the JMF spec where you could send a message to a print device (like a DFE) and it would tell you the status of a job.
                </p>
            </div>

            <div class="col-md-12">
                <h2>Requirements</h2>
                <ul>
                    <li>PHP 5.3+</li>
                    <li>cURL PHP module</li>
                </ul>
            </div>

            <div class="col-md-12">
                <h2>License</h2>
                Released under the <a href="https://github.com/dominickp/PHP-JDF-Library/blob/master/LICENSE" target="_blank">MIT license</a>.
            </div>

        </div>
    </div>
    <div class="col-md-4">

        <h3>Resources</h3>
        <h4>HP JDF IDP SDK</h4>
        <p>
          HP has an SDK outlining their JDF implementation in detail with several examples. You can download this SDK from <a href="https://spp.austin.hp.com/spp/Public/Sdk/SdkPublicDownload.aspx" target="_blank">HP's website <i class="fa fa-external-link"></i></a>. Just look for the <strong>JDF IDP SDK</strong> in the Indigo Digital Press kit area.
        </p>

        <h4>CIP4 JDF Specification</h4>
        <p>
          The JDF specification can be found at <a href="http://www.cip4.org/documents/jdf_specifications/" target="_blank">CIP4's website <i class="fa fa-external-link"></i></a>. Even though this is focused on HP's implementation, it will remain compliant with the spec.
        </p>

    </div>
</div>
<?php include('inc/footer.php'); ?>