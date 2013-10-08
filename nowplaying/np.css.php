<?php
/**
	* stylesheet
	*
	* @copyright Copyright 2013 Jannis Hutt
	* @link https://github.com/77u4/nowplaying
	* @date 2013-08-13
	* @license Apache License v2 (http://www.apache.org/licenses/LICENSE-2.0.txt)
	* @author Jannis Hutt
	* @package nowplaying
**/

	header("Content-type: text/css");
	require_once('lastfm.php');
	
	$bgcover = getCover("extralarge");

	if($bgcover == "")$bgcover = "festival.jpg";
?>

@font-face {
    font-family: 'basic_title_fontregular';
    src: url('basictitlefont-webfont.eot');
    src: url('basictitlefont-webfont.eot?#iefix') format('embedded-opentype'),
         url('basictitlefont-webfont.woff') format('woff'),
         url('basictitlefont-webfont.ttf') format('truetype'),
         url('basictitlefont-webfont.svg#basic_title_fontregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

body {
	font-family: 'Merriweather Sans';
	margin: 0;
	color: #fff;
	background-color: #000;
}

a {
	text-decoration: none;
	color: #fff;
}

a:hover {
	text-decoration: underline;
}

h1 {
	font-weight: normal;
	font-family: 'basic_title_fontregular';
	font-size: 70px;
	margin: 0px 0px 0px 50px;
	padding-top: 125px;
}

#blurredbg {
	background-image: url('<?=$bgcover?>');
	-webkit-filter: blur(5px);
	-moz-filter: blur(5px);
	-ms-filter: blur(5px);
	-o-filter: blur(5px);
	filter: blur(5px);
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	z-index: -1;
	height: 100%;
	width: 100%;
	overflow: hidden;
	background-size: cover;
}

#nowplaying {
	height: 240px;
	background-color: rgba(0,0,0,0.3);
	border-bottom: 1px solid rgba(0,0,0,0.5);
}

#top {
	padding: 0px 0px 0px 56px;
	font-weight: 300;
	font-size: 16px;
	font-family: 'basic_title_fontregular'
}

#info {
	position: absolute;
	right: 50px;
	top: 113px;
}

#cover_overlay {
	position: absolute;
	margin-top: -1px;
	margin-left: -1px;
	height: 100px;
	width: 100px;
	border: 1px solid #000;
	-moz-box-shadow: inset 0 0 0 1px rgba(255,255,255,.09);
	-webkit-box-shadow: inset 0 0 0 1px rgba(255,255,255,.09);
	box-shadow: inset 0 0 0 1px rgba(255,255,255,.09);
	background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0iaGF0MCIgZ3JhZGllbnRVbml0cz0ib2JqZWN0Qm91bmRpbmdCb3giIHgxPSI5MS41NTcwNDk0MTg2MDQ2JSIgeTE9IjkwLjQzMDU5NTkzMDIzMjYlIiB4Mj0iMS41NTcwNDk0MTg2MDQ2NSUiIHkyPSIwLjQzMDU5NTkzMDIzMjU1JSI+CjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNmZmYiIHN0b3Atb3BhY2l0eT0iMC4xMiIvPgo8c3RvcCBvZmZzZXQ9IjQ3JSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CjxzdG9wIG9mZnNldD0iNDclIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9IjAiLz4KPHN0b3Agb2Zmc2V0PSI0OCUiIHN0b3AtY29sb3I9IiNmZmYiIHN0b3Atb3BhY2l0eT0iMC4yIi8+CjxzdG9wIG9mZnNldD0iNDglIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9IjAuMDgiLz4KPHN0b3Agb2Zmc2V0PSI4MiUiIHN0b3AtY29sb3I9IiNmZmYiIHN0b3Atb3BhY2l0eT0iMC4xOCIvPgo8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmYiIHN0b3Atb3BhY2l0eT0iMC4yIi8+CiAgIDwvbGluZWFyR3JhZGllbnQ+Cgo8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0idXJsKCNoYXQwKSIgLz4KPC9zdmc+);
	background-image: -moz-linear-gradient(bottom right, rgba(255,255,255,.12) 13.01%, rgba(255,255,255,0) 55.44%, rgba(255,255,255,0) 55.66%, rgba(255,255,255,.2) 55.88%, rgba(255,255,255,.08) 56.1%, rgba(255,255,255,.18) 87.08%, rgba(255,255,255,.2) 103.01%);
	background-image: -o-linear-gradient(bottom right, rgba(255,255,255,.12) 13.01%, rgba(255,255,255,0) 55.44%, rgba(255,255,255,0) 55.66%, rgba(255,255,255,.2) 55.88%, rgba(255,255,255,.08) 56.1%, rgba(255,255,255,.18) 87.08%, rgba(255,255,255,.2) 103.01%);
	background-image: -webkit-linear-gradient(bottom right, rgba(255,255,255,.12) 13.01%, rgba(255,255,255,0) 55.44%, rgba(255,255,255,0) 55.66%, rgba(255,255,255,.2) 55.88%, rgba(255,255,255,.08) 56.1%, rgba(255,255,255,.18) 87.08%, rgba(255,255,255,.2) 103.01%);
	background-image: linear-gradient(bottom right, rgba(255,255,255,.12) 13.01%, rgba(255,255,255,0) 55.44%, rgba(255,255,255,0) 55.66%, rgba(255,255,255,.2) 55.88%, rgba(255,255,255,.08) 56.1%, rgba(255,255,255,.18) 87.08%, rgba(255,255,255,.2) 103.01%);
}

#cover {
	display: inline;
	float: left;
}

.artist, .song, .album {
	margin-left: 110px;
	white-space: nowrap;
	margin-bottom: 0;
}

.artist {
	font-size: 14px;
	font-weight: 300;
	margin-top: 0;
}

.song {
	font-weight: 400;
	font-size: 18px;
	margin-top: 35px;
}

.album {
	font-size: 14px;
	font-weight: 300;
	margin-top: 0;
}
/* Du CSS-Fetischist! */