<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/download-page-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>
<body>
<form action="buttonDownload.php" method="post">
<section class="pricing py-5">
    <div class="container">
        <div class="row">
            <!-- Free Tier -->
            <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Successful download</h5>
                        <hr>
                        <ul class="fa-ul">

                        </ul>
                        <div class="d-grid">
                            <button
                                    type="submit"
                                    name="success"
                                    value="sample.txt"
                                    class="btn btn-primary text-uppercase">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Plus Tier -->
            <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Unsuccessful download</h5>
                        <hr>

                        <div class="d-grid">
                            <button
                                    type="submit"
                                    name="fail"
                                    value="sample2.text"
                                    class="btn btn-danger text-uppercase">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pro Tier -->
        </div>
    </div>
</section>
</form>

<?php
require 'CoreFuntions.php';

$core = new CoreFunctions();

if(isset($_POST[key($_POST)])) {
   $result = $core->saveAndDownloadFile($_POST[key($_POST)]);
    if ($result['success']) {
        echo $core->getFileContent($result['url']);
    }
}


?>
<!--<script>
    var anchor=document.createElement('a');
    anchor.setAttribute('href','file_to_download/sample.txt');
    anchor.setAttribute('download','');
    document.body.appendChild(anchor);
    anchor.click();
    anchor.parentNode.removeChild(anchor);
</script>

-->
