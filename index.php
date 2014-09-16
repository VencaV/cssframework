<?php
/* Load config file with necessary constants */
require_once ( __DIR__ . '/lib/config.php');
/* Set correct paths for development and for export */
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
		.clearfix:after, .container:after, #header:after, .template-info li:after { clear: both; content: '&nbsp;'; display: block; font-size: 0; line-height: 0; visibility: hidden; width: 0; height: 0; }
		#accessibility-nav, .hide { position: absolute; top: -999em; left: -999em; height: 1px; width: 1px; }
		* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
		html { font-size: 100%; }
		body { font: 18px/1.6 Arial, Helvetica, sans-serif;
		background-color: #fafafa; color: #333; }
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
		a:hover, a:active { text-decoration: none; }
		a:focus { outline: 0; }
		h1,h2,h3,h4 { font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; line-height: 1.1;
			color: #b80718; text-shadow: 1px 1px 0 rgba(0,0,0,.25); }
		h1 { font-size: 3.2em; line-height: 1; }
		h1 a,
		a.dont-edit { padding-left: 1ex; font-family: Arial, Helvetica, sans-serif; font-weight: normal; text-transform: none;
		font-size: small; letter-spacing: 0; text-shadow: none; }
		h2 { font-size: 2.7em; margin-bottom: 0.5em; }
		h3 { font-size: 2.7em; line-height: 1; margin-bottom: 0.35em; }
		h4 { font-size: 1.6em; line-height: 1; margin-bottom: 0.35em; }
		p { margin-bottom: 1em; }
		em { border-bottom: 1px dotted #999; font-style: italic; }

		.container { position: relative; max-width: 1400px; margin: auto; padding: 0 1em; }
		.content { padding: 2.5em 0; background-color: #fff; }
		#header { position: relative; padding: 2em 0; border-bottom: 1px solid #fff;
		background-color: #fafafa; background-image: linear-gradient(#fff,#fafafa); box-shadow: inset 0 -1px 1px rgba(0,0,0,.15); }

		#content { position: relative; float: left; width: 65%; }
		#sidebar { float: right; width: 35%; padding-left: 2em; }
		#footer { padding: 2em 0; border-top: 1px solid #fff; box-shadow: inset 0 1px 1px rgba(0,0,0,.15); }
		#footer .smaller { font-size: .6em; }
		#footer .smaller a { color: #999; }
		#footer .smaller a:hover { color: #b80718; }

		.template-info { width: 100%; margin: 0 0 3em; }
		.template-info:last-child { margin: 0; }
		.template-info tr { transition: background-color linear .15s; }
		.template-info tr:nth-child(even) { background: rgba(0,0,0,.017); }
		.template-info tbody tr:hover { background: rgba(0,0,0,.017); }
		.template-info td,
		.template-info th { padding: 1ex 1em 1ex 0; border-bottom: 1px dashed #e5e5e5; }
		.template-info th { font-size: 11px; text-transform: uppercase; color: #666; }
		.template-info h4 { margin: 0; }

		.status:before {
			content: ''; position: relative; top: 5px; margin: 0 1ex 0 0;
			float: left; width: 18px; height: 18px; border-radius: 9px;
		}
		.status-0:before { background-color: #990e11; }
		.status-1:before { background-color: #f99200; }
		.status-2:before { background-color: #0daa18; }

		.edit-form { display: none; padding-top: 1em; }
		.inline-form { display: inline; }
		.edit-title-form > div { display: none; }
		label { display: block; }
		.text-field,
		.btn,
		select { vertical-align: middle; border-radius: 3px; border: 1px solid #ddd; font-size: 16px; }
		.text-field,
		select { display: inline-block; width: 220px; height: 36px; padding: 4px 6px;
		background: #fdfdfd; color: #999; transition: background linear .15s; }
		.text-field {
			line-height: 24px;
		}

		.text-field:focus,
		select:focus { outline: 0; background: #fdffe8; color: #666; }

		.btn {
			display: inline-block; padding: 7px 14px 8px; color: #333;
			text-align: center;
			text-decoration: none; cursor: pointer;
			background-color: #f1f1f1;
			background-image: linear-gradient(#fff,#f1f1f1);
			box-shadow: 1px 1px 1px rgba(0,0,0,.05);
			transition: background linear .15s;
		}
		.btn.btn-small { padding: 3px 5px; font-size: 12px; line-height: 11px; }
		.btn:hover { background: #fff; }

		#sidebar .text-field,
		#sidebar select { margin: 0 0 1ex; }
		#sidebar select { display: block; }

		/* Media queries */
		@media all and (max-width: 900px) {
			.container { padding: 0 1.5em; }
			.content { padding: 0; }
			#header .logo { float: none; display: block; margin: 0 0 1em; }
			#content,
			#sidebar { width: auto; float: none; padding: 0; }
			#content { min-width: 0; padding: 2em 0; }
			#sidebar { padding: 0 0 2em; border: 0; box-shadow: none; background: none; color: #0c0800; }
			.template-info { width: auto; }
		}
		@media all and (max-width: 640px) {
			.container { padding: 0 1em; }
			h1 { font-size: 2.5em; }
			h2,
			h3 { font-size: 1.7em; }
		}
		@media all and (max-width: 480px) {
			h1 a, a.dont-edit { display: block; padding: 1ex 0 0; }
			.text-field { width: auto; display: block; margin: 1ex 0; }
			h1 { font-size: 1.8em; }
			h2,
			h3 { font-size: 1.3em; }
		}

	</style>
	<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAMAEBAAAAEAGABoAwAANgAAABgYAAABABgASAcAAJ4DAAAgIAAAAQAYAKgMAADmCgAAKAAAABAAAAAgAAAAAQAYAAAAAABAAwAAAAAAAAAAAAAAAAAAAAAAABQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBYNlRYNlRYNlcG+4////1ROsRYNlRYNlRYNlRYNlVROsf///8G+4xYNlRYNlRYNlRYMmhYMmhYMmsG+5P///1RNtRYMmhYMmhYMmhYMmlRNtf///8G+5BYMmhYMmhYMmhcLoBcLoBcLoMG+5v///1VMuSYbpvDv+fDv+SYbplVMuf///8G+5hcLoBcLoBcLoBcKphcKphcKpsG+5////1VLvoN80P///////4N80FVLvv///8G+5xcKphcKphcKphgKqxgKqxgKq8G+6f///3RszfDv+fDv+fDv+fDv+XRszf///8G+6RgKqxgKqxgKqxkJsRkJsRkJscK96v///+De9f///4R81YR81f///+De9f///8K96hkJsRkJsRkJsRkItxkItxkIt8K97P////////Dv+igYvCgYvPDv+v///////8K97BkItxkItxkItxoHvRoHvRoHvcK97f///////4V73BoHvRoHvYV73P///////8K97RoHvRoHvRoHvRoGwhoGwhoGwsK97/////Du+ykXxhoGwhoGwikXxvDu+////8K97xoGwhoGwhoGwhsGxxsGxxsGx8K98P///4V64RsGxxsGxxsGxxsGx4V64f///8K98BsGxxsGxxsGxxsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoAAAAGAAAADAAAAABABgAAAAAACAHAAAAAAAAAAAAAAAAAAAAAAAAFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA+HFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFA6JFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6LFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ6OFQ2RFQ2RFQ2RFQ2Rgn7E////////gn7EFQ2RFQ2RFQ2RFQ2RFQ2RFQ2RFQ2RU06u////////wb7iFQ2RFQ2RFQ2RFQ2RFQ2RFg2VFg2VFg2VFg2Vg37G////////g37GFg2VFg2VFg2VFg2VFg2VFg2VFg2VVE6x////////wb7jFg2VFg2VFg2VFg2VFg2VFgyYFgyYFgyYFgyYg33I////////g33IFgyYFgyYFgyYFgyYFgyYFgyYFgyYVE2z////////wb7kFgyYFgyYFgyYFgyYFgyYFgycFgycFgycFgycg33K////////g33KFgycFgycop7X////4N/yJhyjFgycVE22////////wb7lFgycFgycFgycFgycFgycFwugFwugFwugFwugg33M////////g33MFwugVUy5////////////g33MFwugVUy5////////wb7mFwugFwugFwugFwugFwugFwukFwukFwukFwukg33O////////g33OFwukwb7n////////////8O/5JhuqVUy8////////wb7nFwukFwukFwukFwukFwukGAqnGAqnGAqnGAqnhHzQ////////hHzQVku+////////////////////k43WVku+////////wb7oGAqnGAqnGAqnGAqnGAqnGAqrGAqrGAqrGAqrhHzS////////hHzS4N70////////dGzN8O/5////////dGzN////////wb7pGAqrGAqrGAqrGAqrGAqrGAmwGAmwGAmwGAmwhHzV////////4N70////////wb3qGAmwhHzV////////4N70////////wb3qGAmwGAmwGAmwGAmwGAmwGQizGQizGQizGQizhHvW////////////////////VkrHGQizKBi48O/6////////////////wr3rGQizGQizGQizGQizGQizGQi3GQi3GQi3GQi3hHvZ////////////////wr3sGQi3GQi3GQi3hHvZ////////////////wr3sGQi3GQi3GQi3GQi3GQi3Gge7Gge7Gge7Gge7hXvb////////////////V0nNGge7Gge7Gge7KRjA8O76////////////wr3tGge7Gge7Gge7Gge7Gge7Gge/Gge/Gge/Gge/hXvd////////////wr3uGge/Gge/Gge/Gge/Gge/hXvd////////////wr3uGge/Gge/Gge/Gge/Gge/GgbCGgbCGgbCGgbChXre////////////V0jSGgbCGgbCGgbCGgbCGgbCKRfG8O77////////wr3vGgbCGgbCGgbCGgbCGgbCGwbGGwbGGwbGGwbGhXrh////////wr3wGwbGGwbGGwbGGwbGGwbGGwbGGwbGhXrh////////wr3wGwbGGwbGGwbGGwbGGwbGGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXJGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMGwXMHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHAXOHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATQHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSHATSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKAAAACAAAABAAAAAAQAYAAAAAACADAAAAAAAAAAAAAAAAAAAAAAAABQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPhhQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQPiBQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihQOihUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOixUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUOjhUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkBUNkhUNkhUNkhUNkhUNkhUNkoJ+xf///////////4J+xRUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNkhUNksG+4v///////////1NOrxUNkhUNkhUNkhUNkhUNkhUNkhYNlRYNlRYNlRYNlRYNlRYNlYN+xv///////////4N+xhYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlRYNlcG+4////////////1ROsRYNlRYNlRYNlRYNlRYNlRYNlRYMlxYMlxYMlxYMlxYMlxYMl4N9yP///////////4N9yBYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMlxYMl8G+4////////////1RNsxYMlxYMlxYMlxYMlxYMlxYMlxYMmhYMmhYMmhYMmhYMmhYMmoN9yf///////////4N9yRYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmhYMmsG+5P///////////1RNtRYMmhYMmhYMmhYMmhYMmhYMmhYMnRYMnRYMnRYMnRYMnRYMnYN9y////////////4N9yxYMnRYMnRYMncG+5f///////4N9yxYMnRYMnRYMncG+5f///////////1RNtxYMnRYMnRYMnRYMnRYMnRYMnRcLoBcLoBcLoBcLoBcLoBcLoIN9zP///////////4N9zBcLoBcLoFVMuf////////////Dv+SYbphcLoBcLoMG+5v///////////1VMuRcLoBcLoBcLoBcLoBcLoBcLoBcLoxcLoxcLoxcLoxcLoxcLo4N9zv///////////4N9zhcLoxcLo8G+5v///////////////5ON1BcLoxcLo8G+5v///////////1VMvBcLoxcLoxcLoxcLoxcLoxcLoxcKphcKphcKphcKphcKphcKpoN80P///////////4N80BcKpnRsyv///////////////////////zYrshcKpsG+5////////////1VLvhcKphcKphcKphcKphcKphcKphgKqBgKqBgKqBgKqBgKqBgKqIR80f///////////4R80RgKqODe8////////////////////////6Od3BgKqMG+6P///////////1ZLvxgKqBgKqBgKqBgKqBgKqBgKqBgKqxgKqxgKqxgKqxgKqxgKq4R80v///////////4R80nRszf///////////8G+6eDe9P///////////zcrtsG+6f///////////1ZLwRgKqxgKqxgKqxgKqxgKqxgKqxgJrxgJrxgJrxgJrxgJrxgJr4R81P///////////4R81ODe9P///////////1ZLxHRrz////////////6Od38G96v///////////1ZLxBgJrxgJrxgJrxgJrxgJrxgJrxkJsRkJsRkJsRkJsRkJsRkJsYR81f////////////Dv+v///////////8K96hkJsRkJseDe9f////////////Dv+v///////////1ZLxhkJsRkJsRkJsRkJsRkJsRkJsRkItBkItBkItBkItBkItBkItIR71////////////////////////////1ZKyBkItBkItHVr0v///////////////////////////1ZKyBkItBkItBkItBkItBkItBkItBkItxkItxkItxkItxkItxkIt4R72f///////////////////////8K97BkItxkItxkItxkIt+De9f///////////////////////1ZKyhkItxkItxkItxkItxkItxkItxoHuhoHuhoHuhoHuhoHuhoHuoV72v///////////////////////1dJzBoHuhoHuhoHuhoHunZq1v///////////////////////1dJzBoHuhoHuhoHuhoHuhoHuhoHuhoHvRoHvRoHvRoHvRoHvRoHvYV73P///////////////////8K97RoHvRoHvRoHvRoHvRoHvRoHveDe9v///////////////////1dJzxoHvRoHvRoHvRoHvRoHvRoHvRoHwBoHwBoHwBoHwBoHwBoHwIV73f///////////////////zkoyBoHwBoHwBoHwBoHwBoHwBoHwHZq2f///////////////////1dJ0RoHwBoHwBoHwBoHwBoHwBoHwBoGwhoGwhoGwhoGwhoGwhoGwoV63v///////////////6Ob5xoGwhoGwhoGwhoGwhoGwhoGwhoGwhoGwuDe9////////////////1dI0hoGwhoGwhoGwhoGwhoGwhoGwhsGxRsGxRsGxRsGxRsGxRsGxYV64P///////////////zknzRsGxRsGxRsGxRsGxRsGxRsGxRsGxRsGxXZq3P///////////////1hI1BsGxRsGxRsGxRsGxRsGxRsGxRsGxxsGxxsGxxsGxxsGxxsGx4V64f///////////6Sb6RsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGxxsGx+He+P///////////1hI1hsGxxsGxxsGxxsGxxsGxxsGxxsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFyRsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBsFzBwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwFzRwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwEzxwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0RwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0hwE0gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

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

	<div class="container">

<?php if ( PROJECT_NAME === 'Project Name' && !isset($export) ) ?>
		<h1><?php echo PROJECT_NAME; ?><?php if (!isset($export)) { ?><a class="edit" href="#">Rename</a><?php } ?></h1>
		<?php if (!isset($export)) { ?>

		<form method="post" action="<?php echo 'lib/setup-project.php'; ?>" class="edit-form">
			<fieldset>
				<input type="text" name="project-name" required placeholder="<?php echo PROJECT_NAME; ?>" class="text-field">
				<input type="submit" value="Rename" class="btn">
				<a href="#" class="dont-edit">Don't rename</a>
			</fieldset>
		</form>
		<?php } ?>

	</div>
	<!-- / container -->

</header>
<!-- / header -->
<hr>

<div class="content">

	<div class="container">

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

		/* Load content of status file and write the data here */
		function getStatusData() {

		$template['title'] = '';
		$template['name'] = '';
		$template['status'] = '';
		$statusFileName = __DIR__ . '/php/config/status.txt';
		$handle = fopen($statusFileName, 'r');
		if ($handle) {
		    while (($statusLine = fgets($handle, 4096)) !== false) {
		        $statusData = explode(';', $statusLine);
		        $template['title'][] .= $statusData[0];
		        $template['name'][] .= $statusData[1];
		        $template['status'][] .= $statusData[2];
		    }
		    if (!feof($handle)) {
		        echo "Error: unexpected fgets() fail\n";
		    }
		    fclose($handle);
		}

		return $template;

		}

		$statusData = getStatusData();

		$i = 0;
		$templates = '';
		foreach ($statusData['name'] as $name) {
		switch ($statusData['status'][$i]) {
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

		$noExt = explode('.', $name);

		(isset ($export)) ? $exportPath = './project/' : $exportPath = 'php/';
		(isset ($export)) ? $extension = 'html' : $extension = 'php';


		 echo '<tr';
		 if ($noExt[0] === 'index') { echo ' class="index"'; }
		 echo '>';
		 echo '<td><a href="'.$exportPath.$noExt[0].'.'.$extension.'">'.$statusData['title'][$i].'</a>';
		 if (!isset($export)) {
		 	echo ' <form method="post" action="lib/edit-template.php" class="inline-form edit-title-form"><input type="hidden" name="template" value="'.$noExt[0].'.'.$extension.'"><a class="btn btn-small" title="Edit template title">edit</a><div><input type="text" name="new-template-title" placeholder="New title" class="text-field" required><input type="submit" value="ok" class="btn"></div></form>';
		 }
		 echo '</td>';
		 echo '<td>'.$noExt[0].'.'.$extension;
		 if (!isset($export) && ($noExt[0] !== 'index')) {
		 	echo ' <form method="post" action="lib/delete-template.php" class="inline-form delete-form"><input type="hidden" name="template" value="'.$noExt[0].'"><input type="submit" value="x" class="btn btn-small" title="Delete template"></form>';
		 }
		 echo '</td>';
		 echo '<td class="status status-'.trim($statusData['status'][$i]).'">'.$status.'</td>';
		 echo '</tr>';

		$i++;
		$templates .= $name . ';';
		}
					?>

				</tbody>
			</table>
			<!-- / template-info -->

			<h2>Archiv</h2>

			<table class="template-info">
				<thead>
					<tr>
						<th>Název archivu</th>
						<th>Vytvořeno</th>
						<th>Velikost</th>
					</tr>
				</thead>
				<tbody>
					<?php 
		if ($handle = opendir( __DIR__  . '/html')) {
		$statusFileContent = '';
		while (false !== ($file = readdir($handle))) {
		  if ($file != '.' && $file != '..') {
				$pathinfo = pathinfo($file);
				if (@$pathinfo['extension'] == 'zip') {

					$exportPath = 'html/';
					if (isset ($export)) { $exportPath = './'; }


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
			<?php if (isset ($export)):?>
			<p>
				Zde si můžete prohlédnout své HTML šablony a&nbsp;stáhnout si archiv
				s&nbsp;jejich aktuální verzí.
			</p>

			<p>
				Všechny HTML šablony jsou umístěny ve složce <em>project</em>.
				Všechny soubory umístěné vně složky <em>project</em> (m.j. tento soubor)
				by neměly být nahrány na váš server.
			</p>
			<?php else: ?>

				<h3>Nová šablona</h3>

				<form method="post" action="<?php echo 'lib/create-template.php'; ?>" class="add-form" data-templates="<?php echo $templates; ?>">
					<fieldset>
						<label for="new-template-title">New template title:</label>
						<input type="text" name="new-template-title" id="new-template-title" required placeholder="New template title" class="text-field">
						<label for="new-template-name">New template name:</label>
						<input type="text" name="new-template-name" id="new-template-name" required placeholder="New template name" class="text-field">
						.php
					</fieldset>
					<label for="new-template-source">Based on:</label>
					<select name="new-template-source" id="new-template-source">
					<?php
		$i = 0;
		foreach ($statusData['name'] as $e) {

		echo '<option value="' . $statusData['name'][$i] . '">' . $statusData['name'][$i] . '</option>';

		$i++;
		}
					?>
					</select>
					<input type="submit" value="Create template" class="btn">
				</form>
				<br>
				<form method="post" action="<?php echo 'lib/index.php'; ?>">
					<input type="submit" value="Update project overview" class="btn">
				</form>

			<?php endif; ?>
		</aside>
		<!-- / sidebar -->
		<hr>

	</div>
	<!-- / container -->

</div>
<!-- / .content -->

<footer id="footer">

	<div class="container">

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
		<p class="smaller">
			GitHub:
			<a href="https://github.com/VencaV/cssframework" target="_blank">CSS framework</a>
			|
			<a href="https://github.com/VencaV/wpready" target="_blank">WordPress ready CSS framework</a>
		</p>

	</div>
	<!-- / container -->

</footer>
<!-- / footer -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/<?php echo JQUERY_VERSION;?>/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $path?>_ui/js/modules/jquery-<?php echo JQUERY_VERSION;?>-min.js"><\/script>')</script>
<script>
	$(document).ready(function() {

		/* Move table row with index to top of table */
		function moveRow() {
			var row = $('tr.index');
			var table = row.parents('table');
			row.prependTo(table);
		}
		moveRow();

		/* Show/hide form for rename of project */
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

		/* Only a-z, 0-9 and -_ allowed in template name */
		function checkCharacters() {

			var str = $('#new-template-name').val();
			var regex = /[a-z]|[_-]|\d|\s/;
			var passed = true;
			for (var i = 0, l = str.length; i < l; i++) {
				if(!regex.test(str[i])) { passed = false; }

			}
			return passed;
		}

		/* Warning when we want overwrite existing template */
		function checkExistingTemplates() {
			var existingTemplates = $('.add-form').attr('data-templates');
			var newTemplate = $('#new-template-name').val();

			var contain = false;
			if(existingTemplates.indexOf(newTemplate) != -1){
				contain = true;
			}
			return contain;
		}
		$('.add-form').on('submit', function() {
			if (!checkCharacters()) {
				alert('Only a-z, 0-9, space and "-" or "_" allowed in template name');
				return false;
			}
			if (checkExistingTemplates()) {
				return confirm('Template already exists. Do you want to overwrite it?');
			};
		});

		/* Warning before deleting template */
		$('.delete-form').on('submit', function() {
			return confirm('Really delete this template?');
		});

		/* Warning before deleting template */
		$('.edit-title-form a').on('click', function(e) {
			e.preventDefault();
			$(this).siblings('div').slideToggle(250);
		});
	});
</script>

</body>
</html>
