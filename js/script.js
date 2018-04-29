var bandKey = '4f45c5ceb4c55ae3533d6bff4bdbfd0e';

$(document).ready(function() {
  //initMap();
  $('.parallax').parallax();
  $(".nodata").html("");
  $("#output").html("");

  $('.button-collapse').sideNav();
  $('.parallax').parallax();

  $("#get-event").click(function(e){ //1 unadded
    $("#output").html("");
    $("#nodata").html("");
    e.preventDefault();
    $(".progress").css("display", "block");
    //prevent empty fields
     if($.trim($('#artist-search').val()) == ''){ //2 unadded
        $(".error").css("display", "block").html("input cannot be left blank");
     } else { //2 unadded
      $(".error").css("display", "none");
      $(".info-container").css("display", "block");
      //artist field
      var artistField = $("#artist-search").val();
      //Location Field
      var locationField = $("#location").val();
      var capitalLocationField = locationField.substr(0,1).toUpperCase()+locationField.substr(1);

      $.getJSON("https://rest.bandsintown.com/artists/"+artistField+"/events?app_id="+bandKey, function(response){ //3 unadded
        console.log(response);

        //only return shows where venue is = to the city they inputed
        var FilteredData = response.filter(function(elem){ //done
          return (elem.venue.city == capitalLocationField);
        }); //done
        console.log(FilteredData);

        if(FilteredData.length == 1){  //4 unadded
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


                //Date
                $('<span>Date: </span><span id="date"></span><br><br>').appendTo(newCol);
                var eventDate = FilteredData[0].datetime;

                date = new Date(eventDate);
                year = date.getFullYear();
                month = date.getMonth()+1;
                dt = date.getDate();

                if (dt < 10) {
                  dt = '0' + dt;
                }
                if (month < 10) {
                  month = '0' + month;
                }

                var finalDate = (year+'-' + month + '-'+dt);

                $("#date").html(finalDate);

                //Get thumb url but hide it(Q this will require fixing for more than one result due to it not being filtered)
                //also first getJSON will finish before running this one
                $.getJSON("https://rest.bandsintown.com/artists/"+artistField+"?app_id="+bandKey, function(response){
                $('<span id="url" class="hidethis"></span>').appendTo(newCol);
                $("#url").html(response.thumb_url);
                });


                //Venue
                $('<span>Venue: </span><span id="venue"></span><br><br>').appendTo(newCol);
                
                $("#venue").html(FilteredData[0].venue.name);

                //Status
                $('<span>Status: </span><span id="status" class="status"></span><br><br>').appendTo(newCol);
                // var available = FilteredData[0].offers[0].status;
                // console.log(available);
                // $("#status").html(FilteredData[0].offers[0].status);


                var status = FilteredData[0].offers[0] && FilteredData[0].offers[0].status;
                if(typeof status !== "undefined"){
                  var available = FilteredData[0].offers[0].status;
                  var CapAvailable = available.substr(0,1).toUpperCase()+available.substr(1);
                  console.log(CapAvailable);
                  $("#status").html(CapAvailable);
                } else {
                  $("#status").html('Not Available');
               }



                //Tickets
                $('<span id="tickets"></span><br><br>').appendTo(newCol);
                $("#tickets").html("<a class='ticketlink' href='"+FilteredData[0].offers[0].url+"' target='_blank'>Tickets</a>");

                //Add event button under 2 cols
                $('<button type="button" id="add-event" class="waves-effect waves-light btn-large addEbtn">Add Event</button>').appendTo(newCol);

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


          } //end of if

          else if (FilteredData.length > 1) {

                
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

                var eventDate = FilteredData[i].datetime;

                date = new Date(eventDate);
                year = date.getFullYear();
                month = date.getMonth()+1;
                dt = date.getDate();

                if (dt < 10) {
                  dt = '0' + dt;
                }
                if (month < 10) {
                  month = '0' + month;
                }

                var finalDate = (year+'-' + month + '-'+dt);

                $("#date"+i).html(finalDate);

                //URL
                //THIS IS WHERE WE NEED TO FIX SOMETHING!!!!!
                 // $.getJSON("https://rest.bandsintown.com/artists/"+artistField+"?app_id="+bandKey, function(response2){
                 //  // var FilteredData = response.filter(function(elem){ //done
                 //  //  return (elem.venue.city == capitalLocationField)
                 //  // }); 
                 //  console.log("the url JSON response is");
                 //  console.log(response2);
                 // // $('<span id="url' + i + '" class="hidethis"></span>').appendTo(newCol);
                 // // $("#url" + i).html(response.thumb_url);
                 // });

                //Venue
                $('<span>Venue: </span><span id="venue'+ i + '"></span><br><br>').appendTo(newCol);
                $("#venue"+i).html(FilteredData[i].venue.name);

                //Status
                $('<span>Status: </span><span id="status'+ i + '" class="status"></span><br><br>').appendTo(newCol);
                //var status = FilteredData[i].offers[0].status;
                var status = FilteredData[i].offers[0] && FilteredData[i].offers[0].status;

                if(typeof status !== "undefined"){
                  var available = FilteredData[i].offers[0].status;
                  var CapAvailable = available.substr(0,1).toUpperCase()+available.substr(1);
                  console.log(CapAvailable);
                  $("#status"+i).html(CapAvailable);
                } else {
                  
                  $("#status"+i).html('Not Available');
                  $("#status"+i).addClass("unavailable");
               }

                //Tickets
                $('<span id="tickets'+ i + '"></span><br><br>').appendTo(newCol);

                 var ticketstatus = FilteredData[i].offers[0] && FilteredData[i].offers[0].url;
                 if(typeof ticketstatus !== "undefined"){
                $("#tickets"+i).html("<a class='ticketlink' href='"+FilteredData[i].offers[0].url+"' target='_blank'>Tickets</a>");
              }

              //Add Event
              $('<button type="button" id="add-event' + i + '" class="waves-effect waves-light btn-large addEbtnM">Add Event</button>').appendTo(newCol);

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

                          }); //end of for each
          } //End of else if
                      else {
                        $("#nodata").html("<h1>No Results</h1>");
                        // console.log("beserk!");
                      }
                      console.log(FilteredData);
      }); //end of getJSON

      $(".progress").css("display", "none");

      }
  });


