<?php
/**
	* API file, optional
	*
	* @copyright Copyright 2013 Jannis Hutt
	* @link https://github.com/77u4/nowplaying
	* @date 2013-08-13
	* @license Apache License v2 (http://www.apache.org/licenses/LICENSE-2.0.txt)
	* @author Jannis Hutt
	* @package nowplaying
**/

require_once('lastfm.php');

//Vars
$title 	= getSong('name');
$artist	= getSong('artist');
$album	= getSong('album');
$url	= getCover('extralarge');

if(isset($_GET['mode'])){
	switch ($_GET['mode']){
		case 'xml':
			header('Content-type: application/xml');
			echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
			<nowplaying>
				<title>'.$title.'</title>
				<artist>'.$artist.'</artist>
				<album>'.$album.'</album>
				<coverUrl>'.$url.'</coverUrl>
			</nowplaying>';
			break;
		case 'json':
			header('Content-type: application/json');
			echo '{
"title": "'.$title.'",
"artist": "'.$artist.'",
"album": "'.$album.'",
"coverUrl": "'.$url.'"
}';
			break;
		case 'txt':
			header('Content-type: text/plain');
			echo 'now playing: '.$title.' by '.$artist.' took from '.$album;
			break;
		default:
			echo 'Something went wrong, check parameters.';
	}
}
?>