<?php

$projectName = '';
$projectFile = __DIR__ . '/../php/config/project.txt';
$projectFileName = fopen($projectFile, 'r');
if (filesize($projectFile) > 0) {
$projectName = fread($projectFileName, filesize($projectFile));
}
else {
	$projectName = 'Název projektu';
}

fclose($projectFileName);

date_default_timezone_set('Europe/Prague');
/* Jméno projektu */
define ('PROJECT_NAME', trim($projectName));
/* Cesta k projektu */
define ('PROJECT_PATH', '../html/project/');
/* Doplní do šablon aktuálně použitou verzi jQuery */
define ('JQUERY_VERSION', '1.10.2');
?>
