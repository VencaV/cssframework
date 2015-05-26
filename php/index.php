<?php
/* Page title, for <title> element and for project overview */
$templateName = 'Homepage';
/* Variable for highlighting active menu items */
$menu = 'uvod';
/* Project status for project overview; 0 = waiting, 1 = in progress, 2 = finished */
$templateStatus = 0;
require_once ( __DIR__ . '/../lib/config.php');
require ( __DIR__ . '/common/header.php');
?>
		<section id="content" role="main">
			<p>
				<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="http://dummy.mirtes.cz/244x164" data-src-retina="http://dummy.mirtes.cz/488x328">
			</p>
			<p>
				<a class="btn btn-primary">Primary button</a><br>
				<a class="btn btn-default">Default button</a>
			</p>
		</section>
		<!-- / content -->

		<aside id="sidebar" role="complementary">
			<p>sidebar</p>
		</aside>
		<!-- / sidebar -->
<?php
require ( __DIR__ . '/common/footer.php');
?>
