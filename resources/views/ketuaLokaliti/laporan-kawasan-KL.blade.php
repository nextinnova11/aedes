@include('sider-ketua-lokaliti')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Kawasan
            <small>Senarai Kawasan Berisiko</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/ketuaLokaliti'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('/laporan-kawasan-KL')}}">Laporan Kawasan</a></li>
            <li class="active">Laporan Kawasan Berisiko</li>
          </ol>
        </section>

              <div class="box">
                <div class="box-header">
                  <br>
                  <form class="form-horizontal" method="POST" action= "{{ URL('risiko-KL') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-horizontal" >
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Perumahan</label>
                          <div class="col-sm-10">
                            <select class="form-control m-bot15" name="perumahan" id="perumahan" required>

                                <option value=""> Sila Pilih </option>
                                @foreach($lprnperumahan as $key => $lprnperumahan)
                                <option value="{{$lprnperumahan->nama}}"> {{$lprnperumahan->nama}} </option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Kawasan Perumahan</label>
                          <div class="col-sm-10">
                            <select class="form-control m-bot15" name="kawasan" id="kawasan">
                                <option value=""> Kawasan Perumahan </option>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-pencil">Lihat</button>
                        </div>
                      </div>
                    </div>
                  </form>
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

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ url('eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ url('eAedesEx/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ url('eAedesEx/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('eAedesEx/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('eAedesEx/dist/js/demo.js') }}"></script>
    <!-- page script -->
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
  </body>
</html>
