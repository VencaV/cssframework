<?php
/* Create new template */
$file = __DIR__ . '/../php/' . $_POST['new-template-source'];
$newfile = __DIR__ . '/../php/' . $_POST['new-template-name'] . '.php';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}
else
{
	// Change template name
	$str = file_get_contents($newfile);

	$title = $_POST['new-template-name'];
	$str = preg_replace('/\$templateName = \'(.*?)\';/', "\$templateName = '" . ucfirst($title) . "';", $str);
	echo $str;

	file_put_contents($newfile, $str);

	require_once ( __DIR__ . '/index.php');
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
}
?>
