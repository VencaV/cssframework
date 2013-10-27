<?php
/* Create new template */
$file = __DIR__ . '/../php/' . $_POST['new-template-source'];
$newfile = __DIR__ . '/../php/' . $_POST['new-template-name'] . '.php';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}
else
{
	require_once ( __DIR__ . '/index.php');
	header('Location:'.$_SERVER['HTTP_REFERER'].'');
}
?>
