var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

$(document).ready(function() {
  //initMap();
  $(".nodata").html("");
  $("#output").html("");
  $('.button-collapse').sideNav();
    $('.parallax').parallax();
  
  $("#get-weather").click(function(e){
    e.preventDefault();
    $(".progress").css("display", "block");
    //prevent empty fields
     if($.trim($('#artist-search').val()) == ''){
        $(".error").css("display", "block").html("input cannot be left blank");
     } else {
      $(".error").css("display", "none");
      $(".info-container").css("display", "block");
      //artist field
      var artistField = $("#artist-search").val();
      //Location Field
      var locationField = $("#location").val();
      $.getJSON("https://rest.bandsintown.com/artists/"+artistField+"/events?app_id="+bandKey, function(response){
        console.log(response);
        //only return shows where venue is = to the city they inputed
        var FilteredData = response.filter(function(elem){return (elem.venue.city == locationField) });
            
          
                      if(FilteredData.length == 1){

                        var newDiv = $('<div></div>').attr('id', 'newRow');
             newDiv.attr("class", "row");
              newDiv.appendTo('#output');
                              //in this row have two cols
                              
                //BAND COl
                              var newCol = $('<div></div>').attr('id', 'newCol');
                              newCol.attr("class", "col s6");
                newCol.appendTo(newDiv);

                //Date
                $('<span>Date: </span><p id="date"></p>').appendTo(newCol);
                $("#date").html(FilteredData[0].datetime);

                //Venue
                $('<span>Venue: </span><p id="venue"></p>').appendTo(newCol);
                $("#venue").html(FilteredData[0].venue.name);

                //Status
                $('<span>Status: </span><p id="status"></p>').appendTo(newCol);
                $("#status").html(FilteredData[0].offers[0].status);

                //Tickets
                $('<span>Tickets: </span><p id="tickets"></p>').appendTo(newCol);
                $("#tickets").html("<a href='"+FilteredData[0].offers[0].url+"' target='_blank'>Tickets</a>");


                //MAP COL
                var newMapCol = $('<div></div>').attr('id', 'newMap');
                              newMapCol.attr("class", "col s6");
                newMapCol.appendTo(newDiv);
                              
                              $('<div id="map0" class="mapSize"></div>').appendTo(newMapCol);

                              //Get lat and lon of venue
                              var lat = Number(FilteredData[0].venue.latitude);
                              var lon = Number(FilteredData[0].venue.longitude);
                              var current = 0;
                              //Maps Logic
                              initMap(lat,lon,current);

                            /*
                            $(".artist-header").html(FilteredData[i].lineup);
                          $(".date").html(FilteredData[i].datetime);
                          $(".venue").html(FilteredData[i].venue.name);
                          $(".status").html(FilteredData[i].offers[0].status);
                          $(".tickets").html("<a href='"+FilteredData[i].offers[0].url+"' target='_blank'>Tickets</a>");
                            

                            */
                      }
                      else if (FilteredData.length > 1) {
                          
                          $.each(FilteredData, function(i, evt){
                            //$(".info-container").html("<h1 class='artist-header'>"+evt.lineup+"</h1><div class='event-info'><p class='date'>"+evt.datetime+"</p><p class='venue'>"+evt.venue.name+"</p></div>");
                            
                            //Break this up so that it creates a new div for each item in 
                            //the object


                            //append a new row to body
                            var newDiv = $('<div></div>').attr('id', 'newRow' + i);
              newDiv.appendTo('#output');
                              //in this row have two cols
                              
                //BAND COl
                              var newCol = $('<div></div>').attr('id', 'newCol' + i);
                              newCol.attr("class", "col s6");
                newCol.appendTo(newDiv);

                //Date
                $('<span>Date: </span><p id="date'+ i + '"></p>').appendTo(newCol);
                $("#date"+i).html(FilteredData[i].datetime);

                //Venue
                $('<span>Venue: </span><p id="venue'+ i + '"></p>').appendTo(newCol);
                $("#venue"+i).html(FilteredData[i].venue.name);

                //Status
                $('<span>Status: </span><p id="status'+ i + '"></p>').appendTo(newCol);
                $("#status"+i).html(FilteredData[i].offers[0].status);

                //Tickets
                $('<span>Tickets: </span><p id="tickets'+ i + '"></p>').appendTo(newCol);
                $("#tickets"+i).html("<a href='"+FilteredData[i].offers[0].url+"' target='_blank'>Tickets</a>");


                //MAP COL
                var newMapCol = $('<div></div>').attr('id', 'newMap' + i);
                              newMapCol.attr("class", "col s6");
                newMapCol.appendTo(newDiv);
                              
                              $('<div id="map' + i + '" class="mapSize"></div>').appendTo(newMapCol);

                              //Get lat and lon of venue
                              var lat = Number(FilteredData[i].venue.latitude);
                              var lon = Number(FilteredData[i].venue.longitude);
                              var current = i;
                              //Maps Logic
                              initMap(lat,lon,current);





                            /*
                            $(".artist-header").html(FilteredData[i].lineup);
                          $(".date").html(FilteredData[i].datetime);
                          $(".venue").html(FilteredData[i].venue.name);
                          $(".status").html(FilteredData[i].offers[0].status);
                          $(".tickets").html("<a href='"+FilteredData[i].offers[0].url+"' target='_blank'>Tickets</a>");
                            

                            */
                            
                          });

                      } else {
                        
                        $(".nodata").html("<p>no data</p>");
                        //console.log("NO DATA");
                      }

                      
                      console.log(FilteredData);
      }); 
      
      $.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+locationField+",us&units=imperial&APPID="+weatherKey, 
      function(data){
      
      });
      $(".progress").css("display", "none");
      };
    




    });

      

  function initMap(latC,lonC,current) {
        var uluru = {lat: latC, lng: lonC};
        var map = new google.maps.Map(document.getElementById('map' + current), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }



  });