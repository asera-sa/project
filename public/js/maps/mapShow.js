"use strict";

// Class definition
var KTLeaflet = function () {

	var demo5 = function () {
		// Define Map Location
		var leaflet = L.map('kt_leaflet_5', {
			center: [lat, lng],
			zoom: 10
		});

		// Init Leaflet Map
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(leaflet);
		const markerIcon = L.icon({
            iconSize: [25, 41],
            iconAnchor: [10, 41],
            popupAnchor: [2, -40],
            // specify the path here
            iconUrl: "https://unpkg.com/leaflet@1.5.1/dist/images/marker-icon.png",
            shadowUrl: "https://unpkg.com/leaflet@1.5.1/dist/images/marker-shadow.png"
        });

        L.marker(
            [lat, lng],
            {
                draggable: true, // Make the icon dragable
                title: "Hover Text", // Add a title
                opacity: 1,
                icon: markerIcon // here assign the markerIcon var
            } // Adjust the opacity
        )
        .addTo(leaflet)
        .bindPopup("<b></b>")
        .openPopup();
		// Set Geocoding
		var geocodeService;
		if (typeof L.esri.Geocoding === 'undefined') {
			geocodeService = L.esri.geocodeService();
		} else {
			geocodeService = L.esri.Geocoding.geocodeService();
		}

		// Define Marker Layer
		var markerLayer = L.layerGroup().addTo(leaflet);

		// Set Custom SVG icon marker
		var leafletIcon = L.divIcon({
			html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
			bgPos: [10, 10],
			iconAnchor: [20, 37],
			popupAnchor: [0, -37],
			className: 'leaflet-marker'
		});

		// Map onClick Action
		// leaflet.on('click', function (e) {
		// 	geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
		// 		if (error) {
		// 			return;
		// 		}
		// 		markerLayer.clearLayers(); // remove this line to allow multi-markers on click
		// 		L.marker(result.latlng, { icon: leafletIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
		// 		alert(`You've clicked on the following address: ${result.address.Match_addr}`);
		// 		$('#lat').val(result.latlng.lat);
		// 		$('#lng').val(result.latlng.lng);
		// 	});
		// });
	}

	return {
		// public functions
		init: function () {			
			demo5();
		}
	};
	
}();

jQuery(document).ready(function () {
	KTLeaflet.init();
});
