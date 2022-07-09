<script type="text/javascript">
    function myMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 24.953426668512783,
                lng: 67.00400814243413,
            },
            zoom: 13,
        });

        var input = document.getElementById("mymap");
        autocomplete = new google.maps.places.Autocomplete(input);
        searchBox = new google.maps.places.SearchBox(input);

        autocomplete.setFields(["address_components"]);

        autocomplete.addListener("places_changed", function() {
            var place = autocomplete.getPlace();
            let result = place.address_components.map((a) => a.long_name);
        });

        searchBox.addListener("places_changed", function() {
            var places = searchBox.getPlaces();
            $("#longitude").val(places[0].geometry.location.lng().toFixed(6));
            $("#latitude").val(places[0].geometry.location.lat().toFixed(6));

            if (places.length == 0) {
                return;
            }
            getCity(places[0].geometry.location.lat(), places[0].geometry.location.lng());

            var myCenter = new google.maps.LatLng(places[0].geometry.location.lat(), places[0].geometry.location
                .lng());
            var mapOptions = {
                center: myCenter,
                zoom: 15,
            };

            var mapCanvas = document.getElementById("map");
            var map2 = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map2);

            $(document).ready(function() {
                google.maps.event.addListener(map2, "click", function(event) {
                    marker.setPosition(event.latLng);
                    getAddress(event.latLng.lat(), event.latLng.lng());
                    $("#longitude").val(event.latLng.lng().toFixed(6)).trigger("change");
                    $("#latitude").val(event.latLng.lat().toFixed(6)).trigger("change");
                });
            });
        });
    }

    function getAddress(lat, long) {
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long +
                "&sensor=false&key=AIzaSyBhK5wyrSAB8g_bMzPOFa7ZpLsvlFgaVPQ",
            success: function(data) {
               if(data.status =='REQUEST_DENIED'){
                   return false;
               }
                $("#mymap").val(data.results[0].formatted_address);
                getCity(lat, long);
            },
        });
    }

    function getLocation() {
        let latitude;
        let longitude;
        if ($('#latitude').val() == null && $('#longitude').val() == null) {
            navigator.geolocation.getCurrentPosition(function(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
            });
        } else {
            latitude = $('#latitude').val();
            longitude = $('#longitude').val();
        }

        getAddress(latitude, longitude);
        var myCenter = new google.maps.LatLng(latitude, longitude);

        var mapOptions = {
            center: myCenter,
            zoom: 13,
        };

        var mapCanvas = document.getElementById("map");
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
        });


        marker.setMap(map);

        $(document).ready(function() {
            google.maps.event.addListener(map, "click", function(event) {
                marker.setPosition(event.latLng);
                getAddress(event.latLng.lat(), event.latLng.lng());
                $('#longitude').val(event.latLng.lng().toFixed(6));
                $('#latitude').val(event.latLng.lat().toFixed(6));
                getCity(event.latLng.lat(), event.latLng.lng());
            });
        });


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        // getAddress(position.coords.latitude, position.coords.longitude);
    }

    function getCity(latitude, longitude) {
        var geocoder;
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(latitude, longitude);

        geocoder.geocode({
                'latLng': latlng
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    let state;
                    for (var i = 0; i < results[0].address_components.length; i++) {
                        for (var b = 0; b < results[0].address_components[i].types.length; b++) {

                            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                            if (results[0].address_components[i].types[b] == "administrative_area_level_2") {
                                //this is the object you are looking for
                                city = results[0].address_components[i];
                                break;
                            }
                            if (results[0].address_components[i].types[b] == "country") {
                                //this is the object you are looking for
                                country = results[0].address_components[i];
                                break;
                            }
                            if (results[0].address_components[i].types[b] == "colloquil_area") {
                                //this is the object you are looking for
                                entity = results[0].address_components[i];
                                break;
                            }
                        }
                    }
                    $('#city').val(city.long_name);
                    $('#country').val(country.short_name);
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            }
        );
    }

    // getLocation();
    setTimeout(() => {
        getOnloadLocation();
    }, 3000);



    function getOnloadLocation() {
        let latitude;
        let longitude;
        if ($('#latitude').val() == null && $('#longitude').val() == null) {
            navigator.geolocation.getCurrentPosition(function(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
            });
        } else {
            latitude = $('#latitude').val();
            longitude = $('#longitude').val();
        }

        getAddress(latitude, longitude);
        var myCenter = new google.maps.LatLng(latitude, longitude);

        var mapOptions = {
            center: myCenter,
            zoom: 13,
        };

        var mapCanvas = document.getElementById("map");
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
        });


        marker.setMap(map);

        $(document).ready(function() {
            // click on map and set you marker to that position
            google.maps.event.addListener(map, "click", function(event) {
                marker.setPosition(event.latLng);
                getAddress(event.latLng.lat(), event.latLng.lng());

                $('#longitude').val(event.latLng.lng().toFixed(6));
                $('#latitude').val(event.latLng.lat().toFixed(6));
                getCity(event.latLng.lat(), event.latLng.lng());
            });
        });


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
</script>
<script src="{{ getMapKeyScript() }}"></script>
