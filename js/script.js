
var key = '0d450de0d245dfc5e948f81653ccd3f7';
var arr = []; 

$(document).ready(function() {

	$("#get-weather").click(function(e){
		e.preventDefault();
		var searchText = $("#search").val();
		$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+searchText+",us&units=imperial&APPID=0d450de0d245dfc5e948f81653ccd3f7", 
		function(data){
			var weatherData = {
				temperature: document.getElementById("temp"),
				temperatureValue: 0,
				units: "°F"
			};
			$("#weather").html("<p>it is currently <a href='#'><span id='temp'>"+data.main.temp+weatherData.units+"</span></a> in "+searchText+"</p><br /><p>"+data.weather[0].description+"<img src='http://openweathermap.org/img/w/"+data.weather[0].icon+".png'></p>");
			
			$("#temp").click(function(){
				
				function switchUnits(){
				  if (weatherData.units == "°C"){
				    weatherData.temperatureValue = roundTemperature(weatherData.temperatureValue * 9/5 + 32);
				    weatherData.units = "°F";
				  }
				  else{
				    weatherData.temperatureValue = roundTemperature((weatherData.temperatureValue -  32) * 5/9);
				    weatherData.units = "°C";
				  }

				  weatherData.temperature.innerHTML = weatherData.temperatureValue + weatherData.units + ", ";      
				}
			});
			
			$.getJSON("https://api.flickr.com/services/feeds/photos_public.gne?tags="+searchText+",+skyline&tagmode=all&format=json&jsoncallback=?", function(response){
				console.log(response.items[1].media.m);
				$("body").css('background-image', 'url('+response.items[2].media.m+')');
				$("#image-source").attr("href", response.items[1].media.m);
				//$("#weather").css('background-image', 'url('+response.media.m[1]+')');
			});
		});

	})
	
  });
