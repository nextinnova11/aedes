@include('sider-pejabat-kesihatan')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
          <i class="fa fa-edit"></i> Daftar Soalan Bancian
      </h1>
      <ol class="breadcrumb">
            <li><a href="{{ url('/pejabatKesihatan') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="{{ URL('/daftar-soalan-bancian')}}">Daftar Soalan Bancian</a></li>
            <li class="active">Soalan Bancian</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Daftar Baru Soalan Bancian</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ URL('/muatnaik-soalan') }}" enctype="multipart/form-data">
                                      {!! csrf_field() !!}
                                      <div class="form-group{{ $errors->has('tempat_diperiksa') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Tempat Diperiksa</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="tempat_diperiksa" value="{{ old('tempat_diperiksa') }}">

                                              @if ($errors->has('tempat_diperiksa'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('tempat_diperiksa') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('soalan_pertama') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Soalan Pertama</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="soalan_pertama" value="{{ old('soalan_pertama') }}">

                                              @if ($errors->has('soalan_pertama'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('soalan_pertama') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('soalan_kedua') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Soalan Kedua</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="soalan_kedua" value="{{ old('soalan_kedua') }}">

                                              @if ($errors->has('soalan_kedua'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('soalan_kedua') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('soalan_ketiga') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Soalan Ketiga</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="soalan_ketiga" value="{{ old('soalan_ketiga') }}">

                                              @if ($errors->has('soalan_ketiga'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('soalan_ketiga') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('soalan_keempat') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Soalan Keempat</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="soalan_keempat" value="{{ old('soalan_keempat') }}">

                                              @if ($errors->has('soalan_keempat'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('soalan_keempat') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('soalan_kelima') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Soalan Kelima</label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="soalan_kelima" value="{{ old('soalan_kelima') }}">

                                              @if ($errors->has('soalan_kelima'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('soalan_kelima') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Muat Naik Gambar</label>
                                          <div class="col-md-6">
                                              <input type="file" id="exampleInputFile" name="file" required />

                                              @if ($errors->has('file'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('file') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">
                                              <button type="submit" class="btn btn-primary">
                                                  <i class="fa fa-btn fa-pencil"></i> Daftar
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
