<?php
/* Delete template */
$phpFile =  __DIR__ . '/../php/' . $_POST['template'] . '.php';
$htmlFile =  __DIR__ . '/../html/project/' . $_POST['template'] . '.html';
$archiveFile =  __DIR__ . '/../html/html.zip';

unlink($phpFile);
unlink($htmlFile);
unlink($archiveFile);

require_once ( __DIR__ . '/index.php');
header('Location:'.$_SERVER['HTTP_REFERER'].'');

?>
