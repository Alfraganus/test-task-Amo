<?php
require 'CoreFuntions.php';

$result = new CoreFunctions();
$result->moveFiles();

echo 'Files have been moved successfully, but think function need to be set in CRON JOB to be able to run daily';
?>