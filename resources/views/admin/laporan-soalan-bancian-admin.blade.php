@include('sider-admin')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Soalan Bancian
            <small>Senarai Soalan Bancian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/admin'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li>Laporan Soalan Bancian</li>
            <li class="active">Laporan Soalan Bancian</li>
          </ol>
        </section>

              <div class="box">
                <div class="box-header">
                  <br>
                  <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Kawasan Perumahan</label>
                      <div class="col-sm-10">
                        <input type="text" readonly name="kawasan" class="form-control" value="{{$kawasan}}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Tarikh Bancian</label>
                      <div class="col-sm-10">
                        <input type="text" readonly name="tahun" class="form-control" value="{{$tahun}}">
                      </div>
                  </div>
                  <br><br><br><br><br>
                  <?php $table = DB::table('kawasans')->where('nama', $kawasan)->first();?>
                  <?php $table1 = DB::table('jadual_bancians')->where('kawasan_id', $table->id)->first();?>

                  <?php if($table1->status == "Aktiviti Semburan Selesai") {?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Awas!</h4>
                        {{$kawasan}} sangat berisiko di dalam proses pembiakan nyamuk Aedes.
                      </div>
                  <?php } ?>
                  <?php if($table1->status == "Selesai") {?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>	<i class="icon fa fa-check"></i> Aktivit Bancian Selesai</h4>
                        {{$kawasan}} bebas daripada pembiakan nyamuk Aedes.
                      </div>
                  <?php } ?>
                  <?php if($table1->status == "Dalam Proses") {?>
                      <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Aktiviti Bancian Sedang Dilakukan</h4>
                        Bancian sedang dilakukan di kawasan {{$kawasan}}
                      </div>
                  <?php } ?>
                  <?php if($table1->status == "Dihantar") {?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Jadual Bancian Telah Dihantar </h4>
                        Belum ada tindakan bancian dilakukan di kawasan {{$kawasan}}
                      </div>
                  <?php } ?>
                  <?php if($table1->status == "Aktiviti Penyemburan Diperlukan") {?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Aktiviti Bancian Sedang Dilakukan </h4>
                        Aktivit penyemburan sedang dilakukan di kawasan {{$kawasan}}
                      </div>
                  <?php } ?>
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">Statistik Soalan Bancian Mengikut Kawasan Perumahan</div>
                                <div class="panel-body">
                                    <h5 class="text-center text-uppercase"> <b> {{$kawasan}} </b></h5>
                                    <br>
                                  <canvas id="questionchart" width="1200px" height="400px" ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB. 
      </footer>
    </div>

    <script src="{{ url('eAedesEx/plugins/chartjs/Chart.min.js') }}"></script>
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
          (function() {
              var ctx = document.getElementById('questionchart').getContext('2d');
              var chart = {
                  labels: ['Soalan 1', 'Soalan 2', 'Soalan 3', 'Soalan 4', 'Soalan 5', 'Soalan 6', 'Soalan 7', 'Soalan 8', 'Soalan 9', 'Soalan 10', 'Soalan 11', 'Soalan 12', 'Soalan 13', 'Soalan 14', 'Soalan 15', 'Soalan 16', 'Soalan 17', 'Soalan 18', 'Soalan 19', 'Soalan 20'],
                  datasets: [{
                      data: {!! json_encode($questioncount) !!},
                      fillColor : "#97a7f6",
                      strokeColor : "#07186f",
                      pointColor : "#bb574e"
                  }]
              };
              new Chart(ctx).Bar(chart, { bezierCurve: false, pointDotRadius : 3 });
          })();
    </script>
  </body>
</html>
