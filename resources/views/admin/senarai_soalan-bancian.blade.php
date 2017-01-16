@include('sider-admin')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Semak Soalan Bancian
            <small>Senarai Soalan Bancian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/admin'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('/senarai-soalan-bancian-admin')}}">Semak Soalan Bancian</a></li>
            <li class="active">Senarai Soalan Bancian</li>
          </ol>
        </section>

              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil</th>
                        <th>Gambar</th>
                        <th>Tempat Diperiksa</th>
                        <th>Soalan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $counter = 1;
                       ?>
                       @foreach($bancian as $key => $value)
                      <tr>
                        <td>{{ $counter }}</td>
                        <td style="text-align:center;"><img src="{{ asset('eAedesEx/images/'.$value->id.'.png') }}" width="100" height="100"></td>
                        <td>{{ $value-> tempat_diperiksa}}</td>
                        <td>{{ $value-> soalan_1}}<br>{{ $value-> soalan_2}}<br>{{ $value-> soalan_3}}<br>{{ $value-> soalan_4}}<br>{{ $value-> soalan_5}}</td>
                        <td>{{ $value-> status}} </td>
                      </tr>
                      <?php
                          $counter++;
                      ?>
                      @endforeach

                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
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

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark"></aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

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
  </body>
</html>
