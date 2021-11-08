<!DOCTYPE html>
<html>
<head>
	<tittle> web geojson </tittle>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <style type="text/css">
   	#mapid {height: 180vh;}
   </style>
</head>
<body>
	<div id="mapid"></div>

</body>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

   <script src="assets/js/leaflet.ajax.js"></script>
   <script src="assets/js/leaflet-search.src.js"></script>

   <script type="text/javascript">
   	var mymap = L.map('mapid').setView([-5.4257019, 105.2700076], 13);
      
   	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
}).addTo(mymap);

    var marker = L.marker([-5.4257019, 105.2700076]).bindPopup("<b>Rumah Saya</b>").addTo(mymap);

    var myStyle = {
      "color": "#ff7800",
      "weight": 0.1,
      "opacity": 0.1
    };


function popUp(f,l){
    var out = [];
    if (f.properties){
      // for(key in f.properties){
        // console.log(key);

       //}

        out.push("namobj:"+f.properties['NAMOBJ']);
        l.bindPopup(out.join("<br />"));
    }
}
var jsonTest = new L.GeoJSON.AJAX(["assets/geojson/bl.geojson"],{onEachFeature:popUp,style: myStyle}).addTo(mymap);

   </script>
</html>