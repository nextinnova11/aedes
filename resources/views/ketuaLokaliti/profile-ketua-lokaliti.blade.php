@include('sider-ketua-lokaliti')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-user-md"></i> Profil Pengguna
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/ketuaLokaliti') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('profil-ketua-lokaliti', $value = Auth::user()->id) }}">Profil Pengguna</a></li>
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
                  <p class="text-muted text-center">Ketua Lokaliti</p>
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
                  <li class="active"><a href="#activity" data-toggle="tab">Maklumat terperinci</a></li>
                  <!-- <li><a href="#timeline" data-toggle="tab">Alamat</a></li>
                  <li><a href="#settings" data-toggle="tab">Kata Laluan</a></li> -->
                </ul>
                <div class="tab-content">

                  <!-- Profile -->
                <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="PUT" action= "{{ URL('kemaskinialamat', $pengguna1->id) }}">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly value="{{$pengguna1->name}}" name="nama" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly value="{{$pengguna1->email}}" name="email" class="form-control" id="inputEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Kad Pengenalan</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$pengguna1->KP}}" name="no_KP" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$pengguna1->status}}" name="status" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Jawatan</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$pengguna1->jawatan}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            @foreach ($pengguna2 as $key => $value)
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Nombor Telefon</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->no_tel}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Nombor Rumah</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->alamat_1}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Taman Rumah</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->alamat_2}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Jalan Rumah</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->alamat_3}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Poskod</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->poskod}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Bandar</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->bandar}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Negeri</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$value->negeri}}" name="jawatan" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            @endforeach
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
