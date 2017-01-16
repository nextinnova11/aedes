@include('sider-pembanci')
<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-list"></i> Senarai Soalan Bancian</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/pembanci') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
      <li><a href="{{ url('bancian') }}">Soalan Bancian</a></li>
      <li class="active">Senarai Soalan Bancian</li>
    </ol>
  </section>
  <section class="content">
    @if (count($errors) > 0)
      @foreach($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    @endif
    <form class="form-horizontal" method="PUT" action= "{{ URL('jawapanbancian') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="panel-body">
      <label class="col-md-4 control-label"><i class="fa fa-home"></i>Kawasan Perumahan</label>

      <div class="col-md-6">
          <input type="text" readonly class="form-control" name="perumahan" value="{{ $kawasanrumah->nama }}">
      </div>

    </div>
    <div class="panel-body">
      <label class="col-md-4 control-label"><i class="fa fa-road "></i>Nama Jalan / Blok</label>
      <div class="col-md-6">
          <input type="text" class="form-control" name="jalan_blok" required>
      </div>
    </div>
    <div class="panel-body">
      <label class="col-md-4 control-label"><i class="fa fa-sort-numeric-asc "></i>Nombor Rumah</label>
      <div class="col-md-6">
          <input type="text" class="form-control" name="no_rumah" required>
      </div>
    </div>
    <!-- <form class="form-horizontal" method="PUT" action= "{{ URL('jawapanbancian') }}"> -->
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian1->id.'.png') }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $soalanbancian1->tempat_diperiksa }}</h3>
              <p class="text-muted text-center">Soalan Pertama</p>
            </div>
          </div>
        </div>
        <!-- soalan1 -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Soalan Pertama</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="form-horizontal" >
                  <div class="form-group">
                    <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian1->tempat_diperiksa }}</label>
                    <div class="col-sm-6">
                      <select class="form-control m-bot15" name="soalan1" id="soalan1" required>
                        <option value="">Silih pilih satu:</option>
                        <option value="1"> Ya </option>
                        <option value="2"> Tidak </option>
                      </select>
                    </div>
                  </div>
                  <div id="soalanpertama" style="display:none;">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                        <div class="col-sm-6">
                          <input type="checkbox" name="q1_1" id="q1_1" value="1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                        <div class="col-sm-6">
                          <input type="checkbox" name="q1_2" id="q1_2" value="2">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian2->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian2->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-2</p>
                </div>
              </div>
            </div>
            <!-- soalan2 -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-2</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="form-horizontal" >
                      <div class="form-group">
                        <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian2->tempat_diperiksa }}</label>
                        <div class="col-sm-6">
                              <select class="form-control m-bot15" name="soalan2" id="soalan2" required>
                                <option value="">Silih pilih satu:</option>
                                <option value="1"> Ya </option>
                                <option value="2"> Tidak </option>
                              </select>
                        </div>
                        </div>
                        <div id="soalankedua" style="display:none;">
                          <div class="form-group">
                              <label for="inputName" class="col-sm-6 control-label">Tidak buang air yang bertakung</label>
                              <div class="col-sm-6">
                                <input type="checkbox" name="q2_1" id="q2_1">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputName" class="col-sm-6 control-label">Menggunakan pelapik</label>
                              <div class="col-sm-6">
                                <input type="checkbox" name="q2_2" id="q2_2">
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 3 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian3->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian3->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-3</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-3</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian3->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan3" id="soalan3" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalanketiga" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q3_1" id="q3_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q3_2" id="q3_2">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 4 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian4->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian4->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-4</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-4</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian4->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan4" id="soalan4" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankeempat" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q4_1" id="q4_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q4_2" id="q4_2">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 5 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian5->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian5->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-5</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-5</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian5->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan5" id="soalan5" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankelima" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak tutup dengan rapat</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q5_1" id="q5_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q5_2" id="q5_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Jika rosak, tidak segera dibaiki</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q5_3" id="q5_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 6 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian6->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian6->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-6</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-6</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian6->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan6" id="soalan6" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div id="soalankeenam" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q6_1" id="q6_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak tutup dengan rapat atau tidak dibaiki dengan segera</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q6_2" id="q6_2">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 7 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian7->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian7->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-7</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-7</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian7->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan7" id="soalan7" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalanketujuh" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q7_1" id="q7_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak tutup dengan rapat</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q7_2" id="q7_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak terlangkup atau terbalikkan</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q7_3" id="q7_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 8 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian8->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian8->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-8</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-8</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian8->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan8" id="soalan8" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankelapan" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan tukar airnya setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q8_1" id="q8_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q8_2" id="q8_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak membubuh air tetapi membalut tangkai bunga dengan kapas atau kertas basah</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q8_3" id="q8_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 9 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian9->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian9->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-9</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-9</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian9->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan9" id="soalan9" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div id="soalankesembilan" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q9_1" id="q9_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q9_2" id="q9_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak tutup dengan rapat</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q9_3" id="q9_3">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak buang atau lupuskan jika tidak digunakan</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q9_4" id="q9_4">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak terlangkupkan atau terbalikkan supaya tidak menakung air</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q9_5" id="q9_5">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 10 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian10->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian10->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-10</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-10</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian10->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan10" id="soalan10" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankesepuluh" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q10_1" id="q10_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak tutup dengan rapat</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q10_2" id="q10_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak terlangkup atau terbalikkan</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q10_3" id="q10_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 11 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian11->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian11->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-11</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-11</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian11->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan11" id="soalan11" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankesebelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Pastikan pasu bunga tidak menakung air</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q11_1" id="q11_1">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 12 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian12->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian12->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-12</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-12</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian12->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan12" id="soalan12" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankeduabelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus dan cuci setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q12_1" id="q12_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q12_2" id="q12_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Menggunakan alas pasu bunga</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q12_3" id="q12_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 13 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian13->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian13->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-13</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-13</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian13->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan13" id="soalan13" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalanketigabelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak kumpul dan lupuskan dengan sempurna</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q13_1" id="q13_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak letak di tempat yang terlindung daripada hujan</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q13_2" id="q13_2">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 14 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian14->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian14->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-14</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-14</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian14->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan14" id="soalan14" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                <div id="soalankeempatbelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak letak di tempat yang terlindung daripada hujan </label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q14_1" id="q14_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q14_2" id="q14_2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak susun dan tutup rapat di bahagian atas</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q14_3" id="q14_3">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 15 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian15->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian15->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-15</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-15</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian15->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan15" id="soalan15" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                          </div>
                                <div id="soalankelimabelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak bubuh bahan pembunuh jentik-jentik </label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q15_1" id="q15_1">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 16 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian16->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian16->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-16</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-16</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian16->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan16" id="soalan16" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="soalankeenambelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak buang air yang bertakung </label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q16_1" id="q16_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak lipat dan letak di tempat terlindung daripada hujan</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q16_2" id="q16_2">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 17 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian17->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian17->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-17</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-17</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian17->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan17" id="soalan17" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="soalanketujuhbelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak berus, cuci dan tukar airnya setiap minggu </label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q17_1" id="q17_1">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 18 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian18->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian18->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-18</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-18</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian18->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan18" id="soalan18" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="soalankelapanbelas" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak kutip dan buang dengan sempurna</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q18_1" id="q18_1">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 19 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian19->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian19->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-19</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-19</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian19->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan19" id="soalan19" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                            </div>
                                  <div id="soalansembilanbelas" style="display:none;">
                                    <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak cuci dan bersihkan setiap minggu</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q19_1" id="q19_1">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak memastikan air mengalir dengan lancar</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q19_2" id="q19_2">
                                      </div>
                                    </div>
                                  </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- soalan 20 -->
          <div class="row">
            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('eAedesEx/images/'.$soalanbancian20->id.'.png') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ $soalanbancian20->tempat_diperiksa }}</h3>
                  <p class="text-muted text-center">Soalan Ke-20</p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Soalan Ke-20</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Adakah rumah tersebut mempunyai {{ $soalanbancian20->tempat_diperiksa }}</label>
                                <div class="col-sm-6">
                                      <select class="form-control m-bot15" name="soalan20" id="soalan20" required>
                                        <option value="">Silih pilih satu:</option>
                                        <option value="1"> Ya </option>
                                        <option value="2"> Tidak </option>
                                      </select>
                                </div>
                           </div>
                                <div id="soalankeduapuluh" style="display:none;">
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Pastikan tidak tersumbat</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q20_1" id="q20_1">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputName" class="col-sm-6 control-label">Tidak ganti atau baiki jika rosak</label>
                                      <div class="col-sm-6">
                                        <input type="checkbox" name="q20_2" id="q20_2">
                                      </div>
                                  </div>
                                </div>
                          </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-2 col-md-offset-6">
                  <button type="submit" class="btn btn-app">
                      <i class="fa fa-save"></i> Simpan
                  </button>
              </div>
          </div>
          </form>
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ url('/eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ url('/eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ url('/eAedesEx/dist/js/app.min.js') }}"></script>
    <script src="{{ url('/eAedesEx/dist/js/demo.js') }}"></script>
    <script>
    $( "#soalan1" ).change(function() {
      if($("#soalan1").val() == 1) {
        $("#soalanpertama").show();
      } else {
        $("#soalanpertama").hide();
      }
    });
    </script>
    <script>
    $( "#soalan2" ).change(function() {
      if($("#soalan2").val() == 1) {
        $("#soalankedua").show();
      } else {
        $("#soalankedua").hide();
      }
    });
    </script>
    <script>
    $( "#soalan3" ).change(function() {
      if($("#soalan3").val() == 1) {
        $("#soalanketiga").show();
      } else {
        $("#soalanketiga").hide();
      }
    });
    </script>
    <script>
    $( "#soalan4" ).change(function() {
      if($("#soalan4").val() == 1) {
        $("#soalankeempat").show();
      } else {
        $("#soalankeempat").hide();
      }
    });
    </script>
    <script>
    $( "#soalan5" ).change(function() {
      if($("#soalan5").val() == 1) {
        $("#soalankelima").show();
      } else {
        $("#soalankelima").hide();
      }
    });
    </script>
    <script>
    $( "#soalan6" ).change(function() {
      if($("#soalan6").val() == 1) {
        $("#soalankeenam").show();
      } else {
        $("#soalankeenam").hide();
      }
    });
    </script>
    <script>
    $( "#soalan7" ).change(function() {
      if($("#soalan7").val() == 1) {
        $("#soalanketujuh").show();
      } else {
        $("#soalanketujuh").hide();
      }
    });
    </script>
    <script>
    $( "#soalan8" ).change(function() {
      if($("#soalan8").val() == 1) {
        $("#soalankelapan").show();
      } else {
        $("#soalankelapan").hide();
      }
    });
    </script>
    <script>
    $( "#soalan9" ).change(function() {
      if($("#soalan9").val() == 1) {
        $("#soalankesembilan").show();
      } else {
        $("#soalankesembilan").hide();
      }
    });
    </script>
    <script>
    $( "#soalan10" ).change(function() {
      if($("#soalan10").val() == 1) {
        $("#soalankesepuluh").show();
      } else {
        $("#soalankesepuluh").hide();
      }
    });
    </script>
    <script>
    $( "#soalan11" ).change(function() {
      if($("#soalan11").val() == 1) {
        $("#soalankesebelas").show();
      } else {
        $("#soalankesebelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan12" ).change(function() {
      if($("#soalan12").val() == 1) {
        $("#soalankeduabelas").show();
      } else {
        $("#soalankeduabelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan13" ).change(function() {
      if($("#soalan13").val() == 1) {
        $("#soalanketigabelas").show();
      } else {
        $("#soalanketigabelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan14" ).change(function() {
      if($("#soalan14").val() == 1) {
        $("#soalankeempatbelas").show();
      } else {
        $("#soalankeempatbelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan15" ).change(function() {
      if($("#soalan15").val() == 1) {
        $("#soalankelimabelas").show();
      } else {
        $("#soalankelimabelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan16" ).change(function() {
      if($("#soalan16").val() == 1) {
        $("#soalankeenambelas").show();
      } else {
        $("#soalankeenambelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan17" ).change(function() {
      if($("#soalan17").val() == 1) {
        $("#soalanketujuhbelas").show();
      } else {
        $("#soalanketujuhbelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan18" ).change(function() {
      if($("#soalan18").val() == 1) {
        $("#soalankelapanbelas").show();
      } else {
        $("#soalankelapanbelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan19" ).change(function() {
      if($("#soalan19").val() == 1) {
        $("#soalansembilanbelas").show();
      } else {
        $("#soalansembilanbelas").hide();
      }
    });
    </script>
    <script>
    $( "#soalan20" ).change(function() {
      if($("#soalan20").val() == 1) {
        $("#soalankeduapuluh").show();
      } else {
        $("#soalankeduapuluh").hide();
      }
    });
    </script>
  </body>
</html>
