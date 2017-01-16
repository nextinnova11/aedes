@include('sider-admin')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
          <i class="fa fa-edit"></i> Daftar Pengguna
      </h1>
      <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ url('/daftar-pejabat-kesihatan', $value = Auth::user()->i) }}">Daftar Pengguna</a></li>
            <li class="active">Pejabat Kesihatan</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Daftar Baru Pejabat Kesihatan</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/daftar-pejabat-kesihatan') }}">
                                      {!! csrf_field() !!}
                                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Nama</label>
                                          <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                              @if ($errors->has('name'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Alamat Email</label>
                                            <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Kata Laluan</label>
                                            <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="password" class="form-control" name="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Sah Kata Laluan</label>
                                          <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="password" class="form-control" name="password_confirmation">

                                              @if ($errors->has('password_confirmation'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('KP') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">No Kad Pengenalan</label>
                                            <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="KP" value="{{ old('KP') }}">

                                              @if ($errors->has('KP'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('KP') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">No Telefon</label>
                                            <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="tel" class="form-control" name="telefon" value="{{ old('telefon') }}">

                                              @if ($errors->has('telefon'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('telefon') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('noRumah') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">No Rumah</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="noRumah" value="{{ old('noRumah') }}">

                                              @if ($errors->has('noRumah'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('noRumah') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('namaTaman') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Nama Taman</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="namaTaman" value="{{ old('namaTaman') }}">

                                              @if ($errors->has('namaTaman'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('namaTaman') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('namaJalan') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Nama Perumahan</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="namaJalan" value="{{ old('namaJalan') }}">

                                              @if ($errors->has('namaJalan'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('namaJalan') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('poskod') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Poskod</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="poskod" value="{{ old('poskod') }}">

                                              @if ($errors->has('poskod'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('poskod') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('bandar') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Bandar</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="bandar" value="{{ old('bandar') }}">

                                              @if ($errors->has('bandar'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('bandar') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('negeri') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Negeri</label>
                                          <div class="col-md-6">
                                            <select class="form-control m-bot15" name="negeri" value="{{ old('negeri') }}" id="negeri">
                                                <option> - </option>
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

                                              @if ($errors->has('negeri'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('negeri') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('noPekerja') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">No Pekerja</label>
                                          <small class="label label-danger"> *</small>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="noPekerja" value="{{ old('noPekerja') }}">

                                              @if ($errors->has('noPekerja'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('noPekerja') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">
                                              <button type="submit" class="btn btn-primary">
                                                  <i class="fa fa-btn fa-user"></i> Daftar
                                              </button>
                                          </div>
                                      </div>
                                </form>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
  </div>



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
