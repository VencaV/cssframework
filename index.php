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

		html { font-size: 100%; }
		body { font: 16px/1.6 Verdana, Arial, Helvetica, sans-serif; background: #fff; color: #333; }
		hr { display: none; }
		strong { font-weight: bold; }
		em { font-style: italic; }
		del { text-decoration: line-through; }
		th { font-weight: normal; }
		address, cite, dfn { font-style: normal; }
		li { list-style: none; }
		abbr, acronym { border-bottom: 1px dotted #999; cursor: help; }
		input, textarea, select { font-family: Arial, Helvetica, sans-serif; }
		a, a:visited { color: #b80718; text-decoration: underline; }
		a:hover, a:active { color: #b80718; text-decoration: none; }
		a:focus { outline: 0; }
		h1,h2,h3,h4 { font-weight: normal; color: #000; }
		h1 { font-size: 3em; line-height: 1; margin-bottom: 0.5em; }
		h1 a,
		a.dont-edit { padding-left: 1ex; font-size: small; }
		h2 { font-size: 2em; margin-bottom: 0.75em; }
		h3 { font-size: 1.5em; line-height: 1; margin-bottom: 0.5em; }
		h4 { font-size: 1.2em; line-height: 1.25; margin-bottom: 1.25em; }
		p { margin-bottom: 1em; }
		em { border-bottom: 1px dotted #999; font-style: italic; }

		.container { position: relative; max-width: 1280px; margin: 0 auto; padding: 2em; }
		#header { position: relative; padding: 0 0 1em; border-bottom: 1px solid #eee; }
		#header .logo { float: right; overflow: hidden; width: 152px; height: 61px; margin: 0 0 0 2em; text-decoration: none;
		background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJgAAAA9CAYAAABRE6B8AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2OTAyM0NFMDYzRTBFMDExQjNERkM3NUJFRkNDMjZBNiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMjFCQjQ0NkZGRTgxMUUwQUU1QzkxQjA2NzBDRjQ4MCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMjFCQjQ0NUZGRTgxMUUwQUU1QzkxQjA2NzBDRjQ4MCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2OTAyM0NFMDYzRTBFMDExQjNERkM3NUJFRkNDMjZBNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2OTAyM0NFMDYzRTBFMDExQjNERkM3NUJFRkNDMjZBNiIvPiA8L3JkZjpEZXNjcmlwdGlv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) no-repeat; }
		#header .logo span { visibility: hidden; }

		#content,
		#sidebar { position: relative; }
		#content { float: left; width: 65%; padding: 3em 5% 3em 0; }
		#sidebar { float: right; width: 30%; padding: 3em 0; }
		#footer { clear: both; padding: 3em 0 0; border-top: 1px solid #eee; }
		.stamp { float: right; width: 130px; height: 130px; overflow: hidden;
		white-space: nowrap; text-indent: 999em;
		background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIIAAACCCAYAAACKAxD9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowOEZBQTIzRDQwQTlFMDExQjI1Q0RBOUU3Qzg0RjJFMSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpENzQ0MTg5RkZGRTkxMUUwOTk0MDhDNzVCMkQ3RTQ5RSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpENzQ0MTg5RUZGRTkxMUUwOTk0MDhDNzVCMkQ3RTQ5RSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowOEZBQTIzRDQwQTlFMDExQjI1Q0RBOUU3Qzg0RjJFMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowOEZBQTIzRDQwQTlFMDExQjI1Q0RBOUU3Qzg0RjJFMSIvPiA8L3JkZjpEZXNjcmlwdGlv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) no-repeat; }

		.template-info { width: 100%; margin: 0 0 3em; }
		.template-info:last-child { margin: 0 0 1em; }
		.template-info tr:nth-child(even) { background: #fafafa; }
		.template-info tbody tr:hover { background: #fafafa; }
		.template-info td,
		.template-info th { padding: 5px 10px 5px 0; border-bottom: 1px solid #eee; }
		.template-info th { font-size: 13px; color: #666; }
		.template-info h4 { margin: 0; }

		.status-0 { color: #ce0b10; }
		.status-1 { color: #f99200; }
		.status-2 { color: #0daa18; }

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

		<a href="http://www.medio.cz" title="Přejít na stránky Medio Interactive" class="logo"><span>Medio Interactive</span></a>

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
				 echo '<td class="status-'.trim($statusData[2]).'">'.$status.'</td>';
				 echo '</tr>';
				}
				else {
				 $exportPath = 'php/';

				 echo '<tr>';
				 echo '<td><a href="'.$exportPath.$noExt[0].'.'.$noExt[1].'">'.$statusData[0].'</a></td>';
				 echo '<td>'.$noExt[0].'.'.$noExt[1].'</td>';
				 echo '<td class="status-'.trim($statusData[2]).'">'.$status.'</td>';
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
			<span class="stamp">&nbsp;</span>
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
