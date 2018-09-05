<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
    var markers = new Array();
    	function fnShowmap()
		{
			var mapOptions = {
				center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
				zoom: 10,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("show_map"), mapOptions);
			var infoWindow = new google.maps.InfoWindow();
			var lat_lng = new Array();
			var latlngbounds = new google.maps.LatLngBounds();
			
			for (i = 0; i < markers.length; i++) {
			   var data = markers[i]
			   var myLatlng = new google.maps.LatLng(data.lat, data.lng);
			   lat_lng.push(myLatlng);
			   var marker = new google.maps.Marker({
				   position: myLatlng,
				   map: map,
				   title: data.title
			   });
			   latlngbounds.extend(marker.position);
			   (function (marker, data) {
				   google.maps.event.addListener(marker, "click", function (e) {
					   infoWindow.setContent(data.description);
					   infoWindow.open(map, marker);
				   });
			   })(marker, data);
		   }
		   map.setCenter(latlngbounds.getCenter());
		   map.fitBounds(latlngbounds);
		   //***********ROUTING****************//
		   //Intialize the Path Array
		   var path = new google.maps.MVCArray();
		   //Intialize the Direction Service
		   var service = new google.maps.DirectionsService();
		   //Set the Path Stroke Color
		   var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
		   //Loop and Draw Path Route between the Points on MAP
		   for (var i = 0; i < lat_lng.length; i++) {
			   if ((i + 1) < lat_lng.length) {
				   var des = lat_lng[i];
				   var src = lat_lng[i + 1];
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

<script type="text/javascript">
function fnGetLocation(address)
{
	var geocoder = new google.maps.Geocoder();
	flag = true;
	geocoder.geocode({'address':address},function(results,status){var location = results[0].geometry.location;
		for(var i=0;i<markers.length;i++)
		{
			if((location.lat() == markers[i].lat) && location.lng() == markers[i].lng)
			{
				flag = false;				
			}
		}
		if(flag)
		{
			var objAddr = Object();
			objAddr.title = address;
			objAddr.lat = location.lat();
			objAddr.lng = location.lng();
			objAddr.description = address;
			markers.push(objAddr);
			fnShowmap();
		}
	});
}
</script>
<input type="text" name="location1" id="location1" value="New Jersey Turnpike, Fort Lee, NJ, United States" onblur="fnGetLocation(this.value)" />
<input type="text" name="location2" id="location2" value="Nashville, TN" onblur="fnGetLocation(this.value)" />
<input type="text" name="location3" id="location3" value="California City, CA" onblur="fnGetLocation(this.value)" />
<input type="text" name="location3" id="location3" value="Chicago Union Station, West Jackson Boulevard, Chicago, IL" onblur="fnGetLocation(this.value)" />
<br /><br />
<div id="show_map" style="width:500px;height:500px"></div>