<?php

if ($handle = opendir( __DIR__ . '/../php')) {
	$statusFileContent = '';
  while (false !== ($file = readdir($handle))) {
	  if ($file != '.' && $file != '..') {
			$pathinfo = pathinfo($file);
			if (@$pathinfo['extension'] == 'php') {

				/* Generate HTML templates */
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

	/* Write actual template status and names */
	$statusFileName = __DIR__ . '/../php/config/status.txt';
	$statusFile = fopen($statusFileName, 'w+');
	fwrite($statusFile, $statusFileContent);
	fclose($statusFile);

}

/* Create .zip archive with project */
$the_folder = '../html/';
$zip_file_name = '../html/html.zip';
 
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
            if ($file == '.' || $file == '..' || $file == 'html.zip') continue;
 
            // Recursive, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    }
}

/* Generate HTML template with project overview */
ob_start();
include( __DIR__ . '/../index.php');
$exportedFile = ob_get_contents();
ob_end_clean();
file_put_contents( __DIR__ . '/../html/index.html', $exportedFile);
if (isset($_SERVER['HTTP_REFERER'])):
    header('Location:'.$_SERVER['HTTP_REFERER'].'');
endif;
?>
