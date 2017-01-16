@include('sider-pembanci')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-files-o"></i> Kemaskini Bancian
          </h1>
          @foreach($jadualbancian as $jadualbancian)
          <ol class="breadcrumb">
            <li><a href="{{(url('/pembanci'))}}"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li><a href="">Kemaskini Bancian</a></li>
            <li class="active">{{$jadualbancian->kawasan_bancian}}</li>
          </ol>
          @endforeach
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ url('/eAedesEx/dist/img/home.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>
                  <p class="text-muted text-center">Kawasan Bancian</p>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Kemaskini Bancian</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  @if (count($errors) > 0)
                              @foreach($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                            @endif

                    <form class="form-horizontal" method="PUT" action= "{{ URL('kemaskinibancian', $jadualbancian->id) }}">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nama Pembanci</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly value="{{$namapembanci1->name}}" name="pembanci" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Kawasan Bancian</label>
                                <div class="col-sm-10">
                                    <input type="type" readonly value="{{$kawasanbancian1->nama}}" name="kawasan" class="form-control" id="inputEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Tarikh Mula</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$jadualbancian->tarikh_mula}}" name="mula" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Tarikh Akhir</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{$jadualbancian->tarikh_akhir}}" name="akhir" class="form-control" id="inputSkills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                  <select class="form-control m-bot15" name="status" id="negeri">
                                      <option> Selesai </option>
                                  </select>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Kemaskini</button>
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
