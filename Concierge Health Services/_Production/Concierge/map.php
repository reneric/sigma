<?php  ?>
<script>
function init() {
	var myLatlng = new google.maps.LatLng(30.365766, -91.604004);
	var mapOptions = {
    		zoom: 9,
    		center: myLatlng,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	}
    var locations = [
      		['Concierge Health Services', 30.200780, -92.045567, 'Lafayette'],
      		['Concierge Health Services', 30.426432,   -91.049548, 'Baton Rouge']
    	];

	    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		marker = "";
		infowindow = new google.maps.InfoWindow();
		for (i = 0; i < locations.length; i++) { 
			// alert(locations[i][0])
    		marker = new google.maps.Marker({
            	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            	map: map
        	});
  		}
	    google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				if (infowindow) {
        			infowindow.close();
        		}
    		var content = '<div class="info-content"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">';
        		content += '<h1>'+locations[i][0]+' <span>'+locations[i][3]+'</span></h1></div>';
          		infowindow.setContent(content);
          		infowindow.open(map, marker);
        	}
		}) (marker, cl))
	};
jQuery(function($){
	google.maps.event.addDomListener(window, 'load', init);
})
function showAll(){
	var locations = [
      		['Concierge Health Services', 30.200780, -92.045567, 'Lafayette'],
      		['Concierge Health Services', 30.426432,   -91.049548, 'Baton Rouge']
    	];
	for (i = 0; i < 2; i++) { 
			alert(locations[i][0])
    		marker = new google.maps.Marker({
            	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            	map: map
        	});
  		}
}

</script>