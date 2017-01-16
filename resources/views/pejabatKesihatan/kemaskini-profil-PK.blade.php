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
            <li><a href="{{ url('kemaskini-profile-pk', $value = Auth::user()->id) }}">Kemaskini Profil</a></li>
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
                  <li class="active"><a href="#activity" data-toggle="tab">Kemaskini Maklumat</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  @if (count($errors) > 0)
                              @foreach($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                            @endif

                    <form class="form-horizontal" method="PUT" action= "{{ URL('kemaskiniprofilpk', $pengguna1->id) }}">
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
                      </div>

                      @foreach ($pengguna2 as $key => $value)

                <div class="tab-pane" id="timeline">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nombor Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$value->no_tel}}" name="no_tel" class="form-control" id="inputName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nombor Rumah</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$value->alamat_1}}" name="no_rumah" class="form-control" id="inputName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Nama Taman</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$value->alamat_2}}" name="taman_rumah" class="form-control" id="inputEmail">
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama Jalan</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{$value->alamat_3}}" name="jalan_rumah" class="form-control" id="inputName">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Poskod</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{$value->poskod}}" name="poskod" class="form-control" id="inputName">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Bandar</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{$value->bandar}}" name="bandar" class="form-control" id="inputSkills">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Negeri</label>
                        <div class="col-sm-10">
                          <select class="form-control m-bot15" name="negeri" value="{{$value->negeri}}" id="negeri">
                              <option hidden> {{$value->negeri}}</option>
                              <option> Perlis Indera Kayangan </option>
                              <option> Kedah Darul Ehsan </option>
                              <option> Pulau Pinang Pulau Mutiara </option>
                              <option> Perak Darul Ridzuan </option>
                              <option> Selangor Darul Ehsan </option>
                              <option> Negeri Sembilan Darul Khusus </option>
                              <option> Melaka Bandar Bersejarah </option>
                              <option> Johor Darul Ta'zim </option>
                              <option> Pahang Darul Makmur </option>
                              <option> Kelantan Darul Na'im </option>
                              <option> Terengganu Indera Kayangan </option>
                              <option> Sabah Negeri Di Bawah Bayu </option>
                              <option> Sarawak Bumi Kenyalang </option>
                              <option> Wilayah Persekutuan Kuala Lumpur </option>
                              <option> Wilayah Persekutuan Putrajaya </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nombor Pekerja</label>
                        <div class="col-sm-10">
                          <input type="text" readonly value="{{$value->no_pekerja}}" name="no_pekerja" class="form-control" id="inputSkills">
                        </div>
                      </div>
                      @endforeach
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Kemaskini</button>
                        </div>
                      </div>
                    </form>
                  </div>
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
