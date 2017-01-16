@include('sider-admin')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Kawasan
            <small>Senarai Kawasan Berisiko</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/admin'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li>Laporan Kawasan</li>
            <li class="active">Laporan Kawasan Berisiko</li>
          </ol>
        </section>

              <div class="box">
                <div class="box-header">
                  <br>
                  <form class="form-horizontal" method="POST" action= "{{ URL('risiko') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-horizontal" >
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Perumahan</label>
                          <div class="col-sm-10">
                              <input type="text" readonly name="perumahan" class="form-control" value="{{$perumahanrisiko}}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Kawasan Perumahan</label>
                          <div class="col-sm-10">
                            <input type="text" readonly name="kawasan" class="form-control" value="{{$kawasan}}">
                          </div>
                      </div>

                      <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Bil</th>
                              <th>Nama Kawasan Perumahan</th>
                              <th>Risiko</th>
                              <th>Warna</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $counter = 1; ?>
                             @foreach($finalsend as $key => $value)
                            <tr>
                              <td>{{ $counter }}</td>
                              <?php $table = DB::table('kawasans')->where('id', $value->kawasan_id)->first(); ?>
                              <td>{{$table->nama}}</td>
                              <?php if ($value -> status == 'Aktiviti Semburan Selesai')  { ?>
                              <td>Berisiko</td>
                              <?php } else if ($value -> status == 'Selesai')  { ?>
                              <td>Tidak Berisiko</td>
                              <?php } else if ($value -> status == 'Dalam Proses')  { ?>
                                <td>Bancian Belum Selesai</td>
                              <?php } else if ($value -> status == 'Dihantar')  { ?>
                                <td>Tiada Tindakan Daripada Pembanci</td>
                              <?php } else if ($value -> status == 'Aktiviti Penyemburan Diperlukan')  { ?>
                                <td>Aktivit Semburan Sedang Dilakukan</td>
                              <?php } ?>
                              <td style="background:{{$warna}}">&nbsp;</td>
                            </tr>
                            <?php $counter++; ?>
                            @endforeach
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div>
                      <div class="col-md-12">
                  			<div id="map-canvas" style="width:100%; height:500px;"></div>
                  		</div>
                    </div>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB.
      </footer>
    </div>

    <script src="{{ url('eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ url('eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ url('eAedesEx/dist/js/app.min.js') }}"></script>
    <script src="{{ url('eAedesEx/dist/js/demo.js') }}"></script>
    <script src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyADh33xBcs73yi9YzOBY1wpRxZwie1pp6E&libraries=places"  type="text/javascript"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
        $('#perumahan').on('change', function(e){
            var state_id = e.target.value;
            $.get('/dropdownlaporan?perumahan=' + state_id, function(data) {
                $('#kawasan').empty();
                // $('#kawasan').append('<option value="">Sila pilih satu</option>');
                $.each(data, function(index,subcategories){
                    $('#kawasan').append('<option value="' + subcategories.nama +'">' + subcategories.nama + '</option>');
                });
            });
        });
    </script>
    <script type="text/javascript">
      var areamap = new google.maps.LatLng( {!! $final->lat !!} , {!! $final->lng !!} );

      function initialize()
      {
      var mapProp = {
        center:areamap,
        zoom:17,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        };

      var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);

      var areaCircle=new google.maps.Circle({
        center: areamap,
        strokeColor: "<?php echo $warna ?>",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "<?php echo $warna ?>",
        fillOpacity: 0.35,
        // map: map,
        radius: 40
      });
      areaCircle.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </body>
</html>
