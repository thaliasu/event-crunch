
var weatherKey = '0d450de0d245dfc5e948f81653ccd3f7';
var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

$(document).ready(function() {
	$('.button-collapse').sideNav();
    $('.parallax').parallax();
	
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
				var FilteredData = response.filter(function(elem){return (elem.venue.city == locationField) });
						
                      if(FilteredData.length == 1){

                        //$(".info-container").html("<h1 class='artist-header'>"+FilteredData[0].lineup+"</h1><div class='event-info'><p class='date'>"+FilteredData[0].datetime+"</p><p class='venue'>"+FilteredData[0].venue.name+"</p><p class='desc'>"+FilteredData[0].description+"</p></div>");
                        $(".artist-header").html(FilteredData[0].lineup);
                        $(".date").html(FilteredData[0].datetime);
                        $(".venue").html(FilteredData[0].venue.name);
                        $(".status").html(FilteredData[0].offers[0].status);
                        $(".tickets").html("<a href='"+FilteredData[0].offers[0].url+"' target='_blank'>Tickets</a>");
                      }
                      else if (FilteredData.length > 1) {
                          $.each(FilteredData, function(i, evt){
                          	$(".info-container").html("<h1 class='artist-header'>"+evt.lineup+"</h1><div class='event-info'><p class='date'>"+evt.datetime+"</p><p class='venue'>"+evt.venue.name+"</p></div>");
                          	if (i == FilteredData.length) {
                          		return false;
                          	}

                          }) 
                      } else {
                      	$(".info-container").html("<p>no data</p>");
                      }
                      console.log(FilteredData);
			});
			//location field
			var locationField = $("#location").val();
			$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+locationField+",us&units=imperial&APPID="+weatherKey, 
			function(data){
				
			});
			};
		});
	});

	

	
	
  
