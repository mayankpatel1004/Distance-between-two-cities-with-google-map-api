<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http:// 
www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/ 

    <title>LearningDocument</title> 
   <script src="http://maps.google.com/maps?file=api&v=1&key=ABQIAAAAmDMj-UMWVxR15ZMvZ_KwUhT2yXp_ZAY8_ufC3CFXhHIE1NvwkxR6fSKWJHlyfoaTiywcPReSLeFDfg" type="text/javascript">
</script>
    <script type="text/javascript"> 
        function load() { 
        if (GBrowserIsCompatible()){ 
        var map = new GMap2(document.getElementById("map")); 
        map.setCenter(new GLatLng(37.4419, -122.1219), 13); 
        var map2 = new GMap2(document.getElementById("map2")); 
        map.setCenter(new GLatLng(37, -122), 5); 
        } 
        } 
        </script> 
        </head> 
        <body onload="load()" onunload="GUnload()"> 
                <div id="map" style="width: 500px; height: 300px"></div> 
                <div id="map2" style="width: 700px; height: 300px"></div> 
        </body> 
        </html> 