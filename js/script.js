
var weatherKey = '0d450de0d245dfc5e948f81653ccd3f7';
var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';
var arr = []; 
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
			//location field
			var locationField = $("#location").val();
			$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+locationField+",us&units=imperial&APPID="+weatherKey, 
			function(data){
				console.log(data);
				locationData = data;
			});
			$(".info-container").html("<div class='row'><div class='col-1-2'><h1>"+bandData.venue.city[locationField]+"</h1>");
		}
	});
});
	
	
  
