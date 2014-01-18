		<footer id="footer">
			<p>footer</p>
		</footer>
		<!-- / footer -->

	</div>
	<!-- / container -->

	<script>
	require = {
		paths: {
			jquery: '//ajax.googleapis.com/ajax/libs/jquery/<?php echo JQUERY_VERSION;?>/jquery.min'
		},
		baseUrl : '<?php echo $path;?>_ui/js/'
	};
	</script>
	<script data-main="main.min" src="<?php echo $path;?>_ui/js/require.js"></script>

<?php
if (!isset ($export)):
	require '../lib/developer-bar.php';
endif;
?>

</body>
</html>
