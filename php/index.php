<?php
/* Název stránky, který se zobrazuje v titulku stránky a v přehledu šablon */
$templateName = 'Úvodní stránka';
/* Podle $menu se zvýrazňují aktivní položky v menu */
$menu = 'uvod';
/* Stav šablony pro stránku přehledu; 0 = čeká, 1 = zpracovává se, 2 = dokončeno */
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
