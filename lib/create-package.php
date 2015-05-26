<?php
/* Generate package.json in root of the project */
ob_start();
$cssPath = 'html/project/_ui/css/';
$jsPath = 'html/project/_ui/js/';
include(  __DIR__ . '/package/package-template.php');
$exportedFile = ob_get_contents();
ob_end_clean();
file_put_contents( __DIR__ . '/../package.json', $exportedFile);

/* Generate package.json in html folder */
ob_start();
$cssPath = '../css/';
$jsPath = '../js/';
include(  __DIR__ . '/package/package-template.php');
$exportedFile = ob_get_contents();
ob_end_clean();
file_put_contents( __DIR__ . '/../html/project/_ui/.tools/package.json', $exportedFile);

?>
