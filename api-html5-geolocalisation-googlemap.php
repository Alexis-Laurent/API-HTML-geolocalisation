<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset=utf-8>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <title>Les API JavaScript du Html5</title>    
</head>

<body>    
    <div id="map_canvas"></div>
    <div id="localisationinfo"></div>

    <style type="text/css">
        #map_canvas {
            height: 700px;
            width: 900px;}
    </style>

    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(afficher_carte, erreur);
        }
        else {
            alert("Désolé, votre navigateur ne supporte pas la géolocalisation");
        }
        // Success callback function
        function afficher_carte(pos) {
            var latitude = pos.coords.latitude;
            var longitude= pos.coords.longitude;
            var thediv = document.getElementById('localisationinfo');
            thediv.innerHTML = '<p>Votre longitude est <b>' + longitude+ '</b> et votre latitude est <b>' + latitude + '</b></p>';
            var latlng = new google.maps.LatLng(latitude, longitude);
            var myOptions = {
                zoom:  10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.hybrid
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title:"Vous êtes ici"
            });
        }
        function erreur(pos) {
            alert('Localisation error!');
        }
    </script>
</body>
</html>