function mapaLeaflet(lat, lon, nombre,map) {
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

$().ready(() => {
    $.ajax({
        method: "POST",
        dataType: "json",
        url: window.location.href.slice(0, window.location.href.lastIndexOf("map")) + 'api/prodsloc',
    }).done((response) => {
        var map = L.map('map').setView([0, 0], 2);
        for (const responseElement of response) {
            console.log(responseElement)
            mapaLeaflet(responseElement.lat, responseElement.lon, responseElement.nombre,map);
        }
    })
});




export function mapaLeafletJustOneProd(lat, lon, nombre) {
    var map = L.map('map').setView([0, 0], 2);
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

