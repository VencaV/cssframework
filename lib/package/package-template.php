<?php
require_once ( __DIR__ . '/package-settings.php');
require_once ( __DIR__ . '/../functions.php');
?>
{
  "name": "just-html-and-css-framework",
  "version": "<?php echo $packageVersion; ?>",
  "jqueryversion": "<?php echo $jqueryVersion; ?>",
  "author": "Václav Vracovský, http://vracovsky.cz/",
  "repository": {
    "type": "git",
    "url": "https://github.com/VencaV/cssframework.git"
  },
  "bugs": {
    "url": "https://github.com/VencaV/cssframework/issues"
  },
  "devDependencies": {
    "grunt": "~0.4.5",
    "grunt-contrib-less": "~0.11.4",
    "grunt-contrib-watch": "~0.6.1",
    "grunt-contrib-concat": "~0.5.0",
    "grunt-contrib-uglify": "~0.6.0",
    "grunt-php": "~1.0.1"
  },
  "bootstrapversion": "<?php echo $bootstrapVersion; ?>",
  "csspath": "<?php echo $cssPath; ?>",
  "jspath": "<?php echo $jsPath; ?>",
  "magicfiles": [
<?php
getFiles(__DIR__ . '/package-defaults/magicFiles.txt', 'magic', 'r', 'package')
?>
  ],
  "jsfiles": [
<?php
getFiles(__DIR__ . '/package-defaults/jsFiles.txt', 'js', 'r', 'package')
?>
  ]
}
