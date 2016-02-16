function initMap() {
  var map = new google.maps.Map(document.getElementById('map-container'), {
    center: {lat: 53.424667, lng: 14.5234625},
    zoom: 14,
    //disableDefaultUI:true,
    mapTypeControl: false,
    scrollwheel: false
  });

  var marker = new google.maps.Marker({
  	position:{lat: 53.424667, lng: 14.5234625},
  	map: map,
  	icon:'http://azsrugby.zut.edu.pl/pliki/rugbyfield.png'

  });

  var styles = [{
  	featureType: 'all',
  	elementType: 'labels',
  	stylers:[{
  		visibility: 'on'
  	}]
  }, {
  	featureType: 'water',
  	elementType: 'geometry',
  	stylers: [{color: '#2b2b2b'}]
 }, {
  	featureType: 'water',
  	elementType: 'labels.text',
  	stylers: [{color: '#ffffff'},{weight: 0.8}]
  }, {
  	featureType: 'landscape',
  	elementType: 'geometry',
  	stylers: [{color: '#424242'}]
}, {
  	featureType: 'poi',
  	elementType: 'geometry',
  	stylers: [{color: '#353535'}]

}, {
  	featureType: 'poi',
  	elementType: 'labels.text',
  	stylers: [{color: '#ffffff'},{weight: 0.5}]
}, {
  	featureType: 'transit',
  	elementType: 'geometry',
  	stylers: [{color: '#303030'}]
}, {
  	featureType: 'road.highway',
  	elementType: 'geometry',
  	stylers: [{color: '#484848'}]
}, {
  	featureType: 'road.highway',
  	elementType: 'labels.text',
  	stylers: [{color: '#ffffff'},{weight: 0.6 }]
}, {
  	featureType: 'road.highway',
  	elementType: 'labels.icon',
  	stylers: [{visibility: 'off'  }]
}, {
  	featureType: 'road.arterial',
  	elementType: 'geometry',
  	stylers: [{color: '#2e2e2e'}]
}, {
  	featureType: 'road.arterial',
  	elementType: 'labels.text',
  	stylers: [{color: '#ffffff'},{weight: 0.4 }]
}, {
  	featureType: 'road.arterial',
  	elementType: 'labels.icon',
  	stylers: [{visibility: 'off'  }]
}, {
  	featureType: 'road.local',
  	elementType: 'geometry',
  	stylers: [{color: '#282828'}]
}, {
  	featureType: 'road.local',
  	elementType: 'labels.text',
  	stylers: [{color: '#ffffff'},{weight: 0.2 }]

}, {
  	featureType: 'administrative.country',
  	elementType: 'labels',
  	stylers: [{color: '#a7a7a7'},{
  				Weight:	0.5}]
}, {
  	featureType: 'administrative.province',
  	elementType: 'labels',
  	stylers: [{color: '#a7a7a7'},{
  				Weight:	0.5}]
}, {
  	featureType: 'administrative.locality',
  	elementType: 'labels',
  	stylers: [{color: '#a7a7a7'},{
  				Weight:	0.5}]
}, {
  	featureType: 'administrative.neighborhood',
  	elementType: 'labels',
  	stylers: [{color: '#a7a7a7'},{
  				Weight:	0.5}]
}, {
  	featureType: 'administrative.land_parcel',
  	elementType: 'labels',
  	stylers: [{color: '#a7a7a7'},{
  				Weight:	0.5}]


  }];
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});
  	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
}
