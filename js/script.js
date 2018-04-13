
var weatherKey = '0d450de0d245dfc5e948f81653ccd3f7';
var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

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
				var FilteredData = response.filter(function(elem){return (elem.venue.city == locationField) });
                      if(FilteredData.length == 1){
                          console.log(FilteredData.length);
                          $(".artist-header").html(FilteredData[0].lineup)
                      }
                      else if (FilteredData.length > 1) {
                          for (var i = 0; i < FilteredData.length; i++) {
                          	console.log(FilteredData[i].lineup);
                          }
                      }
			});
			//location field
			var locationField = $("#location").val();
			$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+locationField+",us&units=imperial&APPID="+weatherKey, 
			function(data){
				
			});
			};

		});
	});

	

	
	
  
