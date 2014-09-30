		<footer id="footer">
			<p>footer</p>
		</footer>
		<!-- / footer -->

	</div>
	<!-- / container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/<?php echo JQUERY_VERSION;?>/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $path?>_ui/js/modules/jquery-<?php echo JQUERY_VERSION;?>.min.js"><\/script>')</script>
	<script src="<?php echo $path;?>_ui/js/main-min.js"></script>

<?php
if (!isset ($export)):
	require '../lib/developer-bar.php';
endif;
?>

</body>
</html>
