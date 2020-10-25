<!DOCTYPE html>
<html>
<head>
	<title></title>
	
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDbkllF-ZrsAcZKwkMua_KdmlLJunCyfZI"></script>
   <script type="text/javascript">
   var markers = [
    
            {
               "title": 'Alibaug',
               "lat": '18.641400',
               "lng": '72.872200',
               "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
           }
    
       ,
    
            {
               "title": 'Mumbai',
               "lat": '18.964700',
               "lng": '72.825800',
               "description": 'Mumbai formerly Bombay, is the capital city of the Indian state of Maharashtra.'
           }
    
       ,
    
            {
               "title": 'Pune',
               "lat": '18.523600',
               "lng": '73.847800',
               "description": 'Pune is the seventh largest metropolis in India, the second largest in the state of Maharashtra after Mumbai.'
           }
    
   ];
   </script>
   <script type="text/javascript">
 
       window.onload = function () {
           var mapOptions = {
               center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
               zoom: 8,
               mapTypeId: google.maps.MapTypeId.ROADMAP
           };
           var path = new google.maps.MVCArray();
           var service = new google.maps.DirectionsService();
 
           var infoWindow = new google.maps.InfoWindow();
           var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
           var poly = new google.maps.Polyline({ map: map, strokeColor: '#FF8200' });
           var lat_lng = new Array();
           for (i = 0; i < markers.length; i++) {
               var data = markers[i]
               var myLatlng = new google.maps.LatLng(data.lat, data.lng);
               lat_lng.push(myLatlng);
               var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title: data.title
               });
               (function (marker, data) {
                   google.maps.event.addListener(marker, "click", function (e) {
                       infoWindow.setContent(data.description);
                       infoWindow.open(map, marker);
                   });
               })(marker, data);
           }
           for (var i = 0; i < lat_lng.length; i++) {
               if ((i + 1) < lat_lng.length) {
                   var src = lat_lng[i];
                   var des = lat_lng[i + 1];
                   path.push(src);
                   poly.setPath(path);
                   service.route({
                       origin: src,
                       destination: des,
                       travelMode: google.maps.DirectionsTravelMode.DRIVING
                   }, function (result, status) {
                       if (status == google.maps.DirectionsStatus.OK) {
                           for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                               path.push(result.routes[0].overview_path[i]);
                           }
                       }
                   });
               }
           }
       }
   </script>
</head>
<body>




   <div id="dvMap" style="width: 500px; height: 500px">
   </div>

</body>
</html>