/**
*  User recent media requiring access token
**/
function getUserRecentMedia(user, count) {
	
	$(document).ready(function(){
		
		$.ajax({
		    url: 'instagramapi.php',
		    type: "GET",
		    data: { 'functionname': 'getUserRecentMedia', "username": user, 'count': count}, 
		    success: function(results) {
		    	result =  JSON.parse(results);
		    	//console.log(result.data);
		    	
		    	$.each(result.data, function(i, data) {	
		   			srcImage = data.images.thumbnail.url; 
		   			likes = data.likes.count;
		   					   						   									
		  			$("<div class=image>").appendTo("#instagram-images")
		  				.append($("<a href='" + data.link + "'></a>")   
		  				.append("<img width=\"75\" height=\"75\" src=\"" + srcImage + "\">"))
		  				.append($("<div class=likes>").text("likes: " +likes));	 					
		  				
		   		});
		    },
		    error: function(XMLHttpRequest, textStatus, error) {
		    	//todo
		    }
		});
		
	});
}

/**
*  User media without access token
**/
function getUserMediaNoAuth(user, count) {
	
	$(document).ready(function(){
		
		$.ajax({
		    url: '/mycontent/instagramapi/instagramapi.php',
		    type: "GET",
		    data: { 'functionname': 'getUserMediaNoAuth', "username": user},  
		    success: function(results) {
		    	result =  JSON.parse(results);
		    	//console.log(result.items);
		    	
		    	$.each(result.items, function(i, item) {
		    		if (i >=count)
		    			return false;	
		   			srcImage = item.images.thumbnail.url; 
		   			likes = item.likes.count;	
		   					   						   									
		  			$("<div class=image>").appendTo("#instagram-images")
		  				.append($("<a href='" + item.link + "'></a>")    
		  				.append("<img width=\"75\" height=\"75\" src=\"" + srcImage + "\">"))
		  				.append($("<div class=likes>").text("likes: " +likes))	  					
		  				
		   		});
		    },
		    error: function(XMLHttpRequest, textStatus, error) {
		    	//todo
		    }
		});
		
	});
}




