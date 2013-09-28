<?php
error_reporting(0);

require_once("lastfm.php");

global $apikey, $lmuser;

	$nowplaying = getNowplaying();
	$track = array("name"=>getSong("name"), "artist"=>getSong("artist"), "album"=>getSong("album"));
	$cover = getCover("medium");
	$url = getUrl();
	
	$topartist1 = getTopArtists(1,true);
	$topartist2 = getTopArtists(2,true);
	$topartist3 = getTopArtists(3,true);
	
	$bgcover = getCover("extralarge");

	if($bgcover == "")$bgcover = "festival.jpg";
	
if(isset($_GET['get']) and @$_GET['get'] == "title"){
//Alternate title
if($nowplaying==true){ 
	if($track['artist'] != "" && $track['name'] != "")echo " &#9835; ".$track['name']." | ".$track['artist'];
}else{
	echo "#nowplaying";
}

}elseif(isset($_GET['get']) and $_GET['get'] == "stylesheet"){
?>
	#blurredbg {
		background-image: url('<?php echo $bgcover ?>');
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
<?php
}else{
?>
			<h1><?php 
			if(empty($apikey) || empty($lmuser)){
				echo "something went wrong.";
			}else{
				if($nowplaying == true){
					echo "nowplaying";
				}else{
					echo "lastplayed";
				}
			}
		?></h1>
			<div id="top">Top this month: <a href="<?php echo $topartist1[1] ?>" name="<?php echo $topartist1[0] ?>" target="_blank"><?php echo $topartist1[0] ?></a>, <a href="<?php echo $topartist2[1] ?>" name="<?php echo $topartist2[0] ?>" target="_blank"><?php echo $topartist2[0] ?></a>, <a href="<?php echo $topartist3[1] ?>" name="<?php echo $topartist3[0] ?>" target="_blank"><?php echo $topartist3[0] ?></a></div>
			<div id="info">
				<a href="<?php echo $url ?>" target="_blank">
					<div id="cover_overlay"></div>
					<div id="cover">
						<?php if($cover != ""){  ?>
			<img class="boxShadow" alt="<?php echo $track['album'];  ?>" src="<?php echo $cover ?>" width="100" height="100" /><?php }else{  ?><img class="boxShadow" alt="Kein Cover gefunden" src="chord.png" width="100" height="100" /><?php }  ?>
					</div>
					<p class="artist"><?php if($track['artist'] != ""){ echo $track['artist']; }else{ echo "Unbekannter K&uuml;nstler"; } ?></p>
					<p class="song"><?php if($track['name'] != ""){ echo $track['name']; }else{ echo "Unbekannter Titel"; } ?></p>
					<p class="album"><?php if($track['album'] != ""){ echo $track['album']; }else{ echo "Unbekanntes Album"; } ?></p>
				</a>
<?php
}
?>