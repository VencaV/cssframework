<div class="css-developer-bar">
	<span class="css-developer-bar-toggle" title="Toggle toolbar">></span>
	<div class="css-developer-bar-content">
		<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" class="css-developer-bar-toggle-media-queries">Toggle media queries</a>
	</div>
</div>
<style>
	.css-developer-bar,
	.css-developer-bar-toggle { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
	.css-developer-bar {
		z-index: 10000; position: fixed; right: 0; bottom: 0;
		padding: 0 0 0 30px; font-size: 14px; line-height: 24px;
		font-family: Consolas, 'Courier New', courier, monospace;
		border: 1px solid rgba(30,30,30,.75); background: rgba(30,30,30,.6);
		color: #fff; transition: all linear .25s; text-shadow: 1px 1px 0 rgba(0,0,0,.75);
		border-radius: 4px 0 0 0; box-shadow: inset 0 0 12px 0 rgba(0,0,0,.4);
	}
	.css-developer-bar:hover {
		border: 1px solid rgba(30,30,30,.95); background: rgba(0,0,0,.80);
	}
	.css-developer-bar .css-developer-bar-toggle {
		float: left; width: 31px; margin: 0 -2px 0 -30px;
		padding: 0 8px; border-right: 1px solid rgba(30,30,30,.75);
		line-height: 30px; text-align: center;
		font-size: 24px; font-weight: bold; cursor: pointer;
		background: rgba(255,255,255,.05); box-shadow: 1px 0 1px 0 rgba(0,0,0,.2);
	}
	.css-developer-bar:hover .css-developer-bar-toggle {
		border-right: 1px solid rgba(30,30,30,.95);
	}
	.css-developer-bar .css-developer-bar-content {
		float: right;
	}
	.css-developer-bar-true .css-developer-bar-content {
		display: none;
	}
	.css-developer-bar a {
		display: block; padding: 3px 7px; text-decoration: none; color: #fff;
	}
	.css-developer-bar a:hover {
		text-decoration: underline;
	}
	.css-developer-bar a:focus {
		outline: 0;
	}
</style>
<script>
	/* Toggle all media queries for development */
	if (getCookie('cssDeveloperBarNoMediaQueries') === 'true') {
		toggleMediaQueries();
		$('.css-developer-bar-toggle-media-queries').text('Switch on media queries');
	}
	else {
		setCookie('cssDeveloperBarNoMediaQueries',false);
		$('.css-developer-bar-toggle-media-queries').text('Switch off media queries');
	}
	function setCookie(key, value) {
		var expires = new Date();
		expires.setTime(expires.getTime() + (10 * 24 * 60 * 60 * 1000));
		document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
	}
	function getCookie(key) {
		var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
		return keyValue ? keyValue[2] : null;
	}
	function toggleMediaQueries() {
		$.ajax({
			'url': $(document).find('#css')[0].href,
			'dataType':'text',
			'success':function(data){
				var newData = data.replace(/@media/g, '@noMediaQueriesHereOk?');
				var newData = newData.replace(/\.\.\//g, '../html/project/_ui/');
				$('#css').remove();
				$('head').append('<style id="noMediaQueries"></style>');
				$('#noMediaQueries').text(newData);
			}
		});
		setCookie('cssDeveloperBarNoMediaQueries',true);
	}


	if (getCookie('cssDeveloperBarNoMediaQueries') === 'true') {
		$('.css-developer-bar-toggle-media-queries').on('click', function() {
		setCookie('cssDeveloperBarNoMediaQueries',false);
	});
	}
	else {
		$('.css-developer-bar-toggle-media-queries').on('click', function() {
		toggleMediaQueries();
	});
	}

	/* Show/hide developer bar */
	var barCookie = getCookie('cssDeveloperBarHideBar');
	if (getCookie('cssDeveloperBarHideBar') === null) {
		barCookie = false;
	}
	$('.css-developer-bar').addClass('css-developer-bar-' + barCookie);

	if ($('.css-developer-bar-content').is(':visible')) {
		$('.css-developer-bar-toggle').text('>');
	}
	else {
		$('.css-developer-bar-toggle').text('<');
	}

	$('.css-developer-bar-toggle').on('click', function() {
		var e = getCookie('cssDeveloperBarHideBar');
		(e == 'true') ? e = 'false' : e = 'true';
		setCookie('cssDeveloperBarHideBar',e);
		$('.css-developer-bar-content').toggle(100);
		($('.css-developer-bar-toggle').text() == '>') ? $('.css-developer-bar-toggle').text('<') : $('.css-developer-bar-toggle').text('>');
	});

</script>
<script src="http://127.0.0.1:1337/livereload.js"></script>