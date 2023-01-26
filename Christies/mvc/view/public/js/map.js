export function mapaLeaflet(lat, lon, nombre) {
    var map = L.map('map').setView([lat, lon], 13);

    var marker = L.marker([lat, lon]).addTo(map);

    marker.bindPopup("<b>'" + nombre + "'</b>").openPopup();

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);
}

