<?php

include 'ZipMaster.php';

$zip = new ZipMaster\ZipMaster('backup/test.zip', 'test_folder');
$zip->archive();