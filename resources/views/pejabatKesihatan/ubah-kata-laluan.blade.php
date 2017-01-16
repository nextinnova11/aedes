@include('sider-pejabat-kesihatan')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-files-o"></i> Ubah Kata Laluan
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{(url('/pejabatKesihatan'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('ubah-kata-laluan-PK', $value = Auth::user()->id) }}">Ubah Kata Laluan</a></li>
            <li class="active">{{ Auth::user()->name}}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ url('/eAedesEx/dist/img/iconNoAvatar.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>
                  <p class="text-muted text-center">Pejabat Kesihatan</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tentang Saya</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Jawatan</strong>
                  <p class="text-muted">
                    {{ Auth::user()->jawatan}}
                  </p>

                  <hr>

                  <strong><i class="fa fa-credit-card margin-r-5"></i> Nombor Kad Pengenalan</strong>
                  <p class="text-muted">{{ Auth::user()->KP}}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Ubah Kata Laluan</a></li>
                  <!-- <li><a href="#timeline" data-toggle="tab">Alamat</a></li>
                  <li><a href="#settings" data-toggle="tab">Kata Laluan</a></li> -->
                </ul>
                <div class="tab-content">

                  <!-- Profile -->
                <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="PUT" action= "{{ URL('katalaluan-PK', $pengguna1->id) }}">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Kata Laluan Baru</label>
                                <div class="col-sm-10">
                                    <input class="form-control"  type="password" name="password" id="cname" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Sahkan Kata Laluan</label>
                                <div class="col-sm-10">
                                    <input class="form-control"  type="password" name="password_confirmation" id="cname" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" onclick="return confirm('Adakah anda ingin meneruskan pengemaskinian kata laluan anda?')">Kemaskini
                                    </button>
                                    <button class="btn btn-default" type="button"><a href="{{URL('admin')}}">Batal</a>
                                    </button>
                                </div>
                              </div>
                      </div>
                    </form>
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
