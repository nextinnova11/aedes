@include('sider-pejabat-kesihatan')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-files-o"></i> Kemaskini Maklumat
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/pejabatKesihatan'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('kemaskini-soalan', $banci->id) }}">Kemaskini Soalan Bancian</a></li>
            <li class="active">{{ $banci->tempat_diperiksa }}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$banci->id.'.png') }}" alt="Question picture">
                  <h3 class="profile-username text-center">{{ $banci->tempat_diperiksa }}</h3>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Maklumat Lanjut</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Status </strong>
                  <p class="text-muted">{{ $banci->status }}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Kemaskini Maklumat Soalan</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  @if (count($errors) > 0)
                              @foreach($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                            @endif

                    <form class="form-horizontal" method="PUT" action= "{{ URL('kemaskini-soalan-bancian', $banci->id) }}">
                        <div class="form-horizontal" >
                          <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Tempat Diperiksa</label>
                              <div class="col-sm-10">
                                  <input type="text" readonly value="{{ $banci->tempat_diperiksa }}" name="tempat_diperiksa" class="form-control" id="inputName">
                              </div>
                          </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Soalan Pertama</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="{{ $banci->soalan_1 }}" name="soalan_1" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Soalan Kedua</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="{{ $banci->soalan_2 }}" name="soalan_2" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Soalan Ketiga</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="{{ $banci->soalan_3 }}" name="soalan_3" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Soalan Keempat</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="{{ $banci->soalan_4 }}" name="soalan_4" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Soalan Kelima</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="{{ $banci->soalan_5 }}" name="soalan_5" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                  <select class="form-control m-bot15" name="status" value="{{$banci->status}}" id="negeri">
                                      <option> Aktif </option>
                                      <option> Tidak Aktif </option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Kemaskini</button>
                              </div>
                            </div>
                          </form>
                      </div>
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
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

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

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
