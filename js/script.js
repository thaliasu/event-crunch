var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

$(document).ready(function() {
  //initMap();
  $(".nodata").html("");
  $("#output").html("");
  $('.button-collapse').sideNav();
  $('.parallax').parallax();

  $("#get-event").click(function(e){
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
            $('<h1>'+response[0].lineup[0]+'</h1>').appendTo('#output');
                var newDiv = $('<div></div>').attr('id', 'newRow');
                newDiv.attr("class", "row");
                newDiv.appendTo('#output');
                //in this row have two cols

                //BAND COl
                var newCol = $('<div></div>').attr('id', 'newCol');
                newCol.attr("class", "col s6");
                newCol.appendTo(newDiv);

                //artist name
                $('<span>Artist: </span><p id="date"></p>').appendTo(newCol);
                $("#artist").html(artistField);  //acceptable code?

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

                //Add event button under 2 cols
                $('<button type="button" id="add-event"></button>').appendTo(newCol);
                var newButton = $('<div></div>').attr('id', 'newButton');
                  newButton.attr("class", "waves-effect waves-light btn-large");
                  newButton.attr("class", "row");
                  newButton.appendTo(newDiv);  //not sure if appending to the right thing
                  //add click event later that triggers checking for session & displays success/fail message for adding event

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
                          $('<h1>'+FilteredData[0].lineup+'</h1>').appendTo(newCol);
                          $.each(FilteredData, function(i, evt){
                            //$(".info-container").html("<h1 class='artist-header'>"+evt.lineup+"</h1><div class='event-info'><p class='date'>"+evt.datetime+"</p><p class='venue'>"+evt.venue.name+"</p></div>");

                            //Break this up so that it creates a new div for each item in
                            //the object


                            //append a new row to body
                            var newDiv = $('<div></div>').attr('id', 'newRow' + i);
                            newDiv.attr("class", "row");
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
