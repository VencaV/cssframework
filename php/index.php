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
			<p>
				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="http://dummy.mirtes.cz/600x600/333333" media="(min-width: 992px)">
					<source srcset="http://dummy.mirtes.cz/400x400/aaaaaa" media="(min-width: 768px)">
					<!--[if IE 9]></video><![endif]-->
					<img srcset="http://dummy.mirtes.cz/200x200/eeeeee" alt="Lorem ipsum">
				</picture>
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
