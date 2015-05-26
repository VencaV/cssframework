<?php
function getFiles($file,$filetype,$access,$location) {
  $output = '';
  $handle = fopen($file, $access);
  $path = '<%= pkg.' . $filetype . 'path %>';

  switch($location) {
    case 'overview':
      while (($file = fgets($handle, 4096)) !== false) {
        $files = explode(';', $file);
        foreach ($files as $file) {
          $output[] = $file;
        }
      }
    case 'package':
    default:
      while (($file = fgets($handle, 4096)) !== false) {
        $files = explode(';', $file);
        $count = count($files);
        $i = 0;
        foreach ($files as $file) {
          $i++;
          $comma = ',';
          if($count === $i) { $comma = ''; }
          echo '    "' . $path . $file . '"' . $comma . "\n";
        }
      }
    }
  fclose($handle);
  return $output;
}
?>