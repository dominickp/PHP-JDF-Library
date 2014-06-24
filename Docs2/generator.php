<?php
$pageTitle = 'JDF Generator';
include_once('inc/header.php');
?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-sm-4">
                    <h2><?php echo $pageTitle; ?></h2>

                    <p>
                        Use this utility to create a custom JDF. An example input file is hard coded in.
                    </p>

                    <section>

                        <form id="generate_criteria" action="examples/generatejdf.php" method="post">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="job_name">Job Name</label>
                                        <input type="text" class="form-control" id="job_name" name="job_name" placeholder="Business cards" required="required" value="My business cards">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="100" value="1" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="job_type">Job Type</label>
                                <select class="form-control" name="job_type" id="job_type">
                                    <option>Binding</option>
                                    <option>Cutting</option>
                                    <option selected>DigitalPrinting</option>
                                    <option>FinalImaging</option>
                                    <option>FinalRIPing</option>
                                    <option>Folding</option>
                                    <option>Newsprinting</option>
                                    <option>PostPress</option>
                                    <option>PrePress</option>
                                    <option>Printing</option>
                                    <option>ProofImaging</option>
                                    <option>ProofRIPing</option>
                                    <option>PublishingPreparation</option>
                                    <option>RIPing</option>
                                    <option>WebPrinting</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="location">Device Asset Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="FILE://hppro01-sm1/Jobs/" value="FILE://hppro01-sm1/Jobs/" required="required">
                            </div>

                            <div class="form-group">
                                <label for="substrate">Substrate</label>
                                <input type="text" class="form-control" id="substrate" name="substrate" placeholder="100# Gloss Cover">
                            </div>

                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Check for color">
                            </div>

                            <hr>
                            <button type="submit" id="generate_btn" class="btn btn-success"><i class="fa fa-star-o"></i> Generate!</button>

                        </form>

                    </section>

                </div>
                <div class="col-sm-8">
                    <div id="generatedXML">

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include_once('inc/footer.php'); ?>