<?php
/* Here is the project name set/updated */
if (isset($_POST['project-name'])) {

	if ($_POST['project-name'] !== '') {
	$projectFile = __DIR__ . '/config/project.txt';
	$handle = fopen($projectFile, 'w+');
	fwrite($handle, $_POST['project-name']);
	fclose($handle);
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}
	else
	{
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}
}
?>
