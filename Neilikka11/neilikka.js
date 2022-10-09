function initMap() {
    var dumbo = { lat: 60.17268823320431, lng: 24.948647759569866 };
    var mapOptions = {
        center: dumbo,
        zoom: 10
    };

    var googlemap = new google.maps.Map(document.getElementById("map"), mapOptions);
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(60.17269, 24.94865),
        map: googlemap
    });
}