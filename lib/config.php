<?php

$projectName = '';
$projectFile = __DIR__ . '/../php/config/project.txt';
$projectFileName = fopen($projectFile, 'r');
if (filesize($projectFile) > 0) {
$projectName = fread($projectFileName, filesize($projectFile));
}
else {
	$projectName = 'Project name';
}

fclose($projectFileName);

/* Name of project */
define ('PROJECT_NAME', trim($projectName));
/* Path to project */
define ('PROJECT_PATH', '../html/project/');
/* Define actual jQuery version */
define ('JQUERY_VERSION', '1.11.3');
?>
