<?php
/* Page title, for <title> element and for project overview */
$templateName = 'Úvodní stránka';
/* Variable for highlighting active menu items */
$menu = 'uvod';
/* Project status for project overview; 0 = waiting, 1 = in progress, 2 = finished */
$templateStatus = 0;
require_once ( __DIR__ . '/../lib/config.php');
require ( __DIR__ . '/common/header.php');
?>
		<section id="content" role="main">
			<p>content</p>
		</section>
		<!-- / content -->
		<hr>

		<aside id="sidebar" role="complementary">
			<p>sidebar</p>
		</aside>
		<!-- / sidebar -->
		<hr>
<?php
require ( __DIR__ . '/common/footer.php');
?>
