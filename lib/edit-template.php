<?php
/* Edit template title */
$file = __DIR__ . '/../php/' . $_POST['template'];

// Change template name
$str = file_get_contents($file);
$title = addslashes($_POST['new-template-title']);

$str = preg_replace('/\$templateName = \'(.*?)\';/', "\$templateName = '" . ucfirst($title) . "';", $str);

file_put_contents($file, $str);

require_once ( __DIR__ . '/index.php');
header('Location:'.$_SERVER['HTTP_REFERER'].'');

?>
