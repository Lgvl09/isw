
// Creating map options
var mapOptions = {
    center: [19.50066, -99.13977], //19.50393, -99.13848
    zoom: 16
}

// Creating a map object
var map = new L.map('map', mapOptions);

// Creating a Layer object
var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

// Adding layer to the map
map.addLayer(layer);


let marker = L.marker([19.50066, -99.13977]).addTo(map);
document.getElementById('latitud').value = 19.50066;
document.getElementById('longitud').value = -99.13977;


map.on('click', (event) => {
    if (marker !== null) {
        map.removeLayer(marker);
    }
    marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);

    // Estos dos muestran las coordenadas, en el html incluir un textfield que no se pueda modificar
    document.getElementById('latitud').value = event.latlng.lat;
    document.getElementById('longitud').value = event.latlng.lng;
})