$(document).on("click", ".addEbtn", function(){
  console.log($(this).attr("id"));
   console.log("single");
  //get values of the data
  //get artist name
  var artist = $("#artist").text();
  console.log(artist);

  var date = $("#date").text();
  console.log(date);

  var venue = $("#venue").text();
  console.log(venue);

  var url = $("#url").text();
  console.log(url);



  //Ajax request to store this stuff in the database
  $.ajax({
  method: "POST",
  url: "add-event.php",
  data: { artist: artist, date: date, venue: venue, url: url }
})
  .done(function( response ) {
    alert(response);
  });






});


$(document).on("click", ".addEbtnM", function(){
  var idtotal = $(this).attr("id");
  console.log(idtotal);
  var id = idtotal.replace("add-event", "");
  //get values of the data
  console.log(id);
  console.log("multiple");
  //get values of the data
  //get artist name
  var artist = $("#artist" + id).text();
  console.log(artist);

  var date = $("#date" + id).text();
  console.log(date);

  var venue = $("#venue" + id).text();
  console.log(venue);

  var url = $("#url" + id).text();
  console.log(url);

  //Ajax request to store this stuff in the database
  $.ajax({
  method: "POST",
  url: "add-event.php",
  data: { artist: artist, date: date, venue: venue, url: url }
})
  .done(function( response ) {
    alert(response);
  });
  

});



$(document).on("click", "#removeEvent", function(){
  console.log($(this).attr("id"));
  var deleteClicked = 1;
  //Ajax request to store this stuff in the database
  $.ajax({
  method: "POST",
  url: "delete-event.php",
  data: { deleteClicked: deleteClicked }
})
  .done(function( response ) {
    location.reload();
  });






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

});
