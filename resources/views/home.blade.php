@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <div id="map"></div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('calculate.route') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="start" class="form-label">Start Location</label>
                        <input type="text" id="start" name="start" class="form-control" placeholder="Enter the starting point" value="{{ old('start', $start ?? '') }}" oninput="fetchLocationSuggestions('start')">
                        <ul id="start-suggestions" class="list-group"></ul>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End Location</label>
                        <input type="text" id="end" name="end" class="form-control" placeholder="Enter the destination" value="{{ old('end', $end ?? '') }}" oninput="fetchLocationSuggestions('end')">
                        <ul id="end-suggestions" class="list-group"></ul>
                    </div>
                    <div class="mb-3">
                        <label for="mode" class="form-label">Transportation</label>
                        <select id="mode" name="mode" class="form-select">
                            <option value="driving-car" {{ old('mode', $mode ?? '') == 'driving-car' ? 'selected' : '' }}> Driving-Car</option>
                            <option value="cycling-regular" {{ old('mode', $mode ?? '') == 'cycling-regular' ? 'selected' : '' }}>Cycling</option>
                            <option value="foot-walking" {{ old('mode', $mode ?? '') == 'foot-walking' ? 'selected' : '' }}>Foot-Walking</option>
                            <option value="driving-hgv" {{ old('mode', $mode ?? '') == 'driving-hgv' ? 'selected' : '' }}>Train</option>
                            <option value="wheelchair" {{ old('mode', $mode ?? '') == 'wheelchair' ? 'selected' : '' }}>wheel chair</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning mb-3">Get Route</button>
                    <a href="{{ url('/home') }}" class="btn btn-secondary mb-3">reload</a>
                </form>
                @if (isset($route))
                    <div id="route-info" class="alert alert-info">
                        Mode: {{ $mode }}<br>
                        Distance: {{ number_format($route['features'][0]['properties']['segments'][0]['distance'] / 1000, 2) }} KM<br>
                        Duration: {{ number_format($route['features'][0]['properties']['segments'][0]['duration'] / 60, 2) }} Second<br>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-6.4175, 107.7500], 13); // Koordinat Subang

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    @if (isset($startCoords) && isset($endCoords))
        var startCoords = [{{ $startCoords[0] }}, {{ $startCoords[1] }}];
        var endCoords = [{{ $endCoords[0] }}, {{ $endCoords[1] }}];

        var startMarker = L.marker(startCoords).addTo(map).bindPopup('Mulai').openPopup();
        var endMarker = L.marker(endCoords).addTo(map).bindPopup('Akhir').openPopup();

        var route = @json($route['features'][0]['geometry']['coordinates']);
        var routeLatLng = route.map(function(coord) {
            return [coord[1], coord[0]];
        });

        var polyline = L.polyline(routeLatLng, { color: 'green' }).addTo(map);
        map.fitBounds(polyline.getBounds());
    @endif

    function fetchLocationSuggestions(inputId) {
        var query = document.getElementById(inputId).value;
        if (query.length > 2) {
            fetch(`{{ route('location.suggestions') }}?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    var suggestionsList = document.getElementById(`${inputId}-suggestions`);
                    suggestionsList.innerHTML = '';
                    data.forEach(location => {
                        var listItem = document.createElement('li');
                        listItem.className = 'list-group-item list-group-item-action';
                        listItem.textContent = location.display_name;
                        listItem.onclick = () => {
                            document.getElementById(inputId).value = location.display_name;
                            suggestionsList.innerHTML = '';
                        };
                        suggestionsList.appendChild(listItem);
                    });
                });
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
