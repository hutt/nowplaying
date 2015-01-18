<?php 
/**
	* lastfm api functions
	*
	* @copyright Copyright 2013 Jannis Hutt
	* @link https://github.com/77u4/nowplaying
	* @date 2013-08-13
	* @license Apache License v2 (http://www.apache.org/licenses/LICENSE-2.0.txt)
	* @author Jannis Hutt
	* @package nowplaying
	***************************************************************************
**/
   /* LAST FM API */
	//paste your API Key here. Get it at http://last.fm/api
	 $apikey = "";
	//type your last.fm username here.
	 $lmuser = "";
	//Period / Top Tracks
	//Options: overall | 7day | 1month | 3month | 6month | 12month
	 $period = "";
   /* /LAST FM API */	 
	
	function getSong($what){
		global $apikey, $lmuser;
	
	    $filename = 'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$lmuser.'&api_key='.$apikey; 
	     
	    $xml = simplexml_load_file($filename);
	    
	    	if($what == "artist"){
	    		return $xml->recenttracks->track[0]->artist;
	    	}
	    elseif($what == "name"){
	    		return $xml->recenttracks->track[0]->name;
	    	}
	    elseif($what == "album"){
	    		return $xml->recenttracks->track[0]->album;
	    	}
    }
    
    function getNowplaying(){
    	global $apikey, $lmuser;
    	
		$filename = 'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$lmuser.'&api_key='.$apikey; 
	     
    	$xml = simplexml_load_file($filename);
    	$np = $xml->recenttracks->track[0]->attributes();
    	if($np["nowplaying"] == "true"){
    		return true;
    	}else{
    		return false;
    	}
    }
    
    function getCover($size){
    	global $apikey, $lmuser;
    	
	    $filename = 'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$lmuser.'&api_key='.$apikey; 
	     
    	$xml = simplexml_load_file($filename);
    	
		foreach ($xml->recenttracks->track[0]->image as $image) {
		    switch((string) $image['size']) { // Get attributes as element indices
		    case 'small':
		        $url = $image;
		        break;
		    case 'medium':
		        $url = $image;
		        break;
		    case 'large':
		    	$url = $image;
		    	break;
		    case 'extralarge':
		    	$url = $image;
		    	break;
		    	
		    }
		}
    	
    	return $url;
    }
    
    function getUrl(){
    	global $apikey, $lmuser;
    	
	  	$filename = 'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$lmuser.'&api_key='.$apikey; 
	     
    	$xml = simplexml_load_file($filename);
    	
    	return $xml->recenttracks->track[0]->url;
    }
    
    function getTopArtists($num, $url){
    	global $apikey, $lmuser, $period;
    	
	    $filename = 'http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user='.$lmuser.'&limit='.$num.'&period='.$period.'&api_key='.$apikey;
	    
	    $xml = simplexml_load_file($filename);
	    
	    $num = $num-1;
	    
	    if($url){
			    $name = $xml->topartists->artist[$num]->name;
			    $artistUrl = $xml->topartists->artist[$num]->url;
			   return array($name, $artistUrl);
	    }else{
		    	$name = $xml->topartists->artist[$num]->name;
			   return $name;
	    }
	    
    }
    
    function getArtistPic($artist, $size){
    	global $apikey;
    	
	    $filename = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist='.$artist.'&api_key='.$apikey;
	     
    	$xml = simplexml_load_file($filename);
    	
		foreach ($xml->artist[0]->image as $image) {
		    switch((string) $image['size']) { // Get attributes as element indices
		    case 'small':
		        $url = $image;
		        break;
		    case 'medium':
		        $url = $image;
		        break;
		    case 'large':
		    	$url = $image;
		    	break;
		    case 'extralarge':
		    	$url = $image;
		    	break;
		    	
		    }
		}
    	
    	return $url;
    }

    function getPeriodMsg(){
	    global $period;
	    
	    switch($period){
		    case "overall":
		    	return "Top";
		    	break;
		    case "7day":
		    	return "Top this week";
		    	break;
		    case "1month":
		    	return "Top this month";
		    	break;
		    case "3month":
		    	return "Top (last 3 months)";
		    	break;
		    case "6month":
		    	return "Top (last 6 months)";
		    	break;
		    case "12month":
		    	return "Top (last 12 months)";
		    	break;
		    default:
		    	return "Top (please check \$period in lastfm.php)";
		    	break;
	    }
    }
?>