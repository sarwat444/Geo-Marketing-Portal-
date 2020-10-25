<?php
/*
** Page Description : This Page For Drawing Path Between MR And Hospitals  .  
** 
*/


    ob_start(); // Output Buffering Start

    session_start();

    $pageTitle = 'Items';

    if (isset($_SESSION['user'])) 
      {

        include 'init.php';

         $lat = $_GET['lat'];
         $lng = $_GET['lng'];
         $id  = $_SESSION['uid'] ;
    
     

      $stmt = $con->prepare("SELECT * FROM medical_repersentative WHERE Mr_id = '$id'");

      // Execute The Statement

      $stmt->execute();

      // Assign To Variable 

      $rows = $stmt->fetch();



  
        ?>
       <!--Start Maping-->
<div id="map"></div>





<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDbkllF-ZrsAcZKwkMua_KdmlLJunCyfZI"></script>
<div class="button">
<button id="routebtn" class="btn btn-primary">Shw The Path  <i class="fas fa-chart-line"></i></button>
</div>
<div id="map-canvas"></div>
   
        
        <?php

        include $tpl . 'footer.php';
        ?>
     <script type="text/javascript">
       function mapLocation() {
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var chicago = new google.maps.LatLng(37.334818, -121.884886);
        var mapOptions = {
            zoom: 7,
            center: chicago
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        directionsDisplay.setMap(map);
        google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
    }

    function calcRoute() {
        var start = new google.maps.LatLng(<?php echo $rows['lat']; ?> , <?php echo $rows['lng']?>);
        //var end = new google.maps.LatLng(38.334818, -181.884886);
        var end = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
        /*
var startMarker = new google.maps.Marker({
            position: start,
            map: map,
            draggable: true
        });
        var endMarker = new google.maps.Marker({
            position: end,
            map: map,
            draggable: true
        });
*/
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}
mapLocation();

     </script>
     <script type="text/javascript">
       


      
x = navigator.geolocation ; 
x.getCurrentPosition(success , failure)
function success (position)
{
var mylat = position.coords.latitude ; 
var mylong = position.coords.longitude ; 
 jQuery.ajax({
      url: '/graduation/add_action.php',
      type: 'post',
      data: {
           lat : mylat ,
                   lng : mylong 
             },
      success: function(data) {
        jQuery('#child').html(data);
      },
      error: function() {
        alert("Something went wrong with the child options!");
      },
    });


}
function failure(){



}







     </script>

    <?php
        
      } else {

        header('Location: index.php');

        exit();
     }

    ob_end_flush(); // Release The Output

?>