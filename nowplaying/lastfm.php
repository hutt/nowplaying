<?php 
	/* LAST FM API */
	//paste your API Key here. Get it at http://last.fm/api
	 $apikey = "";
	//type your last.fm username here.
	 $lmuser = "";
	//Period / Top Tracks
	//Options: overall | 7day | 1month | 3month | 6month | 12month
	 $period = "";
	/***************/
	
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
?>