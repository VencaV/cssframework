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
	<title>HTML &amp; CSS Framework</title>
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

		.template-info { width: 100%; margin: 0 0 2em; }
		.template-info + p {
			margin-top: -1em;
			margin-bottom: 2em;
		}
		.template-info:last-child { margin: 0; }
		.template-info tr { transition: background-color linear .15s; }
		.template-info tr:nth-child(even) { background: rgba(0,0,0,.017); }
		.template-info tbody tr:hover { background: rgba(0,0,0,.017); }
		.template-info td,
		.template-info th { padding: 1ex 1em 1ex 0; border-bottom: 1px dashed #e5e5e5; }
		.template-info th { font-size: 11px; text-transform: uppercase; color: #666; }
		.template-info h4 { margin: 0; }

		.status {
			white-space: nowrap;
		}
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
		a.btn,
		select { vertical-align: middle; border-radius: 3px; border: 1px solid #ddd; font-size: 16px; color: #333; }
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

		.template-browser {
			display: none; position: fixed; left: 0; top: 0; width: 100%; height: 100%;
			border: 10px solid rgba(0,0,0,0);
			background-color: rgba(0,0,0,.15);
		}
		.template-browser-header,
		a.template-browser-close {
			position: fixed;
			top: 0;
			padding: 5px 10px;
			font-size: 13px; background: rgba(30,30,30,.6);
			color: #fff; text-shadow: 1px 1px 0 rgba(0,0,0,.75);
			box-shadow: inset 0 0 12px 0 rgba(0,0,0,.4);
			color: #fff;
		}
		.template-browser-close {
			z-index: 3; right: 0;
			text-decoration: none;
			border-radius: 0 0 0 3px;
		}
		.template-browser-header {
			z-index: 2; position: fixed; left: 0; top: 0; margin-right: 30px;
			border-radius: 0 0 3px 0;
		}
		.template-browser-header a {
			display: inline-block;
			padding: 0 5px;
			color: #fff;
		}
		.template-browser-header a.active {
			text-decoration: none;
			cursor: not-allowed;
		}
		.template-browser-content {
			z-index: 1; position: absolute; left: 0; top: 0; width: 100%; height: 100%;
		}
		.template-browser iframe {
			width: 100%; height: 100%; border: 0; margin: 0; padding: 0;
			border: 1px solid #eee;
			box-shadow: 1px 1px 2px rgba(0,0,0,.4);
		}

		/* Media queries */
		@media all and (max-width: 900px) {
			.container { padding: 0 1.5em; }
			.content { padding: 0; }
			#header .logo { float: none; display: block; margin: 0 0 1em; }
			#content,
			#sidebar { width: auto; float: none; padding: 0; }
			#content { min-width: 0; padding: 2em 0; }
			#sidebar { padding: 0 0 2em; border: 0; box-shadow: none; background: none; color: #0c0800; }
		}
		@media all and (max-width: 767px) {
			.container { padding: 0 1em; }
			h1 { font-size: 2.5em; }
			h2,
			h3 { font-size: 1.7em; }
			table.template-info thead {
				display: none;
			}
			table.template-info th,
			table.template-info td,
			table.template-info tr {
				display: block;
			}
			table.template-info th,
			table.template-info td {
				display: block;
				padding-top: .25ex;
				padding-bottom: .25ex;
				border: 0;
			}
			table.template-info tr {
				padding-bottom: 10px;
				margin-bottom: 10px;
				border-bottom: 1px dashed #e5e5e5;
			}
			table.template-info tr:last-child {
				margin-bottom: 0;
				padding-bottom: 0;
				border-bottom: 0;
			}
			.template-info tr:nth-child(even),
			.template-info tbody tr:hover {
				background: none;
			}
		}
		@media all and (max-width: 479px) {
			h1 a, a.dont-edit { display: block; padding: 1ex 0 0; }
			.text-field { width: auto; display: block; margin: 1ex 0; }
			h1 { font-size: 1.8em; }
			h2,
			h3 { font-size: 1.3em; }
		}

	</style>
	<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAMAEBAAAAEAIABoBAAANgAAABgYAAABACAAiAkAAJ4EAAAgIAAAAQAgAKgQAAAmDgAAKAAAABAAAAAgAAAAAQAgAAAAAABABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiVd0PJkzlUCVM45YmTeTdJk3k3SVM45YmTOVQIlXdDwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACVN5GAkTePDJkvi/CZN5P8mTeT/Jk3k/zNj+P8uWvD/KFHn/yZL4vwkTePDJU3kYAAAAAAAAAAAAAAAAAAAAAAmS+THJk3k/yZN5P8mTeT/Jk3k/yZN5P85bP//OWz//zls//81Z/r/LVju/yZN4sYAAAAAAAAAAAAAAAAAAAAAJEvj3iZN5P8pT+T/W3jr/5ut8//c4vv/3uf//6O7//9oj///O27//zNj9/8mTeTdAAAAAAAAAAAAAAAAAAAAACZN4vUmTeT/gZjv/////////////////////////////////4in//81Zvr/JE3i9AAAAAAAAAAAAAAAACpV6QwmTeT/Jk3k/5ap8v//////tML2/0xs6f9chv//vc7///////+atP//OGn8/yZN5P8qVekMAAAAAAAAAAAjTeIkJk3k/yZN5P9mgez/k6by/0tr6f8mTeT/OWz//36f////////q8H//zls//8nTeT/JFDhIwAAAAAAAAAAJk3lOyZN5P8mTeT/dI3u/5Om8v+TpvL/k6by/5y2//+4yv///////73O//85bP//KFDn/ydP5DoAAAAAAAAAACVN41ImTeT/Jk3k/9La+f/////////////////////////////////P2///OWz//ylU6f8lS+JRAAAAAAAAAAAmTORqJk3k/yZN5P/l6fz//////56v8/+TpvL/nLb//5y2//+ctv//i6n//zls//8sVuz/Jk3kaQAAAAAAAAAAJU3jgSZN5P8mTeT/9vj+//////8vVOX/Jk3k/zls//85bP//OWz//zls//85bP//Llrv/yVN44AAAAAAAAAAACZN5JgmTeT/MVbl////////////////////////////////////////////QnL//y9d8f8mTeKXAAAAAAAAAAAkTeOvJk3k/0do6P///////////////////////////////////////////1N///8xX/T/Jk3krgAAAAAAAAAAJkvkxyZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//NGP3/yZN4sYAAAAAAAAAACRL494mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P85bP//OWz//zls//85bP//OWz//zVm+f8mTeTdAAAAAAAAAAAmTeL1Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/JE3i9AAAAADwDwAAwAMAAMADAADAAwAAwAMAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAKAAAABgAAAAwAAAAAQAgAAAAAABgCQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIlXdDyZM5VAlTOOWJk3k3SZN5N0lTOOWJkzlUCJV3Q8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADJU7jNyZN5H0kTePDJkvi/CZN5P8mTeT/Jk3k/ylS6P8mTeT/Jk3k/yZL4vwkTePDJk3kfSVL4jYAAAADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACZN5GklTeTuJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//82aPv/MV/z/ytV6/8mTuX/Jk3k/yZN5P8lTeTuJEzkaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACVN5KQmTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//84av7/MmL2/y1Y7v8mTeT/JUzkowAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACZM4rsmTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8zV+b/b4nt/3ud//9EdP//OWz//zls//85bP//OWz//zhs//8mTeT/JkvjugAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACRM5NImTeT/Jk3k/yZN5P9GaOj/h53w/8jS+P/7/P7////////////7/P//y9j//5Ct//9Vgf//OWz//zls//8oUOb/JEvk0QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACZN4uomTeT/Jk3k/z1g5///////////////////////////////////////////////////////R3b//zls//8qU+n/Jkvi6QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABCZN4v4mTeT/Jk3k/1Fx6f/////////////////29/7/ucb2/7/Q///3+f//////////////////WoT//zls//8rVuz/Jkvi/QAAAAMAAAAAAAAAAAAAAAAAAAAAKkrfGCZN5P8mTeT/Jk3k/2aB7P///////////7vH9/8uU+X/Jk3k/zls//9Acf//wtL/////////////a5H//zls//8tWe7/Jk3k/yFN6BcAAAAAAAAAAAAAAAAAAAAAJUvjLyZN5P8mTeT/Jk3k/2J/7P/J0/j/ydP4/3uT7/8mTeT/Jk3k/zls//85bP//o7r/////////////fZ///zls//8wXfH/Jk3k/yZN4y4AAAAAAAAAAAAAAAAAAAAAJ0viRyZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//ka3/////////////kK3//zls//8xX/T/Jk3k/yRM5UYAAAAAAAAAAAAAAAAAAAAAJUvjXiZN5P8mTeT/Jk3k/4Sa8P/J0/j/ydP4/8nT+P/J0/j/ydP4/87b///O2///4en/////////////orr//zls//8zYvb/Jk3k/yZM410AAAAAAAAAAAAAAAAAAAAAJUzkdSZN5P8mTeT/Jk3k/7XC9v//////////////////////////////////////////////////////tMf//zls//80Zfn/Jk3k/yVM5HQAAAAAAAAAAAAAAAAAAAAAJkzjjCZN5P8mTeT/Jk3k/8jS+P//////////////////////////////////////////////////////xtX//zls//82aPz/Jk3k/yZM44wAAAAAAAAAAAAAAAAAAAAAJU3kpCZN5P8mTeT/Jk3k/9rh+v///////////3aP7v9ceuv/XHrr/2uR//9rkf//a5H//2uR//9rkf//X4j//zls//85a/7/Jk3k/yVM5KMAAAAAAAAAAAAAAAAAAAAAJkziuyZN5P8mTeT/Jk3k/+3w/f///////////zhc5v8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//J0/m/yZL47oAAAAAAAAAAAAAAAAAAAAAJEzk0iZN5P8mTeT/KU/k//3+/////////////5Wo8v+TpvL/k6by/5y2//+ctv//nLb//5y2//+ctv//nLb//ztt//85bP//KVPp/yRL5NEAAAAAAAAAAAAAAAAAAAAAJk3i6iZN5P8mTeT/O17n/////////////////////////////////////////////////////////////////0p5//85bP//K1Xr/yZL4ukAAAAAAAAAAAAAAAAAAAAEJk3i/iZN5P8mTeT/UXHp/////////////////////////////////////////////////////////////////1yG//85bP//LVnu/yZL4v0AAAADAAAAAAAAAAAqSt8YJk3k/yZN5P8mTeT/RGXo/5Om8v+TpvL/k6by/5Om8v+TpvL/k6by/5y2//+ctv//nLb//5y2//+ctv//nLb//1F+//85bP//L1zx/yZN5P8hTegXAAAAAAAAAAAlS+MvJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//MF7z/yZN5P8mTeMuAAAAAAAAAAAnS+JHJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//M2L2/yZN5P8kTOVGAAAAAAAAAAAlS+NeJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zBc8v8wXPL/MFzy/zBc8v8wXPL/MFzy/zBc8v8wXPL/LVnu/yZN5P8mTONdAAAAAAAAAAAlTOR1Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8lTOR0AAAAAP8A/wD4AB8A4AAHAOAABwDgAAcA4AAHAOAABwDgAAcAwAADAMAAAwDAAAMAwAADAMAAAwDAAAMAwAADAMAAAwDAAAMAwAADAMAAAwCAAAEAgAABAIAAAQCAAAEAgAABACgAAAAgAAAAQAAAAAEAIAAAAAAAgBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiVd0PJkzlUCVM45YmTeTdJk3k3SVM45YmTOVQIlXdDwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyVO4zcmTeR9JE3jwyZL4vwmTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mS+L8JE3jwyZN5H0lS+I2AAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiTOUeJkziZCVM5KolTeTuJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zFg9P8sV+z/J07l/yZN5P8mTeT/Jk3k/yZN5P8lTeTuJUzkqiZN5WMiTOUeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJk3lYyZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/OWz//zls//84a/7/M2P3/y5a7/8oUef/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8nTuRiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlTeOBJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P85bP//OWz//zls//85bP//OWz//zls//81Zvr/MF3y/ypU6v8mTeT/Jk3k/yVN44AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACZN5JgmTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//ytV6/8mTeT/Jk3ilwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJE3jryZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8pT+T/W3jr/5ut8//c4vv/3uf//6O7//9oj///O27//zls//85bP//OWz//zls//85bP//LVju/yZN5P8mTeSuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAmS+THJk3k/yZN5P8mTeT/Jk3k/zVa5v9zjO7/s8H2//Hz/f/////////////////////////////////x9f//uMv//32f//9Fdf//OWz//zls//8uW/D/Jk3k/yZN4sYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACRL494mTeT/Jk3k/yZN5P8mTeT/09v5/////////////////////////////////////////////////////////////////9Dc//85bP//OWz//zFf8/8mTeT/Jk3k3QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJk3i9SZN5P8mTeT/Jk3k/yZN5P/n6/z/////////////////////////////////////////////////////////////////4en//zls//85bP//M2L2/yZN5P8kTeL0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACpV6QwmTeT/Jk3k/yZN5P8mTeT/Jk3k//r7/v/////////////////Z4Pr/k6by/0xs6f9chv//nLb//93m///////////////////z9v//OWz//zls//80ZPn/Jk3k/yZN5P8qVekMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAI03iJCZN5P8mTeT/Jk3k/yZN5P80Web/////////////////09v5/yZN5P8mTeT/Jk3k/zls//85bP//OWz//9vk//////////////////8+cP//OWz//zZo+/8mTeT/Jk3k/yRQ4SMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAmTeU7Jk3k/yZN5P8mTeT/Jk3k/0hp6P////////////////+9yff/Jk3k/yZN5P8mTeT/OWz//zls//85bP//ydf//////////////////1B9//85bP//OWr+/yZN5P8mTeT/J0/kOgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACVN41ImTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P85bP//OWz//zls//+4yv//////////////////Yov//zls//85bP//J0/l/yZN5P8lS+JRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJkzkaiZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//6a9//////////////////90mP//OWz//zls//8pUuj/Jk3k/yZN5GkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlTeOBJk3k/yZN5P8mTeT/Jk3k/4Sa8P///////////////////////////////////////////////////////////////////////////4al//85bP//OWz//ytV6/8mTeT/JU3jgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACZN5JgmTeT/Jk3k/yZN5P8mTeT/mKvy////////////////////////////////////////////////////////////////////////////mLL//zls//85bP//LVju/yZN5P8mTeKXAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJE3jryZN5P8mTeT/Jk3k/yZN5P+ruvX///////////////////////////////////////////////////////////////////////////+qwP//OWz//zls//8vW/D/Jk3k/yZN5K4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAmS+THJk3k/yZN5P8mTeT/Jk3k/73J9////////////////////////////////////////////////////////////////////////////7vN//85bP//OWz//zBe8/8mTeT/Jk3ixgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACRL494mTeT/Jk3k/yZN5P8mTeT/0dn5/////////////////1Ny6v8mTeT/Jk3k/yZN5P85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//MmH2/yZN5P8mTeTdAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJk3i9SZN5P8mTeT/Jk3k/yZN5P/k6fz/////////////////QGPn/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//81ZPj/Jk3k/yRN4vQAAAAAAAAAAAAAAAAAAAAAAAAAACpV6QwmTeT/Jk3k/yZN5P8mTeT/Jk3k//b4/v////////////////8vVOX/Jk3k/yZN5P8mTeT/OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zZn+/8mTeT/Jk3k/ypV6QwAAAAAAAAAAAAAAAAAAAAAI03iJCZN5P8mTeT/Jk3k/yZN5P8xVuX//////////////////////////////////////////////////////////////////////////////////////0Jy//85bP//OGr+/yZN5P8mTeT/JFDhIwAAAAAAAAAAAAAAAAAAAAAmTeU7Jk3k/yZN5P8mTeT/Jk3k/0do6P//////////////////////////////////////////////////////////////////////////////////////U4D//zls//85bP//Jk/l/yZN5P8nT+Q6AAAAAAAAAAAAAAAAAAAAACVN41ImTeT/Jk3k/yZN5P8mTeT/XXrr//////////////////////////////////////////////////////////////////////////////////////9ljf//OWz//zls//8pUej/Jk3k/yVL4lEAAAAAAAAAAAAAAAAAAAAAJkzkaiZN5P8mTeT/Jk3k/yZN5P9zje7//////////////////////////////////////////////////////////////////////////////////////3ea//85bP//OWz//ytV6v8mTeT/Jk3kaQAAAAAAAAAAAAAAAAAAAAAlTeOBJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//LFjt/yZN5P8lTeOAAAAAAAAAAAAAAAAAAAAAACZN5JgmTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//8uWvD/Jk3k/yZN4pcAAAAAAAAAAAAAAAAAAAAAJE3jryZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zFe8/8mTeT/Jk3krgAAAAAAAAAAAAAAAAAAAAAmS+THJk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/zls//85bP//OWz//zls//85bP//OWz//zls//85bP//OWz//zls//85bP//MmH1/yZN5P8mTeLGAAAAAAAAAAAAAAAAAAAAACRL494mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5N0AAAAAAAAAAAAAAAAAAAAAJk3i9SZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/Jk3k/yZN5P8mTeT/JE3i9AAAAAAAAAAA//AP//+AAf/4AAAf8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD+AAAAfgAAAH4AAAB+AAAAfgAAAH4AAAB+AAAAfgAAAH4AAAB+AAAAfgAAAHwAAAA8AAAAPAAAADwAAAA8AAAAPAAAADwAAAA8AAAAPAAAADwAAAA8AAAAM=">
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
				<input type="text" id="project-name" name="project-name" required placeholder="<?php echo PROJECT_NAME; ?>" class="text-field">
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
		 echo '<td><a href="'.$exportPath.$noExt[0].'.'.$extension.'" class="template-name">'.$statusData['title'][$i].'</a>';
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

			<p>
				<a href="#" class="btn template-browser-show">Procházet všechny šablony</a>
			</p>
			<div class="template-browser">
				<div class="template-browser-header"></div>
				<div class="template-browser-content"><iframe></iframe></div>
				<a href="#" class="template-browser-close">X</a>
			</div>

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

			<a href="http://vracovsky.cz" title="Václav Vracovský"><span>Václav Vracovský</span></a>
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
			$('.edit-form').slideToggle(200);
			$(this).toggle();
			$('#project-name').focus()
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

		/* Transform teplate title into template name */
		function slug(str) {
			str = str.replace(/^\s+|\s+$/g, ''); // trim
			str = str.toLowerCase();

			// remove accents, swap ñ for n, etc
			var from = 'ãàáäâẽèéëêìíïîõòóöôùúüûñçěščřžýáíéóúůňďť·/_,:;'
			var to   = 'aaaaaeeeeeiiiiooooouuuuncescrzyaieouundt------'
			for (var i=0, l=from.length ; i<l ; i++) {
				str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
			}

			str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
			.replace(/\s+/g, '-') // collapse whitespace and replace by -
			.replace(/-+/g, '-'); // collapse dashes

			return str;
		};

		$('#new-template-title').on('keyup blur', function() {
			var val = $(this).val()
			var name = $('#new-template-name')
			name.attr('value',slug(val))
		})

		// Template browser
		$('.template-name').each(function() {
			var title = $(this).text()
			var src = $(this).attr('href')
			$('.template-browser-header').append('<a href="' + src + '">' + title + '</a>')
		})
		$('.template-browser-header a').on('click', function(e) {
			e.preventDefault()
			if(!$(this).hasClass('active')) {
				appendIframe($(this))
			}
		})
		$('.template-browser-show').on('click', function(e) {
			e.preventDefault()
			$('.template-browser').fadeIn(200)
			$('body').css('overflow', 'hidden')
		})
		$('.template-browser-close').on('click', function(e) {
			e.preventDefault()
			$('.template-browser').fadeOut(200)
			$('body').css('overflow', 'auto')
		})
		function appendIframe(el) {
			$('.template-browser-header a').removeClass('active')
			el === undefined ? el =  $('.template-browser-header a:first-child') : el = el
			var src = el.attr('href')
			$('.template-browser-content iframe').attr('src', src)
			el.addClass('active')
		}
		appendIframe()
	});
</script>

</body>
</html>
