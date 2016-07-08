<?php


/**
*  Not documented, but returns user media up to 20 without authentication
**/
function getUserMediaNoAuth ($username='bellasjardin') {
	$url = 'https://www.instagram.com/' . $username . '/media/';
	return execCurl ($url);

	//$response = file_get_contents($url);
	//return $response;	
}

/**
*  User recent media requiring access token
**/
function getUserRecentMedia($username, $count) {
	//get the access token 
	include 'accesstoken.php';
	
	//get the user id
	$json = getUserId($accesstoken);
	//print $json;
	
	$obj = json_decode($json);
	$userid = $obj->data->id;
	//print $userid;
	
	//now get the user's recent media
	$url = "https://api.instagram.com/v1/users/" .$userid ."/media/recent/?access_token=" .$accesstoken ."&count={$count}" ;	
	return execCurl ($url);
	
	//$response = file_get_contents($url);
	//return $response;
}

/**
* Get the user id for a given access token
**/
function getUserId($accesstoken) {
	$url = 'https://api.instagram.com/v1/users/self/?access_token=' .$accesstoken;
	return execCurl ($url);
}

/**
* Execute http curl request 
**/
function execCurl($url) {
	//echo "<br> URL: $url <br>";
	
	$curl = curl_init();
	
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false)
	);
	
	$curl_response = curl_exec($curl);
	//echo $curl_response;
	
	$curl_errno = curl_errno($curl);
	
	if ($curl_errno > 0 || $curl_response === false)
    {
        $info = curl_getinfo($curl);
        echo 'error occured during curl exec - ' . var_export($info) ;
        echo '<br> error -----------> '. curl_error($curl); 
    }
    
    curl_close($curl);
	return $curl_response;
}




$function = $_GET['functionname'];
$username = $_GET['username'];
$count = $_GET['count'];


//echo ('getUserRecentMedia' == $function) ? 'true' : 'false';
//echo (strcmp($function, "getUserRecentMedia")==0) ? 'true' : 'false';
		

if (isset($function)) {
	if (function_exists($function)){
      if (strcmp($function, "getUserRecentMedia")==0 and (isset($username)) and (isset($count))) {
      	$response = getUserRecentMedia($username, $count);
      	echo $response;
      }
      else 
	  if (strcmp($function, "getUserMediaNoAuth")==0 and (isset($username))) {
      	$response = getUserMediaNoAuth($username);
      	echo $response;
      }
	}
}



?>
