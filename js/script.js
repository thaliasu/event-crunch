var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

$(document).ready(function() {
  //initMap();
  $(".nodata").html("");
  $("#output").html("");
  $('.button-collapse').sideNav();
  $('.parallax').parallax();

  $("#get-event").click(function(e){
    $("#output").html("");
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
      var capitalLocationField = locationField.substr(0,1).toUpperCase()+locationField.substr(1);

      $.getJSON("https://rest.bandsintown.com/artists/"+artistField+"/events?app_id="+bandKey, function(response){
        console.log(response);

        //only return shows where venue is = to the city they inputed
        var FilteredData = response.filter(function(elem){return (elem.venue.city == capitalLocationField) });


          if(FilteredData.length == 1){
            $('<h1 class="center-align">'+response[0].lineup[0]+'</h1>').appendTo('#output');
                var newDiv = $('<div></div>').attr('id', 'newRow');
                newDiv.attr("class", "row");
                newDiv.appendTo('#output');
                //in this row have two cols

                //BAND COl
                var newCol = $('<div></div>').attr('id', 'newCol');
                newCol.attr("class", "col s6");
                newCol.appendTo(newDiv);

                //Artist Name
                $('<span class="inlinethis">Artist: </span><span id="artist"></span><br><br>').appendTo(newCol);
                $("#artist").html(FilteredData[0].lineup);
                //data

                //Date
                $('<span>Date: </span><span id="date"></span><br><br>').appendTo(newCol);
                $("#date").html(FilteredData[0].datetime);

                //Venue
                $('<span>Venue: </span><span id="venue"></span><br><br>').appendTo(newCol);
                $("#venue").html(FilteredData[0].venue.name);

                //Status
                $('<span>Status: </span><span id="status"></span><br><br>').appendTo(newCol);
                $("#status").html(FilteredData[0].offers[0].status);

                //Tickets
                $('<span id="tickets"></span><br><br>').appendTo(newCol);
                $("#tickets").html("<a class='ticketlink' href='"+FilteredData[0].offers[0].url+"' target='_blank'>Tickets</a>");

                //Add event button under 2 cols
                $('<button type="button" id="add-event" class="waves-effect waves-light btn-large">Add Event</button>').appendTo(newCol);
                


                // var newButton = $('<div></div>').attr('id', 'newButton');
                //   newButton.attr("class", "waves-effect waves-light btn-large");
                  
                  // newButton.appendTo(newCol);  //not sure if appending to the right thing
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

                            
                      }
                      else if (FilteredData.length > 1) {
                          console.log(FilteredData);
                          $('<h1 class="center-align">'+response[0].lineup[0]+'</h1>').appendTo('#output');
                          $.each(FilteredData, function(i, evt){
                            //append a new row to body
                            var newDiv = $('<div></div>').attr('id', 'newRow' + i);
                            newDiv.attr("class", "row");
                            newDiv.appendTo('#output');

                            //Artist Col
                            var newCol = $('<div></div>').attr('id', 'newCol' + i);
                            newCol.attr("class", "col s6");
                            newCol.appendTo(newDiv);



                //Artist
                $('<span>Artist: </span><span id="artist'+ i + '"></span><br><br>').appendTo(newCol);
                $("#artist"+i).html(FilteredData[i].lineup[0]);

                //Date
                $('<span>Date: </span><span id="date'+ i + '"></span><br><br>').appendTo(newCol);
                $("#date"+i).html(FilteredData[i].datetime);

                //Venue
                $('<span>Venue: </span><span id="venue'+ i + '"></span><br><br>').appendTo(newCol);
                $("#venue"+i).html(FilteredData[i].venue.name);

                //Status
                $('<span>Status: </span><span id="status'+ i + '"></span><br><br>').appendTo(newCol);
                //var status = FilteredData[i].offers[0].status;
                var status = FilteredData[i].offers[0] && FilteredData[i].offers[0].status;
               
                if(typeof status !== "undefined"){
                
                  $("#status"+i).html(FilteredData[i].offers[0].status);
                } else {
                  $("#status"+i).html('Not Available');
               }




                //Tickets
                $('<span id="tickets'+ i + '"></span><br><br>').appendTo(newCol);

                 var ticketstatus = FilteredData[i].offers[0] && FilteredData[i].offers[0].url;
                 if(typeof ticketstatus !== "undefined"){
                $("#tickets"+i).html("<a class='ticketlink' href='"+FilteredData[i].offers[0].url+"' target='_blank'>Tickets</a>");
              }

              //Add Event
              $('<button type="button" id="add-event' + i + '" class="waves-effect waves-light btn-large">Add Event</button>').appendTo(newCol);

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
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }


      $(document).ready(function(){
    $('.parallax').parallax();
  });




  });
