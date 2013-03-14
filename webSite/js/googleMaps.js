function cargarMapa(){
      if (GBrowserIsCompatible()) {      
	
		var latitud =  7.896871791342333;
    	var longitud =-72.50067695975304;
    	var zoom = 16;	
    		
      	var map = new GMap2(document.getElementById("ContactoMapa"+ventanaN));
    
      	map.setCenter(new GLatLng(latitud, longitud), zoom);          	
 
      	map.addControl(new GLargeMapControl());
      	map.addControl(new GMapTypeControl());
      	map.addControl(new GOverviewMapControl());
 
      	//map.setMapType(G_NORMAL_MAP);
		//map.setMapType(G_SATELLITE_MAP);
		map.setMapType(G_HYBRID_MAP);
   
      	var point = new GPoint (longitud,latitud);
      	//map.openInfoWindow(map.getCenter(),("<img src='http://www.sid.com.co/Imagenes/MapFoto.jpg' />"));
      	var miIcono = new GIcon(G_DEFAULT_ICON);
      	miIcono.iconSize = new GSize(37, 34);
      	miIcono.shadowSize = new GSize(37, 34);
      	miIcono.image = "http://www.sid.com.co/webSite/img/MapaIco.png";
      	var marker = new GMarker(point,miIcono);
      	GEvent.addListener(marker, "click", function() {
        this.openInfoWindowHtml("Calle 1 # 0-51 Lleras Restrepo");
  	});
        map.addOverlay(marker);
      	
      	GEvent.addListener(map, "click", function(marcador, punto) {
  	var nuevoMarcador = new GMarker(punto);
  	GEvent.addListener(nuevoMarcador, "click", function() {
    	this.openInfoWindowHtml("Lat: " + this.getPoint().lat() + "<br/>Lon: " + this.getPoint().lng());
  	});
  	map.addOverlay(nuevoMarcador);
	});
      	
      	
       };
	   
};


 



$(document).ready(function(){
		var api='ABQIAAAAW53Tgb2_aMHy7rnA3XUgJxQYJkyUqNgIyN0IxEuzWjX_yDP_-hQzXPsNhWv5FhjcTrP53xiU4vx-nA';
		$.getScript('http://maps.google.com/maps?file=api&v=2.x&key='+api+'&async=2&callback=cargarMapa');
});