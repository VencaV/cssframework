<?php

switch($_POST['action']) {
	case 'removeJs':
		$content = '';
		foreach($_POST['data'] as $key=>$value) {
			$content .= $key . ';';
		}
		$file = __DIR__ . '/package-defaults/jsFiles.txt';
		$handle = fopen($file, 'w');
		fwrite($handle, substr($content, 0, -1));
		fclose($handle);
		break;
	case 'removeMagic':
		$content = '';
		foreach($_POST['data'] as $key=>$value) {
			$content .= $key . ';';
		}
		$file = __DIR__ . '/package-defaults/magicFiles.txt';
		$handle = fopen($file, 'w');
		fwrite($handle, substr($content, 0, -1));
		fclose($handle);
		break;
	case 'addMagic':
		$file = __DIR__ . '/package-defaults/magicFiles.txt';
		$handle = fopen($file, 'a+');
		$content = ';' . $_POST['file'];
		fwrite($handle, $content);
		fclose($handle);
		break;
	case 'addJs':
	default:
		$file = __DIR__ . '/package-defaults/jsFiles.txt';
		$handle = fopen($file, 'a+');
		$content = ';' . $_POST['file'];
		fwrite($handle, $content);
		fclose($handle);
		break;
}

require_once (  __DIR__ . '/../create-package.php');
header('Location:'.$_SERVER['HTTP_REFERER'].'');

?>