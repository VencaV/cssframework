<?php
/* Here is the project name set/updated */
if (isset($_POST['project-name'])) {

	if ($_POST['project-name'] !== '') {
	$handle = __DIR__ . '/../php/config/project.txt';
	$projectFile = fopen($handle, 'w+');
	fwrite($projectFile, $_POST['project-name']);
	fclose($handle);
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}
	else
	{
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}
}
?>
