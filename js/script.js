
var weatherKey = '0d450de0d245dfc5e948f81653ccd3f7';
var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

var bandData;
var locationData;

$(document).ready(function() {
	$("#get-weather").click(function(e){
		e.preventDefault();
		//prevent empty fields
	   if($.trim($('#artist-search').val()) == ''){
	      $(".error").css("display", "block").html("input cannot be left blank");
	   } else {
			$(".error").css("display", "none");
			//artist field
			var artistField = $("#artist-search").val();
			$.getJSON("https://rest.bandsintown.com/artists/"+artistField+"/events?app_id="+bandKey, function(response){
				console.log(response);
				bandData = response;
			});

			/*$.ajax({

	            url: 'https://rest.bandsintown.com/artists/'+artistField+'/events?app_id='+bandKey,
	            type: 'GET',
	           
	            async: false,
	            success: function(data){
	              	console.log(data);
					bandData = data;
	            },
	            error: function(response){
	              console.log('error!');
	            }
          	});*/ //testing different ajax methods
			//location field
			var locationField = $("#location").val();
			$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+locationField+",us&units=imperial&APPID="+weatherKey, 
			function(data){
				console.log(data);
				locationData = data;
			});
			/*$.ajax({
	            url: 'http://api.openweathermap.org/data/2.5/weather?q='+locationField+',us&units=imperial&APPID='+weatherKey,
	            type: 'GET',
	            
	            async: false,
	            success: function(data){
	              	console.log(data);
					locationData = data;
	            },
	            error: function(response){
	              console.log('error!');
	            }
          	});*/ //testing different ajax methods

			/*function callback(response, data) {
				bandData = response;
				locationData = data;
			}*/

			
			function getEventsByCity(city) {
			  	return bandData.filter(
			      function(bandData){ return bandData.city == city }
			  );
			};
		
			var found = getEventsByCity(locationField);
			};

		});
	});

	

	
	
  
