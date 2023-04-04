<!--<!DOCTYPE html>-->
<!--<html>-->
<!--  <head>-->
<!--    <title>Complex Marker Icons</title>-->
<!--    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>-->
<!--    <style type="text/css">-->
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
<!--      #map {-->
<!--        height: 60%;-->
<!--      }-->

      /* Optional: Makes the sample page fill the window. */
<!--      html,-->
<!--      body {-->
<!--        height: 100%;-->
<!--        margin: 0;-->
<!--        padding: 0;-->
<!--      }-->
<!--    </style>-->
<!--    <script>-->
      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.
<!--      function initMap() {-->
<!--        const map = new google.maps.Map(document.getElementById("map"), {-->
<!--          zoom: 10,-->
<!--          center: { lat: -33.9, lng: 151.2 },-->
<!--        });-->
<!--        setMarkers(map);-->
<!--      }-->
      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
<!--      const beaches = [-->
<!--        ["Bondi Beach My self Sourabh kumar", -33.890542, 151.274856, 4,'http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png', ''],-->
<!--        ["Coogee Beach My self Sourabh kumar", -33.923036, 151.259052, 5,'http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png', ''],-->
<!--        ["Cronulla Beach My self Sourabh kumar", -34.028249, 151.157507, 3,'http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png', ''],-->
<!--        ["Manly Beach My self Sourabh kumar", -33.80010128657071, 151.28747820854187, 2,'http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png', ''],-->
<!--        ["Maroubra Beach My self Sourabh kumar", -33.950198, 151.259302, 1,'http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png', ''],-->
<!--      ];-->

<!--      function setMarkers(map) {-->
        // Adds markers to the map.
        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.
        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
<!--        const image = {-->
<!--          url:-->
<!--            "http://biharshadi.com/images/IMG_1073.JPG",-->
          // This marker is 20 pixels wide by 32 pixels high.
<!--          size: new google.maps.Size(50, 50),-->
          // The origin for this image is (0, 0).
<!--          origin: new google.maps.Point(0, 0),-->
          // The anchor for this image is the base of the flagpole at (0, 32).
<!--          anchor: new google.maps.Point(0, 50),-->
<!--        };-->
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
<!--        const shape = {-->
<!--          coords: [1, 1, 1, 20, 18, 20, 18, 1],-->
<!--          type: "poly",-->
<!--        };-->

<!--        for (let i = 0; i < beaches.length; i++) {-->
<!--          const beach = beaches[i];-->
<!--          new google.maps.Marker({-->
<!--            position: { lat: beach[1], lng: beach[2] },-->
<!--            map,-->
            
<!--            shape: shape,-->
<!--            title: beach[0],-->
<!--            zIndex: beach[3],-->
<!--          });-->
<!--        }-->
<!--      }-->
<!--    </script>-->
<!--  </head>-->
<!--  <body>-->
<!--    <div id="map"></div>-->

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!--    <script-->
<!--      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJO3mTh1TnE5Fqc6y14mngUiGI_E5ggXY&callback=initMap&libraries=&v=weekly"-->
<!--      async-->
<!--    ></script>-->
<!--  </body>-->
<!--</html>-->
<!--<!DOCTYPE html>-->
<!--    <html>-->
<!--      <head>-->
<!--        <title>test sandbox 8</title>-->

<!--        <style type="text/css">-->
<!--          #main {-->
<!--            margin: 60px 15px; -->
<!--          }-->
<!--          #map { -->
<!--            min-height: 600px; -->
<!--            min-width: 800px; -->
<!--          }-->
<!--        </style>-->

<!--            <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>-->
<!--        <script>-->
          // code to draw map
<!--          var map;-->
<!--          var col = '#FF0000';-->
<!--          var link ;-->
<!--          var latLng;-->
<!--          var polypoints;-->

