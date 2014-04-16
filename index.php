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
		.clearfix:after, #footer:after, .template-info li:after { clear: both; content: '&nbsp;'; display: block; font-size: 0; line-height: 0; visibility: hidden; width: 0; height: 0; }
		#accessibility-nav, .hide { position: absolute; top: -999em; left: -999em; height: 1px; width: 1px; }
		* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
		html,
		body { }
		html { height: 100%; font-size: 100%; }
		body { min-height: 100%; font: 18px/1.6 "Trebuchet MS", "Geneva CE", lucida, sans-serif;
		background: #114b4c url(data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxQjA5NEZDRjNEQzgxMUUzQTQzQUNCNUYxMDNERjhGQiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxQjA5NEZEMDNEQzgxMUUzQTQzQUNCNUYxMDNERjhGQiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjFCMDk0RkNEM0RDODExRTNBNDNBQ0I1RjEwM0RGOEZCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjFCMDk0RkNFM0RDODExRTNBNDNBQ0I1RjEwM0RGOEZCIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4AJkFkb2JlAGTAAAAAAQMAFQQDBgoNAAAaOgAAGwoAACs9AABCXv/b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sAUAEFFEFUEgAAAAlFshaqAAAAAAAAAAICgAAgSgWAAoSgCiFCAAAAAAAABAFkFRBLFksKVFVAogAALJQKiy2KqWFAAAAAAAAAKEQAUAoAAAAAAAAAAAAAAABAqAAgKACkBQAQqJQFAICgAEFAAIAoCAIsEJYAUChUgoICgKWSUWAQALZQAAAAAAAKCAAAAAAAESotALIoBQiChUAAAAAAAAACEVCWCWKBUWACgAEAlKRYLSylkCgAAAAAAAAoEAFAAAAAAAAAAAAAAAAABAqAAAAFAAAAEFIAAAFBBQAAAQAKEBEthYLAgpAKAoASgQFAQKQUAAAAAAAACgEAAAAAAAIlosgUAFEAAKgKIVCgAgAAKQBAqIqAIAADVAIhAFBBS2SqAgsKAAAAAAAUASgAAAAAAAAAAAAAAAAACAqLSQABRQAgKAQJRAAUgBQCAoAIAACooQAELZCqgAKCFhZFAAAAAAAUAhaAAkAAC1CoIFFIIAApAAICgABahUQFQBRUEUAAAAAEKEBEtQAAlgAKKARAACiiKAAqIUAAAAKQFqFIVEABQAApAUgKQAAAAA0gABSAFgIVQAACFEQChREpSFABCgAAAIUAAACEKqAAAAAAAAAAAAAAFAAAAAEKAgKIKAQEKoQAFAIAAAAVEoKAQAFBAQFIAUAAACUQAAioEVCtJAUEUAEAACghQqUAAAAAUIgFKAAhSFAIUEBSAFBAUhSAoAAAAEBCghQCAFAIUEKUAAAAAAAAAAAAEAUAAAAIAAAACggAKBAACgEAEKAoAIKAAQKAAAAAgKAAESlAAAAAABAAUAAAgVAAAEWQC0BBAAAAAAAAC2UAAAACgSFBQAAAAAAAAAAAAAAAAAAAAQoIAAUAAgAKAAAAAAAAAAAAAAQAAEKAAqAAAAoICgQUAEIClBAAAAAUAAAgCgEAKCAAAAAUAAAAAAAAAAAAEChAAAEiKAAALQggAAAAC1ZFAAKAAiUAoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAFAAAAABBQAACAoAAAAAAAAABCAoAABQAACFAAAAAAAAAAAAAABAFAQABBLAC0SgEUCCAFACpQAAKIABQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAAABQQUAAAAAAAAAAAAAAAAgBSFAAAAAAAAAAAAAAAAAAAAABAAFAQBACgAAARKiigskqgACiCkKAAAAAAAAAAAAAAAAAAgAAAAAAAKAAAQAAoAAIAAAAAAAAAAAAAAUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAKAAAAAQpAACgAEAAABQAAAIAFQAAAAAAAAAAAoEoAAAACAAAAAAAAAAAAAACgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAECgAAAAIAAAACgBUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEUAAAAAACoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABBQLLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2abLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2abNNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2abLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2WbLNlmyzZZss2W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22/9v3s0ONv/AP8AwAt/J/nBLWS2222227RQAAAkkkkkkkkkktttttsYf/6yCZCTKdtptgRtJJttsZPbWNCSQCJ7fb//AG2/tvkkn/8A/Mksgv8A/wA++/23/mHY2yGySSSySWT3xGmpt7STdt/RgAQu/wB//wDz+YYdtpNtlstltttttm22m2IOAAACB/yB4IABAAAAmkAAABwkkkkkkAAkkkkkkgAAAAAQAkCABBwEkgAkkkkhxABIIBJ+f+RJJClSSZrPTsyAJfttJpKkkkkkgP8AwABppJpNptpNpptJJJJAQ8vsv/knk+AAAAAAJJJJAAAUgAAACttttt2ttgEksAMt9kAAwAAUSSSCStAAAeAAAAAAAS2AAACBskkjWAN7e/bbbbbalttttwHugBJJJJJJJJJJJJJJJJJAAQCG2AACQwAABAAJJJJJJAAASUk8kkNtttyN0GAAH+gEmSWyAAAAkAEsAmUyNmAAAAAIAAAAAAAQBttk/bbbYCbbbbbYNtt2WDmwABJJJJJJJJJJJJJJJJJAAAAAAAAAAAAAJJJJJJJJJAAAAAAAAQiAQCSQEgAAAwAAAAAAAAAAH8lkmAAACAAAAAJIAAAAAAAAQgBts1bYUkgCbaSSlttgkyAAAJJJJJJJJJJJJJJJJJJIAAAAAAAAAAABJJJJJJJJJJJJIAAAAAQkkkgOgAAAAAAAAAAAAAAAA2CAAAIAAAAAAAJIAAABJJIAAQkgBs20ltkl2QB0ttw0QAAAJJJJJJJJJJJJJJL/AP8A/wD/AP8A/wDSSSf/AP0km/8A/wD/AP8A/wD/AP8A/wD/AP8A/JJJJJJJAAJJJNJJJJJJJJJJJJJJJJJJP/5JJJJN9/8A+SSf/wD/APpJJAJPNttttttCbZNtJRJJJJP/AP8A/wD/AP8A/wD/AP8A/wD/AP8A2222222222222222222222222222222222+3/wD/AP8At+22223+22/23v8Abbbbbb/9ttt7bbfttttt/ttttttt7bbT9bb/AO2//wD/AP8A3/G23/7bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb3/AP8Atttttttttttttttttttttttttt7bSSSTttvbbb9mbb9tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt/7bbbbSSSSSTbftttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt/8A/wD/AP8Abbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb/2gAIAQEDAT8Q8uqqqqgAAAAAAAADAAAl/wAn/vEr+T/2M3+T/fjTcqqrI6oiIiIiIrimZmZmRn+T/fAABAADAXDAAAAAAvAAAAAAAqqqqr+V/fAAAAACAhqAAB/J/s/k/wBjxMw1VVdW2qqjKl/H/wA5kf5P9n8n+z+T/Y/5P/Y9JFVXiCYiI6qqqzqqoiNtGRlfyf8As/k/2fyf7P5P9n8n+z+T/Z/J/vE/yf7P5P8AZ9rxGZmZu5kR3TERE/8A2fI8qq6umIp2GUT/ACf7P5P9lPCQAAAAAAAAgABeKAAAAARVVVPxHl6vS4guNfGPqe/44FhaN5Wl1peBPZ4p88bWj+uWQ+BEFn6C1uXvdvrsnt9BckGt/nHyfBRYhCEeYQhCdaRiovnhXHBi4FyvnezQh/GW8fTWnuxaN7L5x8FLj5WITC99qfOlKXg+ClLvSl8BrH1w0PMEtlCj+cv5wxi1eHqsvRar4xcJ8beFl4eY8TWEIQmXhZWZsuSE4F5n10esw19eBXX5yp9czD0WFv8AjgmrZ7lKXSHuXgelLyP5Hiar5ytXl4Wr3Ty0TPwUQsLFWVyouIfI/Z5SH8HttCEPjMWiwt14i5X8vwH86we7WGTDFoxbtzSEF76Xgpd3wfBdU9KLdPgfyMfAspfXgg/bZ6rNWKPCLRb3FKUXvu1lMaollkJhiWEiY/GsRCEIRZXD8LHz6a/nf31axCEJokNYjPfT3+57jVIyCRKTS49yl6KUr0pdG+OlRRYpfzo3m6fBdnh/I/ka3gvfa6PMy+G/TkmKy35yi8DQlo90sQ99EQn2IRnufjE39z3x8FL4C4IQhCEI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) center top repeat-x fixed;
		color: #fff6c5; box-shadow: inset 0 0 300px rgba(43,36,0,.4); }
		hr { display: none; }
		strong { font-weight: bold; }
		em { font-style: italic; }
		del { text-decoration: line-through; }
		th { font-weight: normal; }
		address, cite, dfn { font-style: normal; }
		li { list-style: none; }
		abbr, acronym { border-bottom: 1px dotted #999; cursor: help; }
		input, textarea, select { font-family: "Trebuchet MS", "Geneva CE", lucida, sans-serif; }
		a, a:visited { color: #ec6800; text-decoration: underline; }
		a:hover, a:active { text-decoration: none; }
		a:focus { outline: 0; }
		h1,h2,h3,h4 { font-family: Impact, Charcoal, fantasy; font-weight: normal; letter-spacing: 6px; text-transform: uppercase;
		text-shadow: 1px 1px 0 #d88a00, -1px -1px 0 #333, -2px -2px 0 #333, -3px -3px 0 #333, -4px -4px 1px #333;
		color: #e4c149;
		}
		h1 { font-size: 4em; line-height: 1; }
		h1 i,
		h2 i { font-style: normal; color: #ec6800; }
		h2 i { padding-right: .5ex; }
		h1 a,
		a.dont-edit { padding-left: 1ex; font-family: "Trebuchet MS", "Geneva CE", lucida, sans-serif; font-weight: normal; text-transform: none;
		font-size: small; letter-spacing: 0; text-shadow: none; }
		h2 { font-size: 3em; margin-bottom: 0.75em; }
		h3 { font-size: 2.5em; line-height: 1; margin-bottom: 0.5em; }
		h4 { font-size: 1.8em; line-height: 1; margin-bottom: 0.5em; }
		p { margin-bottom: 1em; }
		em { border-bottom: 1px dotted #999; font-style: italic; }

		.container { position: relative; max-width: 1170px; margin: auto; }
		#header { position: relative; padding: 3em 2em 1em; }
		#header:after { content: ''; display: block; width: 100%; height: 4px; margin: 1em 0 0; clear: both;
		background-color: #e4c149; box-shadow: 1px 1px 0 #d88a00, -1px -1px 0 #333, -2px -2px 1px #333; }

		#content,
		#sidebar { padding: 2em; }
		#content { position: relative; float: left; padding-top: 1em; width: 65%; }
		#sidebar { float: right; width: 35%; }
		#footer { clear: both; padding: 0 2em 2em; }
		#footer:before { content: ''; display: block; width: 100%; height: 4px; margin: 0 0 2em; clear: both;
		background-color: #e4c149; box-shadow: 1px 1px 0 #d88a00, -1px -1px 0 #333, -2px -2px 1px #333; }

		.template-info { width: 100%; margin: 0 0 3em; }
		.template-info:last-child { margin: 0; }
		.template-info tr:nth-child(even) { background: rgba(114,156,118,.1); }
		.template-info tbody tr:hover { background: rgba(114,156,118,.1); }
		.template-info td,
		.template-info th { padding: 1ex 1em 1ex 0; border-bottom: 1px dashed #225f60; }
		.template-info th { font-size: 11px; text-transform: uppercase; }
		.template-info h4 { margin: 0; }

		.status:before {
		content: ''; position: relative; top: 4px; margin: 0 1ex 0 0;
		float: left; width: 18px; height: 18px; border-radius: 9px;
		}
		.status-0:before { background-color: #990e11; }
		.status-1:before { background-color: #f99200; }
		.status-2:before { background-color: #0daa18; }

		.edit-form { display: none; padding-top: 1ex; }
		.inline-form { display: inline; }
		.edit-title-form > div { display: none; }
		label { display: block; }
		.text-field,
		.btn,
		select { border-radius: 3px; border: 2px solid #faf1ae; font-size: 16px; }
		.text-field,
		select { display: inline-block; width: 220px; height: 36px; padding: 4px 6px;
		background: #ffeec2; color: #666; box-shadow: inset 0 0 10px rgba(43,36,0,.7); }
		.text-field {
			line-height: 24px;
		}

		.text-field:focus,
		select:focus { outline: 0; background: #fff5b3; color: #333; }

		.btn {
			display: inline-block; padding: 5px 14px 6px; color: #333;
			text-decoration: none; cursor: pointer;
			background: #ec6800; box-shadow: -1px -1px 0 #333;
		}
		.btn.btn-small { padding: 2px 5px; border-style: none; font-size: 12px; line-height: 11px; font-weight: bold; }
		.btn:hover { background: #ec5e00; }

		#sidebar .text-field,
		#sidebar select { margin: 0 0 1ex; }
		#sidebar select { display: block; }

		/* Media queries */
		@media all and (max-width: 900px) {
			.container { padding: 1.5em; }
			#header { padding: 1em 0; }
			#header .logo { float: none; display: block; margin: 0 0 1em; }
			#content,
			#sidebar { width: auto; float: none; }
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
		<h1><i>✰</i><?php echo PROJECT_NAME; ?><i>✰</i><?php if (!isset($export)) { ?><a class="edit" href="#">Rename</a><?php } ?></h1>
		<?php if (!isset($export)) { ?>

		<form method="post" action="<?php echo 'lib/setup-project.php'; ?>" class="edit-form">
			<fieldset>
				<input type="text" name="project-name" required placeholder="<?php echo PROJECT_NAME; ?>" class="text-field">
				<input type="submit" value="Rename" class="btn">
				<a href="#" class="dont-edit">Don't rename</a>
			</fieldset>
		</form>
		<?php } ?>

	</header>
	<!-- / header -->
	<hr>


	<section id="content" role="main">

		<h2><i>☞</i>Šablony</h2>

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

		<h2><i>☞</i>Archiv</h2>

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

			<h4>Nová šablona</h4>

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
			var regex = /[a-z]|_-|\d|\s/;
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
