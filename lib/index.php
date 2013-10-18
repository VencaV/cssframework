<?php

if ($handle = opendir( __DIR__ . '/../php')) {
	$statusFileContent = '';
  while (false !== ($file = readdir($handle))) {
	  if ($file != '.' && $file != '..') {
			$pathinfo = pathinfo($file);
			if (@$pathinfo['extension'] == 'php') {

				/* Generuje HTML šablony */
				$export = true;
				ob_start();
				include( __DIR__ . '/../php/'.$pathinfo['basename']);
				$exportedFile = ob_get_contents();
				ob_end_clean();
				file_put_contents( __DIR__ . '/../html/project/'.$pathinfo['filename'].'.html', $exportedFile);
				$statusFileContent .= $templateName.';'.$pathinfo['basename'].';'.$templateStatus."\n";
			}
	  }
  }
  closedir($handle);

	/* Zapíše aktuální názvy a statusy šablon */
	$statusFileName = __DIR__ . '/../php/config/status.txt';
	$statusFile = fopen($statusFileName, 'w+');
	fwrite($statusFile, $statusFileContent);
	fclose($statusFile);

}

/* Vygeneruje HTML šablonu s přehledem projektu */
ob_start();
include( __DIR__ . '/../index.php');
$exportedFile = ob_get_contents();
ob_end_clean();
file_put_contents( __DIR__ . '/../html/index.html', $exportedFile);
?>