<!--          function initialize() {-->
<!--var locations_programs = [-->
<!--   ['Christie Lake Camp', 44.803033, -76.418031, 1, 'http://www.christielakekids.com/_images/map_pins/events/dempsey-community-centre.png', ''],    -->
<!--   ['Caldwell Community Centre', 45.373083, -75.735550, 1, 'http://www.christielakekids.com/_images/map_pins/events/caldwell-community-centre.png', ''],    -->
<!--   ['Dempsey Community Centre', 45.401887, -75.627530, 1, 'http://www.christielakekids.com/_images/map_pins/events/dempsey-community-centre.png', ''],    -->
<!--   ['Brewer Arena', 45.389560, -75.691445, 1, 'http://www.christielakekids.com/_images/map_pins/events/dempsey-community-centre.png', '']-->

<!--];-->

<!--var markersArray = [];-->
<!--var markers = {};-->
<!--var mapOptions = {-->

<!--    center: new google.maps.LatLng(45.4214, -75.6919),-->
<!--    zoom: 10,-->
<!--    scrollwheel: true,-->
<!--    scaleControl: true,-->
<!--    mapTypeId: google.maps.MapTypeId.ROADMAP,-->
<!--    zoomControl: true,-->
<!--    zoomControlOptions: {-->
<!--        style: google.maps.ZoomControlStyle.LARGE,-->
<!--        position: google.maps.ControlPosition.RIGHT_TOP-->
<!--      },-->
<!--    panControl: true,-->
<!--        panControlOptions: {-->
<!--        position: google.maps.ControlPosition.TOP_RIGHT-->
<!--      }-->
<!--  };-->

<!--  map = new google.maps.Map(document.getElementById('map'),-->
<!--  mapOptions);-->


 //***  PROGRAMS

<!--  var marker, i;-->
<!--  var id = 'programs';-->

<!--  for (i = 0; i < locations_programs.length; i++) {  -->
<!--    var id = 'programs' + i;-->

<!--    marker = new google.maps.Marker({-->
<!--      position: new google.maps.LatLng(locations_programs[i][1], locations_programs[i][2]),-->
<!--      map: map-->
<!--      ,id: id-->
<!--      ,icon: 'http://www.christielakekids.com/_images/new/blue_circle.png'-->
<!--      ,url: locations_programs[i][5]-->
<!--      ,zIndex:100-->
<!--    });-->



<!--      google.maps.event.addListener(marker, 'mouseover', function(event) {-->
<!--          this.setIcon('http://www.christielakekids.com/_images/map_pins/events/canoe-for-kids.png');-->
<!--      });-->
<!--      google.maps.event.addListener(marker, 'mouseout', function(event) {-->
<!--          this.setIcon('http://www.christielakekids.com/_images/map_pins/events/dempsey-community-centre.png');-->
<!--      });-->



<!--  }-->
<!--}-->
<!--  google.maps.event.addDomListener(window, 'load', initialize); -->
<!--        </script>-->
<!--      </head>-->
<!--      <body>-->
<!--             <div id="map"></div>-->
<!--       </body>-->
<!--    </html>-->

<!DOCTYPE html>
<html>
  <head>
    <title>Info Windows</title>
      <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mapCanvas {
    width: 100%;
    height: 100%;
}
    </style>
    
  </head>
  <body>
    <!--<div id="map"></div>-->
<div id="mapCanvas"></div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        ['Brooklyn Museum, NY', 40.671531, -73.963588],
        ['Brooklyn Public Library, NY', 40.672587, -73.968146],
        ['Prospect Park Zoo, NY', 40.665588, -73.965336]
    ];
                        
    // Info window content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Brooklyn Museum</h3>' +
        '<img src="http://biharshadi.com/images/IMG_1073.JPG" style="height:100px;width:200px;">' +
        '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
        ['<div class="info_content">' +
        '<h3>Brooklyn Public Library</h3>' +
         '<img src="http://biharshadi.com/images/IMG_1073.JPG" style="height:100px;width:200px;">' +
      
        '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Prospect Park Zoo</h3>' +
         '<img src="http://biharshadi.com/images/IMG_1073.JPG" style="height:100px;width:200px;">' +
      
        '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
        '</div>']
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
<!--  <script>-->
<!--// //   const beaches = [-->-->
// <!--        ["Bondi Beach My self Sourabh kumar", -33.890542, 151.274856, 4],-->
// <!--        ["Coogee Beach My self Sourabh kumar", -33.923036, 151.259052, 5],-->
// <!--        ["Cronulla Beach My self Sourabh kumar", -34.028249, 151.157507, 3],-->
// <!--        ["Manly Beach My self Sourabh kumar", -33.80010128657071, 151.28747820854187, 2],-->
// <!--        ["Maroubra Beach My self Sourabh kumar", -33.950198, 151.259302, 1],-->
// <!--      ]
      // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.
<!--      function initMap() {-->
<!--        const uluru = { lat: -25.363, lng: 131.044 };-->
<!--        const map = new google.maps.Map(document.getElementById("map"), {-->
<!--          zoom: 4,-->
<!--          center: uluru,-->
<!--        });-->
<!--        const contentString =-->
<!--          '<div id="content">' +-->
<!--          '<div id="siteNotice">' +-->
<!--          "</div>" +-->
<!--          '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +-->
<!--           '<img src="http://biharshadi.com/images/IMG_1073.JPG" style="height:100px;width:200px;">Uluru</h1>' +-->
<!--          '<div id="bodyContent">' +-->
<!--          "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +-->
<!--          "sandstone rock formation in the southern part of the " +-->
<!--          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +-->
<!--          "south west of the nearest large town, Alice Springs; 450&#160;km " +-->
<!--          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +-->
<!--          "features of the Uluru - Kata Tjuta National Park. Uluru is " +-->
<!--          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +-->
<!--          "Aboriginal people of the area. It has many springs, waterholes, " +-->
<!--          "rock caves and ancient paintings. Uluru is listed as a World " +-->
<!--          "Heritage Site.</p>" +-->
<!--          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +-->
<!--          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +-->
<!--          "(last visited June 22, 2009).</p>" +-->
<!--          "</div>" +-->
<!--          "</div>";-->
<!--        const infowindow = new google.maps.InfoWindow({-->
<!--          content: contentString,-->
<!--        });-->
<!--        const marker = new google.maps.Marker({-->
<!--          position: uluru,-->
<!--          map,-->
<!--          title: "Uluru (Ayers Rock)",-->
<!--        });-->
<!--        marker.addListener("click", () => {-->
<!--          infowindow.open(map, marker);-->
<!--        });-->
<!--      }-->
<!--    </script>-->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJO3mTh1TnE5Fqc6y14mngUiGI_E5ggXY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>
