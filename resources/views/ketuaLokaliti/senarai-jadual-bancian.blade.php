@include('sider-ketua-lokaliti')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @if (session('msg'))
            <div class="flash-message">
                <div class="alert alert-success">
                    {{ session()->get('msg') }}
                </div>
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Senarai Jadual Bancian
            <small>Senarai Jadual Bancian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/ketuaLokaliti'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('/senarai-bancian')}}">Senarai Jadual Bancian</a></li>
            <li class="active">Senarai Jadual Bancian</li>
          </ol>
        </section>
        <section>
              <div class="box">
                <div class="box-header">
                  <h3>Belum Ada Tindakan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil</th>
                        <th>Pembanci</th>
                        <th>Kawasan Bancian</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $counter = 1;
                       ?>
                      @foreach($senaraijadualbancian as $key => $value)
                      <tr>
                        <td>{{ $counter }}</td>
                        <?php $user = DB::table('users')->where('id', $value->pembanci_id)->first() ?>
                        <td>{{ $user->name }}</td>
                        <?php $kawasan = DB::table('kawasans')->where('id', $value->kawasan_id)->first() ?>
                        <td>{{ $kawasan->nama }}</td>
                        <td>{{ $value->tarikh_mula }}</td>
                        <td> {{ $value->tarikh_akhir }}</td>
                        <td> {{ $value->status }}</td>
                        <td>
                              <a class="btn btn-app" method="DELETE" href="{{ URL('kemaskini-kalendar', $value->id) }}" title="Hapus" onclick="return confirm('Adakah anda ingin kemaskini kalendar ini?')"><i class="fa fa-pencil"></i>Kemaskini</a>
                              <a class="btn btn-app" method="DELETE" href="{{ URL('hapus-jadual', $value->id) }}" title="Hapus" onclick="return confirm('Adakah anda ingin membuang jadual bancian ini?')"><i class="fa fa-remove"></i>Hapus</a>
                        </td>
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

              <div class="box">
                <div class="box-header">
                  <h3>Dalam Proses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil</th>
                        <th>Pembanci</th>
                        <th>Kawasan Bancian</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $counter = 1;
                       ?>
                      @foreach($senaraijadualbancian1 as $key => $value)
                      <tr>
                        <td>{{ $counter }}</td>
                        <?php $table = DB::table('users')->where('id', $value->pembanci_id)->first();?>
                        <td>{{ $table->name }}</td>
                        <?php $table1 = DB::table('kawasans')->where('id', $value->kawasan_id)->first();?>
                        <td>{{ $table1->nama }}</td>
                        <td>{{ $value->tarikh_mula }}</td>
                        <td> {{ $value->tarikh_akhir }}</td>
                        <td> {{ $value->status }}</td>
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

              <div class="box">
                <div class="box-header">
                  <h3>Selesai</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil</th>
                        <th>Pembanci</th>
                        <th>Kawasan Bancian</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $counter = 1;
                       ?>
                      @foreach($senaraijadualbancian2 as $key => $value)
                      <tr>
                        <td>{{ $counter }}</td>
                        <?php $table = DB::table('users')->where('id', $value->pembanci_id)->first();?>
                        <td>{{ $table->name }}</td>
                        <?php $table1 = DB::table('kawasans')->where('id', $value->kawasan_id)->first();?>
                        <td>{{ $table1->nama }}</td>
                        <td>{{ $value->tarikh_mula }}</td>
                        <td> {{ $value->tarikh_akhir }}</td>
                        <td> {{ $value->status }}</td>
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
        </section><!-- /.content -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB. 
      </footer>


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
