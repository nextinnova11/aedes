@include('sider-pejabat-kesihatan')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
          <i class="fa fa-edit"></i> Daftar Perumahan
      </h1>
      <ol class="breadcrumb">
            <li><a href="{{ url('/pejabatKesihatan') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('/daftar-perumahan') }}">Daftar Perumahan</a></li>
            <li class="active">Pendaftaran Taman Perumahan</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <style>
              #map-canvas{
                width: 1015px;
                height: 350px;
              }
            </style>
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADh33xBcs73yi9YzOBY1wpRxZwie1pp6E&libraries=places" type="text/javascript"></script>
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
            <div class="container">
              <div class="col-sm-11">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-search"></i>
                    </div>
                    <input type="text" class="form-control" id="searchmap" name="searchmap">
                  </div>
                  <div id="map-canvas"></div>
                </div>
                @if (count($errors) > 0)
                  @foreach($errors->all() as $error)
                      {{ $error }}<br>
                  @endforeach
                @endif
                <form method="PUT" action= "{{ URL('kemaskini-perumahan-baru', $perumahan1->id) }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label>Nama Perumahan:</label>
                      <input type="text" class="form-control my-colorpicker1" name="name" id="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label>Bandar:</label>
                      <input type="text" class="form-control my-colorpicker1" name="city" id="locality">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label>Negeri:</label>
                      <input type="text" class="form-control my-colorpicker1" name="state" id="administrative_area_level_1" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label>Ketua Lokaliti:</label>
                        <input type="text" readonly value="{{$userperumahan->name}}" class="form-control my-colorpicker1" name="ketua_lokaliti" id="ketua_lokaliti" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
              <script>
              function initialize() {
                var myLatlng = new google.maps.LatLng(2.9351613025933885, 101.69112896915976);

                var mapOptions = {
                  center: myLatlng,
                  zoom: 17
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
                var image = 'http://e-aedes.ml/img/firstaid.png';

                var marker;

                function placeMarker(location) {
                  if ( marker ) {
                    marker.setPosition(location);
                    marker.setIcon(/** @type {google.maps.Icon} */({
                      url: image,
                      size: new google.maps.Size(71, 71),
                      origin: new google.maps.Point(0, 0),
                      anchor: new google.maps.Point(17, 34),
                      scaledSize: new google.maps.Size(35, 35)
                    }));
                  } else {
                    marker = new google.maps.Marker({
                      position: location,
                      map: map,
                      icon: 'http://e-aedes.ml/img/firstaid.png'
                    });
                  }
                }

                google.maps.event.addListener(map, 'click', function(event){
                     //alert('Lat: ' + event.latLng.lat() + ' Lng: ' + event.latLng.lng());
                     placeMarker(event.latLng);
                     jQuery('#lat').val(event.latLng.lat());
                     jQuery('#lng').val(event.latLng.lng());
                });

                var input = (document.getElementById('searchmap'));

                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);

                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                  map: map,
                  anchorPoint: new google.maps.Point(0, -29)
                });

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                  //infowindow.close();
                  marker.setVisible(false);

                  var place = autocomplete.getPlace();
                  if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                  }

                  // If the place has a geometry, then present it on a map.
                  if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                    map.setZoom(17);
                  } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                  }
                  marker.setIcon(/** @type {google.maps.Icon} */({
                    url: image,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                  }));
                  marker.setPosition(place.geometry.location);
                  marker.setVisible(true);

                  jQuery('#lat').val(place.geometry.location.lat());
                  jQuery('#lng').val(place.geometry.location.lng());

                  var componentForm = {
                    locality: 'long_name',
                    administrative_area_level_1: 'short_name'
                  };

                  for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                      var val = place.address_components[i][componentForm[addressType]];
                      document.getElementById(addressType).value = val;
                    }
                   }

                  jQuery('#name').val(place.name);
                });

              }

              google.maps.event.addDomListener(window, 'load', initialize);

              jQuery().ready(function() {

              });
              </script>
            </div>
        </div>
</section>
</div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB. 
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->


    <!-- jQuery 2.1.4 -->
    <script src="{{ url('/eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ url('/eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('/eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/eAedesEx/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/eAedesEx/dist/js/demo.js') }}"></script>
  </body>
</html>
