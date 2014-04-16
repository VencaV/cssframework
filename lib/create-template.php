<?php
/* Create new template */
$file = __DIR__ . '/../php/' . $_POST['new-template-source'];
$fileTmp = __DIR__ . '/../php/' . $_POST['new-template-source'] . '.tmp';
$newfile = __DIR__ . '/../php/' . addslashes($_POST['new-template-name']) . '.php';

// Create temporary file
copy($file,$fileTmp);

if (!copy($fileTmp, $newfile)) {
    echo "failed to copy $file...\n";
}
else
{
	// Delete temporary file
	unlink($fileTmp);
	// Change template name
	$str = file_get_contents($newfile);

	if (isset ($_POST['new-template-title']) ) {
		$title = addslashes($_POST['new-template-title']);
	}
	else {
		$title = $_POST['new-template-name'];
	}
	

	$str = preg_replace('/\$templateName = \'(.*?)\';/', "\$templateName = '" . ucfirst($title) . "';", $str);
	echo $str;

	file_put_contents($newfile, $str);

	require_once ( __DIR__ . '/index.php');
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
}
?>
