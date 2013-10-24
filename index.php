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
		* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
		html,
		body { height: 100%; }
		html { font-size: 100%; }
		body { font: 18px/1.6 "Trebuchet MS", "Geneva CE", lucida, sans-serif;
		background: #f9f3e3; color: #0c0800;
		}
		hr { display: none; }
		strong { font-weight: bold; }
		em { font-style: italic; }
		del { text-decoration: line-through; }
		th { font-weight: normal; }
		address, cite, dfn { font-style: normal; }
		li { list-style: none; }
		abbr, acronym { border-bottom: 1px dotted #999; cursor: help; }
		input, textarea, select { font-family: "Trebuchet MS", "Geneva CE", lucida, sans-serif; }
		a, a:visited { color: #f05828; text-decoration: underline; }
		a:hover, a:active { text-decoration: none; }
		a:focus { outline: 0; }
		h1,h2,h3,h4 { font-family: Impact, Charcoal, fantasy; font-weight: normal; letter-spacing: 10px; text-transform: uppercase;
		text-shadow: 1px 1px 0 #729c76, -1px -1px 0 #333, -2px -2px 0 #333, -3px -3px 0 #333, -4px -4px 0 #333;
		color: #8dce93;
		}
		h1 { font-size: 4em; line-height: 1; }
		h1 a,
		a.dont-edit { padding-left: 1ex; font-family: "Trebuchet MS", "Geneva CE", lucida, sans-serif; font-weight: normal; text-transform: none;
		font-size: small; letter-spacing: 0; text-shadow: none; }
		h2 { font-size: 3em; margin-bottom: 0.75em; }
		h3 { font-size: 2.5em; line-height: 1; margin-bottom: 0.5em; }
		h4 { font-size: 1.8em; line-height: 1.25; margin-bottom: 1.25em; }
		p { margin-bottom: 1em; }
		em { border-bottom: 1px dotted #999; font-style: italic; }

		.container { position: relative; height: 100%; padding-right: 330px; }
		#header { position: relative; padding: 2em 2em 1em; }

		#content,
		#sidebar { padding: 2em; }
		#content { position: relative; float: left; min-width: 500px; max-width: 800px; }
		#sidebar { position: fixed; right: 0; top: 0; width: 300px; height: 100%; border-left: 10px solid #ef9b2d;
		box-shadow: -10px 0 0 0 #828282, -20px 0 0 0 #882f2f; background: #f05828; color: #f9f3e3; }
		#footer { clear: both; padding: 2em; }

		.template-info { width: 100%; margin: 0 0 3em; }
		.template-info:last-child { margin: 0 0 1em; }
		.template-info tr:nth-child(even) { background: rgba(114,156,118,.1); }
		.template-info tbody tr:hover { background: rgba(114,156,118,.1); }
		.template-info td,
		.template-info th { padding: 1ex 1em 1ex 0; border-bottom: 2px dashed #333; }
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
			display: inline-block; width: 220px; height: 34px; padding: 4px 6px; border: 1px solid #c2c2c2;
			font-size: 16px; line-height: 24px;
			color: #666;
		}
		.text-field:focus { color: #333; }

		.btn {
			display: inline-block; padding: 5px 14px 6px; border: 0; font-size: 16px; color: #333; cursor: pointer;
			background: #ff5609; border-radius: 0;
			box-shadow: -1px -1px 0 #333;
		}
		/* Media queries */
		@media all and (max-width: 900px) {
			.container { padding: 1.5em; }
			#header { padding: 1em 0; }
			#header .logo { float: none; display: block; margin: 0 0 1em; }
			#content,
			#sidebar { width: auto; float: none; position: static; }
			#content { min-width: 0; padding: 2em 0; }
			#sidebar { padding: 0 0 2em; border: 0; box-shadow: none; background: none; color: #0c0800; }
			.template-info { width: auto; }
		}
		@media all and (max-width: 640px) {
			.container { padding: 1em; }
			h1 { font-size: 3.5em; }
			h2 { font-size: 2.4em; }
		}
		@media all and (max-width: 480px) {
			h1 a, a.dont-edit { display: block; padding: 1ex 0 0; }
			.text-field { width: auto; display: block; margin: 1ex 0; }
			h1 { font-size: 2.5em; }
			h2 { font-size: 1.7em; }
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

		<h2>Šablony</h2>

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

				(isset ($export)) ? $exportPath = './project/' : $exportPath = 'php/';
				(isset ($export)) ? $extension = 'html' : $extension = 'php';


				 echo '<tr>';
				 echo '<td><a href="'.$exportPath.$noExt[0].'.'.$extension.'">'.$statusData[0].'</a></td>';
				 echo '<td>'.$noExt[0].'.'.$extension.'</td>';
				 echo '<td class="status status-'.trim($statusData[2]).'">'.$status.'</td>';
				 echo '</tr>';

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

		<h2>Archivy</h2>

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
