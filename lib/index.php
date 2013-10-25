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

/* Vytvoří .zip archiv */
$the_folder = '../html/';
$zip_file_name = '../html.zip';
 
$za = new FlxZipArchive;
 
$res = $za->open($zip_file_name, ZipArchive::CREATE);
 
if($res === TRUE) {
    $za->addDir($the_folder, basename($the_folder));
    $za->close();
}
else
    echo 'Could not create a zip archive';

class FlxZipArchive extends ZipArchive {
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
 
        $this->addDirDo($location, $name);
     }
    private function addDirDo($location, $name) {
        $name .= '/';
        $location .= '/';
 
        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;
 
            // Recursive, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    }
}

/* Vygeneruje HTML šablonu s přehledem projektu */
ob_start();
include( __DIR__ . '/../index.php');
$exportedFile = ob_get_contents();
ob_end_clean();
file_put_contents( __DIR__ . '/../html/index.html', $exportedFile);
?>
