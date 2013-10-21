<?php
/* Načte se konfigurační soubor s konstantami nezbytnými k fungování frameworku */
require_once ( __DIR__ . '/lib/config.php');
/* Zajistí se správné cesty při při exportu HTML */
$path = PROJECT_PATH;
if (isset ($export)): $path = ''; endif;
?>
<!doctype html>
<html lang="cs" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Medio Interactive CSS Framework</title>
	<style>
		html, body, div, span, object, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, samp, small, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, figure { margin: 0; padding: 0; border: 0; font-size: 100%; vertical-align: baseline; background: transparent; }
		a, ins, del { text-decoration: none; }
		table { border-collapse: collapse; border-spacing: 0; }
		th, td { vertical-align: top; }
		th { text-align: left; }
		article, aside, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
		#accessibility-nav, .hide { position: absolute; top: -999em; left: -999em; height: 1px; width: 1px; }
		.clear { clear: both; display: block; overflow: hidden; visibility: hidden; width: 0; height: 0; }
		.clearfix:after, #header:after, #footer:after, .template-info li:after { clear: both; content: '&nbsp;'; display: block; font-size: 0; line-height: 0; visibility: hidden; width: 0; height: 0; }
		#accessibility-nav, .hide { position: absolute; top: -999em; left: -999em; height: 1px; width: 1px; }

		html,
		body { height: 100%; }
		html { font-size: 100%; }
		body { font: 16px/1.6 Arial, Helvetica, sans-serif; color: #fff;
		background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDRTFBMUM0M0E5MTExRTM5QjkxQjAwMjQ1Rjg5NzJDIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDRTFBMUM1M0E5MTExRTM5QjkxQjAwMjQ1Rjg5NzJDIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NkNFMUExQzIzQTkxMTFFMzlCOTFCMDAyNDVGODk3MkMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NkNFMUExQzMzQTkxMTFFMzlCOTFCMDAyNDVGODk3MkMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz51LlfjAAAEB0lEQVR42uyczWsVMRDAZ7NeRBERDyL40FsRfaIXwYIUxQ+Ugh8gIupF/yw9WTwIoiA9VLEUQcRLoSLirdBePKkHwdPumuhrfW/Jzmw7m2bSNwvDy2aaJpk3yfyYzb5sP+yp4P/1ycqKlVeD+2pIqPs2dYB81svUlXnKvs96eSN1vvtpKz0r/b/KgQEzZKAPrDxG9HetzCD6W1aeIfrrVl4g+mtWXjLaU/1T40fnb1p80xVTXwrXs+ZnBstWDcgw4IpwAxWSDWyGAkYoA1bCPYxtQN0DmQasdAlvfv4OYx562K0uJVFXtvgfFB82sWET/9U5sIntKDENZaxuXXYMBotx3h0rTxmcdsnKHKKfsrKA6M9aecdoT/VPjR+dfxd74NhHYe4eqEEksoGKwHr1QOkeCIkbIKpel3AHHHjfw3Rlje84dW05EYDODTblADfKeaZW3mzdOgfOMDjpvJW3iP60lY+Ivk9khI5a+cJoT/VPjR+dvwaRLQgisffAUvIeaMbAw8aeAwvpS1g9ULgHSs9Is/SOA28P8VvpYTqOVJ57iguhgQuzlvxX5z7jYTiOjPyfNQ7EnpteJvJpFGdNWPmK6A9ZWUX0B6x8Y7SfIDjSjf8DMf9Z5UDBHDjWe6AGkQQ8sEy8PdsDYcw9EHQPDMyBNwmWK5D7gvjbNnzoY8OmgdcZ0Md8bXkvR+5z4m9HONBd2Pm6c4A/dz1B5ON6BKfttfIT0e+08pto/4Pof5kY/yIx/zecJQyB98jYQQK4e2BsjKkk73FdYExsD61iethWROHQ7cvI/Qf3wCpxDwzOgdINDDGXuOPAGy05r2hZR7FiExP6PtfEl+9rel5LMV8T4+Ut60bKaxyIPfedAvx83nHA820HAc/n7SI4L6sBduFp/4vof5UY/xIx//mYSzhLvH3wPTD0BDPJBjYJeICR/AVLAOnYHsj+drPIE8yYHhh1fBKCiIncns2Bmg9k5gNdh1g+0J2fW0D0JwHPBx4mOGwf4Pm83QTnufbfif6XifEvEvNn5QNj73FG8h5pID7HSTdgcA6UHiRMbA/UJRzZA8d+D5RuoKgG1vOBHZwPdBd2PvAK4OcDzwB+PvAY4PnCIwSnUef/qPau/8/E+N8T85/VICJ4DzTbXJ98EMkle6h6YAceCIl7WK5LOHEO1PeFme8LuwL2vrBLuGLPjS8C/r7tJODvYZwi8nHu/N4So/0kwXlu/K+J+T+XHETywProQcSoXoPItubA5JewemDiIB0blFkG1t8P7OD3A13hETLge4D/fiDFiVexfJq9LgDy3BX+vacxz2hP9Y9y3mD+T1JOJohewhIeayYfRKYDG0h6RprtgT1dwjwD9nUJ6x4YzYB/BBgAMdTMRZnenzgAAAAASUVORK5CYII=);
		background-color: #2b001e;
		box-shadow: inset 0 0 300px 0 #13000D;
		}
		hr { display: none; }
		strong { font-weight: bold; }
		em { font-style: italic; }
		del { text-decoration: line-through; }
		th { font-weight: normal; }
		address, cite, dfn { font-style: normal; }
		li { list-style: none; }
		abbr, acronym { border-bottom: 1px dotted #999; cursor: help; }
		input, textarea, select { font-family: Arial, Helvetica, sans-serif; }
		a, a:visited { color: #9dd700; font-family: 'Arial Black', Arial, Helvetica, sans-serif; font-weight: 900; text-decoration: underline; }
		a:hover, a:active { text-decoration: none; }
		a:focus { outline: 0; }
		h1,h2,h3,h4 { font-family: 'Arial Black', Arial, Helvetica, sans-serif; font-weight: 900; }
		h1 { font-size: 3em; line-height: 1; margin-bottom: 0.5em; }
		h1 a,
		a.dont-edit { padding-left: 1ex; font-size: small; }
		h2 { font-size: 2em; margin-bottom: 0.75em; }
		h3 { font-size: 1.5em; line-height: 1; margin-bottom: 0.5em; }
		h4 { font-size: 1.2em; line-height: 1.25; margin-bottom: 1.25em; }
		p { margin-bottom: 1em; }
		em { border-bottom: 1px dotted #999; font-style: italic; }

		.container { position: relative; max-width: 1280px; margin: 0 auto; padding: 2em; }
		#header { position: relative; padding: 1em 0; }

		#content,
		#sidebar { position: relative; }
		#content { float: left; width: 65%; padding: 3em 5% 3em 0; }
		#sidebar { float: right; width: 30%; padding: 3em 0; }
		#footer { clear: both; padding: 3em 0 0; }

		.template-info { width: 100%; margin: 0 0 3em; }
		.template-info:last-child { margin: 0 0 1em; }
		.template-info tr:nth-child(even) { background: rgba(90,0,62,.2); }
		.template-info tbody tr:hover { background: rgba(90,0,62,.2); }
		.template-info td,
		.template-info th { padding: 1ex .5ex 1ex 0; border-bottom: 2px dashed #5a003e; }
		.template-info th { font-size: 12px; }
		.template-info h4 { margin: 0; }


		.status:before {
		content: ''; position: relative; top: 3px; margin: 0 1ex 0 0;
		float: left; width: 18px; height: 18px; border-radius: 9px;
		}
		.status-0:before { background-color: #ce0b10; }
		.status-1:before { background-color: #f99200; }
		.status-2:before { background-color: #0daa18; }

		.edit-form { display: none; }
		.text-field {
			display: inline-block; width: 220px; height: 24px; padding: 4px 6px; border: 1px solid #c2c2c2; font-size: 16px; line-height: 24px;
			color: #666; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
		}
		.text-field:focus { color: #333; }

		.btn {
			display: inline-block; padding: 5px 14px 6px; border: 1px solid #c2c2c2; font-size: 16px; line-height: normal; color: #333; cursor: pointer;
			background-color: #eee; background-repeat: no-repeat;
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#eee));
			background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #eee);
			background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #eee);
			background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #eee);
			background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #eee);
			background-image: linear-gradient(#ffffff, #ffffff 25%, #eee);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#eeeeee', GradientType=0);
			text-shadow: 0 1px 1px #fff;
			-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 2px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 2px rgba(0, 0, 0, 0.1);
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 2px rgba(0, 0, 0, 0.1);
		}
		.btn:hover {
			background-position: 0 -999em;
			color: #333;
			text-decoration: none;
			filter: none;
		}
		.btn:focus {
			outline: 1px dotted #666;
		}

		/* Media queries */
		@media all and (max-width: 900px) {
			.container { padding: 1.5em; }
			#header .logo { float: none; display: block; margin: 0 0 1em; }
			#content,
			#sidebar { width: auto; float: none; }
			#content { padding: 2em 0; }
			#sidebar { padding: 0 0 2em; }
		}
		@media all and (max-width: 640px) {
			.container { padding: 1em; }
			h1 { font-size: 2em; }
			h2 { font-size: 1.6em; }
			h3 { font-size: 1.3em; }
			h4 { font-size: 1.1em; }
		}
		@media all and (max-width: 480px) {
			body { font-size: 14px; }
			.template-info th { font-size: xx-small; }
			h1 a, a.dont-edit { display: block; padding: 1ex 0 0; }
			.text-field { width: auto; display: block; margin: 0 0 1ex; }
		}
		@media all and (max-width: 320px) {
			body { font-size: 12px; }
			.text-field { max-width: 200px; }
		}

	</style>
	<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAMAEBAAAAEAGABoAwAANgAAABgYAAABABgASAcAAJ4DAAAgIAAAAQAYAKgMAADmCgAAKAAAABAAAAAgAAAAAQAYAAAAAABAAwAAAAAAAAAAAAAAAAAAAAAAABQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBYNlRYNlRYNlcG+4////1ROsRYNlRYNlRYNlRYNlVROsf///8G+4xYNlRYNlRYNlRYMmhYMmhYMmsG+5P///1RNtRYMmhYMmhYMmhYMmlRNtf///8G+5BYMmhYMmhYMmhcLoBcLoBcLoMG+5v///1VMuSYbpvDv+fDv+SYbplVMuf///8G+5hcLoBcLoBcLoBcKphcKphcKpsG+5////1VLvoN80P///////4N80FVLvv///8G+5xcKphcKphcKphgKqxgKqxgKq8G+6f///3RszfDv+fDv+fDv+fDv+XRszf///8G+6RgKqxgKqxgKqxkJsRkJsRkJscK96v///+De9f///4R81YR81f///+De9f///8K96hkJsRkJsRkJsRkItxkItxkIt8K97P////////Dv+igYvCgYvPDv+v///////8K97BkItxkItxkItxoHvRoHvRoHvcK97f///////4V73BoHvRoHvYV73P///////8K97RoHvRoHvRoHvRoGwhoGwhoGwsK97/////Du+ykXxhoGwhoGwikXxvDu+////8K97xoGwhoGwhoGwhsGxxsGxxsGx8K98P///4V64RsGxxsGxxsGxxsGx4V64f///8K98BsGxxsGxxsGxxsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoAAAAGAAAADAAAAABABgAAAAAACAHAAAAAAAAAAAAAAAAAAAAAAAAFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ2RFQ2RFQ2RFQ2Rgn7E////////gn7EFQ2RFQ2RFQ2RFQ2RFQ2RFQ2RFQ2RU06u////////wb7iFQ2RFQ2RFQ2RFQ2RFQ2RFg2VFg2VFg2VFg2Vg37G////////g37GFg2VFg2VFg2VFg2VFg2VFg2VFg2VVE6x////////wb7jFg2VFg2VFg2VFg2VFg2VFgyYFgyYFgyYFgyYg33I////////g33IFgyYFgyYFgyYFgyYFgyYFgyYFgyYVE2z////////wb7kFgyYFgyYFgyYFgyYFgyYFgycFgycFgycFgycg33K////////g33KFgycFgycop7X////4N/yJhyjFgycVE22////////wb7lFgycFgycFgycFgycFgycFwugFwugFwugFwugg33M////////g33MFwugVUy5////////////g33MFwugVUy5////////wb7mFwugFwugFwugFwugFwugFwukFwukFwukFwukg33O////////g33OFwukwb7n////////////8O/5JhuqVUy8////////wb7nFwukFwukFwukFwukFwukGAqnGAqnGAqnGAqnhHzQ////////hHzQVku+////////////////////k43WVku+////////wb7oGAqnGAqnGAqnGAqnGAqnGAqrGAqrGAqrGAqrhHzS////////hHzS4N70////////dGzN8O/5////////dGzN////////wb7pGAqrGAqrGAqrGAqrGAqrGAmwGAmwGAmwGAmwhHzV////////4N70////////wb3qGAmwhHzV////////4N70////////wb3qGAmwGAmwGAmwGAmwGAmwGQizGQizGQizGQizhHvW////////////////////VkrHGQizKBi48O/6////////////////wr3rGQizGQizGQizGQizGQizGQi3GQi3GQi3GQi3hHvZ////////////////wr3sGQi3GQi3GQi3hHvZ////////////////wr3sGQi3GQi3GQi3GQi3GQi3Gge7Gge7Gge7Gge7hXvb////////////////V0nNGge7Gge7Gge7KRjA8O76////////////wr3tGge7Gge7Gge7Gge7Gge7Gge/Gge/Gge/Gge/hXvd////////////wr3uGge/Gge/Gge/Gge/Gge/hXvd////////////wr3uGge/Gge/Gge/Gge/Gge/GgbCGgbCGgbCGgbChXre////////////V0jSGgbCGgbCGgbCGgbCGgbCKRfG8O77////////wr3vGgbCGgbCGgbCGgbCGgbCGwbGGwbGGwbGGwbGhXrh////////wr3wGwbGGwbGGwbGGwbGGwbGGwbGGwbGhXrh////////wr3wGwbGGwbGGwbGGwbGGwbGGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKAAAACAAAABAAAAAAQAYAAAAAACADAAAAAAAAAAAAAAAAAAAAAAAABQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkhUNkhUNkhUNkhUNkhUNkoJ+xf///////////4J+xRUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNksG+4v///////////1NOrxUNkhUNkhUNkhUNkhUNkhUNkhYNlRYNlRYNlRYNlRYNlRYNlYN+xv///////////4N+xhYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlcG+4////////////1ROsRYNlRYNlRYNlRYNlRYNlRYNlRYMlxYMlxYMlxYMlxYMlxYMl4N9yP///////////4N9yBYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMl8G+4////////////1RNsxYMlxYMlxYMlxYMlxYMlxYMlxYMmhYMmhYMmhYMmhYMmhYMmoN9yf///////////4N9yRYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmsG+5P///////////1RNtRYMmhYMmhYMmhYMmhYMmhYMmhYMnRYMnRYMnRYMnRYMnRYMnYN9y////////////4N9yxYMnRYMnRYMncG+5f///////4N9yxYMnRYMnRYMncG+5f///////////1RNtxYMnRYMnRYMnRYMnRYMnRYMnRcLoBcLoBcLoBcLoBcLoBcLoIN9zP///////////4N9zBcLoBcLoFVMuf////////////Dv+SYbphcLoBcLoMG+5v///////////1VMuRcLoBcLoBcLoBcLoBcLoBcLoBcLoxcLoxcLoxcLoxcLoxcLo4N9zv///////////4N9zhcLoxcLo8G+5v///////////////5ON1BcLoxcLo8G+5v///////////1VMvBcLoxcLoxcLoxcLoxcLoxcLoxcKphcKphcKphcKphcKphcKpoN80P///////////4N80BcKpnRsyv///////////////////////zYrshcKpsG+5////////////1VLvhcKphcKphcKphcKphcKphcKphgKqBgKqBgKqBgKqBgKqBgKqIR80f///////////4R80RgKqODe8////////////////////////6Od3BgKqMG+6P///////////1ZLvxgKqBgKqBgKqBgKqBgKqBgKqBgKqxgKqxgKqxgKqxgKqxgKq4R80v///////////4R80nRszf///////////8G+6eDe9P///////////zcrtsG+6f///////////1ZLwRgKqxgKqxgKqxgKqxgKqxgKqxgJrxgJrxgJrxgJrxgJrxgJr4R81P///////////4R81ODe9P///////////1ZLxHRrz////////////6Od38G96v///////////1ZLxBgJrxgJrxgJrxgJrxgJrxgJrxkJsRkJsRkJsRkJsRkJsRkJsYR81f////////////Dv+v///////////8K96hkJsRkJseDe9f////////////Dv+v///////////1ZLxhkJsRkJsRkJsRkJsRkJsRkJsRkItBkItBkItBkItBkItBkItIR71////////////////////////////1ZKyBkItBkItHVr0v///////////////////////////1ZKyBkItBkItBkItBkItBkItBkItBkItxkItxkItxkItxkItxkIt4R72f///////////////////////8K97BkItxkItxkItxkIt+De9f///////////////////////1ZKyhkItxkItxkItxkItxkItxkItxoHuhoHuhoHuhoHuhoHuhoHuoV72v///////////////////////1dJzBoHuhoHuhoHuhoHunZq1v///////////////////////1dJzBoHuhoHuhoHuhoHuhoHuhoHuhoHvRoHvRoHvRoHvRoHvRoHvYV73P///////////////////8K97RoHvRoHvRoHvRoHvRoHvRoHveDe9v///////////////////1dJzxoHvRoHvRoHvRoHvRoHvRoHvRoHwBoHwBoHwBoHwBoHwBoHwIV73f///////////////////zkoyBoHwBoHwBoHwBoHwBoHwBoHwHZq2f///////////////////1dJ0RoHwBoHwBoHwBoHwBoHwBoHwBoGwhoGwhoGwhoGwhoGwhoGwoV63v///////////////6Ob5xoGwhoGwhoGwhoGwhoGwhoGwhoGwhoGwuDe9////////////////1dI0hoGwhoGwhoGwhoGwhoGwhoGwhsGxRsGxRsGxRsGxRsGxRsGxYV64P///////////////zknzRsGxRsGxRsGxRsGxRsGxRsGxRsGxRsGxXZq3P///////////////1hI1BsGxRsGxRsGxRsGxRsGxRsGxRsGxxsGxxsGxxsGxxsGxxsGx4V64f///////////6Sb6RsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGx+He+P///////////1hI1hsGxxsGxxsGxxsGxxsGxxsGxxsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

<div class="container">

	<nav id="accessibility-nav">
		<ol>
			<li><a href="#content">Přejít na obsah</a></li>
			<li><a href="#sidebar">Přejít k postrannímu sloupci</a></li>
			<li><a href="http://www.ippi.cz/klavesove-zkratky/zakladni.html" accesskey="1">Klávesové zkratky</a>
		</ol>
	</nav>
	<!-- / accessibility-nav -->
	<hr>

	<header id="header">

<?php if ( PROJECT_NAME === 'Project Name' && !isset($export) ) ?>
		<h1><?php echo PROJECT_NAME; ?><?php if (!isset($export)) { ?><a class="edit" href="#">Přejmenovat</a><?php } ?></h1>
		<?php if (!isset($export)) { ?>

		<form method="post" action="<?php echo 'lib/setup-project.php'; ?>" class="edit-form">
			<fieldset>
				<input type="text" name="project-name" required value="<?php echo PROJECT_NAME; ?>" class="text-field">
				<input type="submit" value="Přejmenovat" class="btn">
				<a href="#" class="dont-edit">Nepřejmenovávat</a>
			</fieldset>
		</form>
		<?php } ?>

	</header>
	<!-- / header -->
	<hr>


	<section id="content" role="main">

		<h2>Přehled projektu</h2>

		<h3>Šablony</h3>

		<table class="template-info">
			<thead>
				<tr>
					<th>
						Název šablony
					</th>
					<th>
						Název souboru
					</th>
					<th>
						Status
					</th>
				</tr>
			</thead>
			<tbody>
				<?php

/* Přečte obsah status.txt a vypíše ho */
$statusFileName = __DIR__ . '/php/config/status.txt';
$handle = fopen($statusFileName, 'r');
if ($handle) {
    while (($statusLine = fgets($handle, 4096)) !== false) {
        $statusData = explode(';', $statusLine);

				switch ($statusData[2]) {
				case 0:
				$status = 'Čeká';
				break;
				case 1:
				$status = 'Zpracovává se';
				break;
				case 2:
				$status = 'Dokončeno';
				break;
				}

				$noExt = explode('.', $statusData[1]);

				if (isset ($export)) {
				$exportPath = './project/';

				 echo '<tr>';
				 echo '<td><a href="'.$exportPath.$noExt[0].'.html">'.$statusData[0].'</a></td>';
				 echo '<td>'.$noExt[0].'.html</td>';
				 echo '<td class="status status-'.trim($statusData[2]).'">'.$status.'</td>';
				 echo '</tr>';
				}
				else {
				 $exportPath = 'php/';

				 echo '<tr>';
				 echo '<td><a href="'.$exportPath.$noExt[0].'.'.$noExt[1].'">'.$statusData[0].'</a></td>';
				 echo '<td>'.$noExt[0].'.'.$noExt[1].'</td>';
				 echo '<td class="status status-'.trim($statusData[2]).'">'.$status.'</td>';
				 echo '</tr>';
			 }

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
				?>

			</tbody>
		</table>
		<!-- / template-info -->

		<h3>Archivy</h3>

		<table class="template-info">
			<thead>
				<tr>
					<th>Název archivu</th>
					<th>Naposledy změněno</th>
					<th>Velikost</th>
				</tr>
			</thead>
			<tbody>
				<?php
if ($handle = opendir( __DIR__ . '/html')) {
	$statusFileContent = '';
  while (false !== ($file = readdir($handle))) {
	  if ($file != '.' && $file != '..') {
			$pathinfo = pathinfo($file);
			if (@$pathinfo['extension'] == 'zip') {

				$exportPath = 'html/';
				if (isset ($export)) { $exportPath = ''; }


				$filesize = filesize(__DIR__ . '/html/' . $pathinfo['basename']);
				$fileKB = round(($filesize / 1024), 2);
				echo '<tr>';
				echo '<td>' . '<a href="' . $exportPath . $pathinfo['basename'] . '">' . $pathinfo['basename'] . '</a></td>';
				echo '<td>' . date('j.n.Y G:i:s', filemtime(__DIR__ . '/html/'.$pathinfo['basename'])) . '</td>';
				echo '<td>' . $fileKB . 'KB</td>';
				echo '</tr>';

			}
	  }
  }
  closedir($handle);
}
?>

			</tbody>
		</table>
		<!-- / template-info -->

	</section>
	<!-- / content -->
	<hr>

	<aside id="sidebar" role="complementary">

		<p>
			Zde si můžete prohlédnout své HTML šablony a&nbsp;stáhnout si archiv
			s&nbsp;jejich aktuální verzí.
		</p>

		<p>
			Všechny HTML šablony jsou umístěny ve složce <em>project</em>.
			Všechny soubory umístěné vně složky <em>project</em> (m.j. tento soubor)
			by neměly být nahrány na váš server.
		</p>

	</aside>
	<!-- / sidebar -->
	<hr>

	<footer id="footer">
		<p>
			&copy; <?php
$date = date('Y', time());
if ($date < 2012)
{
echo date('Y', time());
}
else
{
echo '2011&nbsp;&ndash;&nbsp;' . date('Y', time());
}

?>

			<a href="http://www.medio.cz" title="Medio Interactive - Až o 42 % webovější než obyčejné weby."><span>Medio Interactive, s.r.o.</span></a>
		</p>
	</footer>
	<!-- / footer -->

</div>
<!-- / container -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/<?php echo JQUERY_VERSION;?>/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $path?>_ui/js/jquery-<?php echo JQUERY_VERSION;?>.min.js"><\/script>')</script>
<script>
	$(document).ready(function() {
		/* Zobrazení/skrytí editace názvu projektu */
		$('.edit').click(function(e) {
			e.preventDefault();
			$('.edit-form').slideToggle();
			$(this).toggle();
		});

		$('.dont-edit').click(function(e) {
			e.preventDefault();
			$('.edit-form').slideToggle();
			$('.edit').slideToggle();
		});

	});
</script>

</body>
</html>
