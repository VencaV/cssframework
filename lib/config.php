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
/* Name of project */
define ('PROJECT_NAME', trim($projectName));
/* Path to project */
define ('PROJECT_PATH', '../html/project/');
/* Define actual jQuery version */
define ('JQUERY_VERSION', '1.11.3');
?>
