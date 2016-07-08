# instagrammedia
## Synopsis
Uses Instagram api to get a user's recent media.  There are 2 options<br>
1. Use supported instagram api that requires authorization via an  access token.<br>
   This option requires additional steps to get an authorization token<br>
2. Uses, possibly unsupported api, that does not require authorization.


## Code Example
<strong>Example using option 2</strong>
To use option 1, replace function 'getUserMediaNoAuth' with 'getUserRecentMedia'.<br>
If using wordpress, you can include your instagram feed to your site, by copying the sample html document in a text widget or a page. 

```html
<html>
<head>
	<title>Instagram</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">  
	<style>
		div.image {
			padding: 0px;
			float:left;
			margin-right:5px;
		}
		div.img-container {
			overflow: hidden;
			margin: 0 auto;
 			width: 100%;
		}
               body {
                      font-family: 'Old Standard TT', serif;
                      font-size: 15px;
              }
	</style>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	
	 <!-- no authorization required -->
	 <script>	
		$.getScript("/instagrammedia/instagramapi.js",function(){
			getUserMediaNoAuth("bellasjardin", 8); 
		});			
	</script>
        <div class="img-container">
	  <div class="img" id="instagram-images" styl</div>
        </div>
</body>
</html>
```
## Motivation
You may want to include your recent instagram feeds into a personal website

## Instructions
<strong>instagramapi.js</strong> has 2 functions to retrieve user media, one that requires authorization and one that does not.<br>
1. <strong>function getUserMediaNoAuth(user, count)</strong><br> 
   user: instagram user<br>
   count: number of media to return up to a max of 20<br>
2. <strong>function getUserRecentMedia(user, count)</strong><br>
   user: instagram user<br>
   count: number of media to return <br>
 <br>
3. <strong>instagramapi.php</strong> has 2 functions and serves as a proxy for the above 2 api's <br>
a. <strong>function getUserMediaNoAuth ($username)</strong><br>
   instagram endpoint: <i>https://www.instagram.com/username/media/</i><br>
   Does not require authorization and is undocumented, so may not be officially supported. <br>
b. <strong>function getUserRecentMedia($username, $count)</strong><br>
   instagram endpoint: <i>https://api.instagram.com/v1/users/USER-ID/media/recent/?access_token=ACCESS-TOKEN</i><br>
   Supported api that requires authorization.  <br>
   Update accesstoken.php, replacing ACCESS-TOKEN with your value.<br>
4. Deploy these files to your webiste and create html to call the javascript functions. 
   

## API Reference
https://www.instagram.com/developer/endpoints/users/

## Tests
See the home page of:  www.bellasjardin.com 

## Contributors
Evan Uribe


