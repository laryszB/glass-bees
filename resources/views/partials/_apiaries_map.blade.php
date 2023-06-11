<div id="map" class="mb-4 z-10" style="height: 400px;"></div>

<script>
    // Initialize the map with scrollWheelZoom disabled
    var map = L.map('map', {
        scrollWheelZoom: false
    }).setView([51.505, -0.09], 13);

    // Set the map layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Create a custom icon
    var customIcon = L.icon({
        iconUrl: '{{asset('images/apiary_map_pin.png')}}',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    // Empty bounds array
    var bounds = [];

    // Add apiaries markers to the map with the custom icon
    @foreach($allApiaries as $apiary)
    @if($apiary->latitude && $apiary->longitude)
    var marker = L.marker([{{ $apiary->latitude }}, {{ $apiary->longitude }}], {icon: customIcon}).addTo(map)
        .bindPopup("<b>{{ $apiary->name }}</b><br>{{ $apiary->street_name }} {{ $apiary->street_number }}, {{ $apiary->city }}" +
            "<br><a href='{{route('apiaries_show', ['apiary' => $apiary])}}' class='inline-block px-4 py-2 mt-2 text-white bg-amber-700 rounded hover:bg-amber-500' style='color: white !important;'>Przejdź do pasieki</a>")
        .openPopup();
    bounds.push(marker.getLatLng());
    @endif
    @endforeach

    // Fit the map to the bounds
    if(bounds.length > 0) {
        map.fitBounds(bounds);
    } else {
        // If there are no markers, set a default view
        map.setView([51.505, -0.09], 13);
    }

    // Enable scrollWheelZoom when the map is focused
    map.on('focus', function() {
        map.scrollWheelZoom.enable();
    });

    // Disable scrollWheelZoom when the map loses focus
    map.on('blur', function() {
        map.scrollWheelZoom.disable();
    });
</script>
