@include('sider-admin')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tahap Risiko
            <small>Senarai Tahap Risiko</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/admin'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{(url('/tahap-risiko-admin'))}}">Daftar Tahap Risiko</a></li>
            <li class="active">Tahap Risiko</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- <div class="box box-default"></div> -->

          <div class="row">
            <div class="col-md-12">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Senarai Tahap Risiko</h3>
                </div>
                <div class="box-body">
                  <div class="box-header">
                    <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Bil</th>
                          <th>Keterangan</th>
                          <th>Tahap</th>
                          <th>Warna</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $counter = 1;
                         ?>
                              @foreach($tahaprisiko as $key => $value)
                        <tr>
                          <td>{{ $counter }}</td>
                          <td>{{ $value->keterangan }}</td>
                          <td>{{ $value->nilai }}</td>
                          <td>{{ $value->warna }}</td>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- <div class="box box-info"></div> -->

            </div>
            <!-- <div class="col-md-6"></div> -->
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
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ url('eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ url('eAedesEx/plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ url('eAedesEx/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ url('eAedesEx/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ url('eAedesEx/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ url('eAedesEx/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ url('eAedesEx/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ url('eAedesEx/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ url('eAedesEx/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('eAedesEx/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('eAedesEx/dist/js/demo.js') }}"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
