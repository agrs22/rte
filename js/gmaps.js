<script>
      var ar = <?php if (isset($result)) { echo json_encode($result);} else { echo '[]';} ?>;
	  console.log(ar)
	  var results = JSON.parse(ar);
	  console.log(results)
	  var infowindow = null;
	  
	  
      function initMap() {
        // Styles a map in night mode.

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 31.8667, lng: -116.595},
          zoom: 13,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
		navigator.geolocation.getCurrentPosition(function(position) {
		if(position.coords.latitude != null) {
		var mylatlon = {lat: position.coords.latitude, lng: position.coords.longitude};
		var mylocmarker = new google.maps.Marker({
					position: mylatlon,
					map: map,
					title: 'Mi Ubicacion',
					html: '<h3>Aqui estas tu</h3>'
					})
		var contentString = "Some content";

            google.maps.event.addListener(mylocmarker, "click", function () {
                infowindow.setContent(mylocmarker.html);
                infowindow.open(map, mylocmarker);
			})
		var destlatlon = {lat:results[1],lng: results[2]};
		var destlocmarker = new google.maps.Marker({
					position: destlatlon,
					map: map,
					title: 'Destino',
					html: '<h3>Destino</h3>'
					})
		var contentString = "Some content";

            google.maps.event.addListener(destlocmarker, "click", function () {
                infowindow.setContent(destlocmarker.html);
                infowindow.open(map, destlocmarker);
			})
	
	  }})
		
		
		
			

		for (var i = 0; i < Object.keys(results[0]).length; i++) {
			for (var j = 0; j < Object.keys(results[0][i].Ubicaciones).length; j++) {
				
				  
				  var coords = results[0][i].Ubicaciones[j];
				  var latLng = new google.maps.LatLng((coords.lat+(i/100000)),(coords.lon+(i/100000)));
				  infowindow = new google.maps.InfoWindow({content: "holding..."});
				  console.log(results[0][i].Empresa)
				  if (results[0][i].Empresa == 'El Vigía') {
						this.iconurl = new google.maps.MarkerImage('img/marker/v.png', null, null, null, new google.maps.Size(40,68));
					};
				  if (results[0][i].Empresa == 'Transporte Brisa') {
						this.iconurl = new google.maps.MarkerImage('img/marker/b.png', null, null, null, new google.maps.Size(40,68));
					};
				  if (results[0][i].Empresa == 'Transporte Blanco Rojo') {
						this.iconurl = new google.maps.MarkerImage('img/marker/rb.png', null, null, null, new google.maps.Size(40,68));
					};
				  var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: results[0][i].Empresa,
					icon: this.iconurl,
					html: '<div id="content"><div id="siteNotice"></div><h3 id="firstHeading" class="firstHeading">'+results[0][i].Empresa+'</h3><div id="bodyContent"><h4>'+results[0][i].Ruta+'</h4><a href="https://www.google.com/maps/dir/Current+Location/'+(coords.lat+(i/100000))+','+(coords.lon+(i/100000))+'" target="_blank"><h6>Como llegar aqui</h6></a></div></div>'
					})
				var contentString = "Some content";

            google.maps.event.addListener(marker, "click", function () {
                infowindow.setContent(this.html);
                infowindow.open(map, this);
            });
		
		
		}}
		
      }
 </script>