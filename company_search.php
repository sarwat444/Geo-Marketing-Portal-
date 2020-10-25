<?php
	ob_start();
	session_start();
	$pageTitle = 'Company Dashbord';
     $nonav  = ' ' ;
	if (isset($_SESSION['comp'])) {
		header('Location: company_search.php');
	}


	include 'init.php'; 
  $parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']) : '');
	?>
    
        <!--Find Departments -->
        <?php
        $stmt = $con->prepare("SELECT * FROM departments");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll(); ?>

          <!-- End Find Departments -->
<div class="maping">
	 <div class="options-box">
         
             <div class="form-group">
                  <input class="btn btn-primary" id="show-listings" type="button" value="Show Listings">
                  <input class="btn btn-danger" id="hide-listings" type="button" value="Hide Listings">
            </div>
         

        <form>
          <div class="form-group">
              <label >Select Convernrate </label>
         <select class="form-control search"  name="parent" id="parent">
              <option value=""<?php echo (($parent == '')?' selected' : ''); ?>>..........</option>
                 <?php foreach($rows as $row) { ?>
              
            
                <option value="<?php echo  $row['id']; ?>"<?php echo (($parent == $row['id'])?' selected' : ''); ?>><?php echo  $row['name']; ?></option>
            
                   <?php   }  ?>
                  
         </select>
          </div>
          
          <div class="form-group">
              <label >Select City</label>
         <select class="form-control search"  name="child" id="child"></select>
            </div>
            
         <div class="form-group">
             <label >Select Medcine </label>
      <select class="form-control search" name="medcine" id="medcine">
      </select>
            </div>
         


    <input type="submit" class="btn btn-primary"value="Show Results">


        </form>
      </div>
          
    <div  id="map"></div>

</div>

        <?php
        $stmt = $con->prepare("SELECT * FROM country");

        // Execute The Statement

        $stmt->execute();

        // Assign To Variable

        $rows = $stmt->fetchAll();  ?>
      
    <script>
      var map;

      // Create a new blank array for all the listing markers.
      var markers = [];

      function initMap() {

          var styles = [
          {
            featureType: 'water',
            stylers: [
              { color: '#19a0d8' }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.stroke',
            stylers: [
              { color: '#ffffff' },
              { weight: 6 }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.fill',
            stylers: [
              { color: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -40 }
            ]
          },{
            featureType: 'transit.station',
            stylers: [
              { weight: 9 },
              { hue: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'labels.icon',
            stylers: [
              { visibility: 'off' }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
              { lightness: 100 }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
              { lightness: -100 }
            ]
          },{
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [
              { visibility: 'on' },
              { color: '#f0e4d3' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.fill',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -25 }
            ]
          }
        ];

        // Constructor creates a new map - only center and zoom are required.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.7413549, lng: -73.9980244},
          zoom: 13 ,
          styles: styles

        });

        // These are the real estate listings that will be shown to the user.
        // Normally we'd have these in a database instead.
        var locations = [

         <?php foreach($rows as $row) { ?>
               
               {title: <?php echo "'".$row['title']."'"; ?>, location: {lat: <?php echo $row['lat']; ?>, lng: <?php echo $row['lng']; ?> } },
          <?php } ?>
             
         
      
        ];

          var largeInfowindow = new google.maps.InfoWindow();

        // Style the markers a bit. This will be our listing marker icon.
        var defaultIcon = makeMarkerIcon('0091ff');

        // Create a "highlighted location" marker color for when the user
        // mouses over the marker.
        var highlightedIcon = makeMarkerIcon('FFFF24');

        var largeInfowindow = new google.maps.InfoWindow();
        // The following group uses the location array to create an array of markers on initialize.
        for (var i = 0; i < locations.length; i++) {
          // Get the position from the location array.
          var position = locations[i].location;
          var title = locations[i].title;
          // Create a marker per location, and put into markers array.
          var marker = new google.maps.Marker({
            position: position,
            title: title,
            animation: google.maps.Animation.DROP,
            icon: defaultIcon,
            id: i
          });
          // Push the marker to our array of markers.
          markers.push(marker);
          // Create an onclick event to open the large infowindow at each marker.
          marker.addListener('click', function() {
            populateInfoWindow(this, largeInfowindow);
          });
          // Two event listeners - one for mouseover, one for mouseout,
          // to change the colors back and forth.
          marker.addListener('mouseover', function() {
            this.setIcon(highlightedIcon);
          });
          marker.addListener('mouseout', function() {
            this.setIcon(defaultIcon);
          });
        }

        document.getElementById('show-listings').addEventListener('click', showListings);
        document.getElementById('hide-listings').addEventListener('click', hideListings);
      }

      // This function populates the infowindow when the marker is clicked. We'll only allow
      // one infowindow which will open at the marker that is clicked, and populate based
      // on that markers position.
      function populateInfoWindow(marker, infowindow) {
        // Check to make sure the infowindow is not already opened on this marker.
        if (infowindow.marker != marker) {
          infowindow.marker = marker;
          infowindow.setContent('<div>' + marker.title + '</div>');
          infowindow.open(map, marker);
          // Make sure the marker property is cleared if the infowindow is closed.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
        }
      }

      // This function will loop through the markers array and display them all.
      function showListings() {
        var bounds = new google.maps.LatLngBounds();
        // Extend the boundaries of the map for each marker and display the marker
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
          bounds.extend(markers[i].position);
        }
        map.fitBounds(bounds);
      }

      // This function will loop through the listings and hide them all.
      function hideListings() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
      }

      // This function takes in a COLOR, and then creates a new marker
      // icon of that color. The icon will be 21 px wide by 34 high, have an origin
      // of 0, 0 and be anchored at 10, 34).
      function makeMarkerIcon(markerColor) {
        var markerImage = new google.maps.MarkerImage(
          'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|'+ markerColor +
          '|40|_|%E2%80%A2',
          new google.maps.Size(21, 34),
          new google.maps.Point(0, 0),
          new google.maps.Point(10, 34),
          new google.maps.Size(21,34));
        return markerImage;
      }

    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkllF-ZrsAcZKwkMua_KdmlLJunCyfZI
&v=3&callback=initMap">
    </script>


    <?php

include $tpl . 'footer.php';



	ob_end_flush();

	?>

