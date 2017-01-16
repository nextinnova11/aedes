<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'AdminController@index');
    Route::get('/semak-permohonan', 'AdminController@semak');
    Route::get('semak-perumahan', 'AdminController@semakperumahan');
    Route::resource('profil', 'AdminController@profil');
    Route::resource('kemaskini-profile', 'AdminController@kemaskiniProfile');
    Route::resource('ubah-kata-laluan', 'AdminController@ubahKataLaluan');
    Route::resource('kemaskiniprofil', 'AdminController@update');
    Route::get('daftar-pejabat-kesihatan', 'AdminController@create');
    Route::post('daftar-pejabat-kesihatan', 'AdminController@store');
    Route::resource('katalaluan', 'AdminController@kemaskinikatalaluan');
    Route::get('senarai-soalan-bancian-admin', 'AdminController@senaraisoalanbancian');
    Route::get('tahap-risiko-admin', 'AdminController@tahaprisiko');
    Route::get('nota-admin', 'AdminController@nota');
    Route::resource('kemaskini-senarai-nota-admin', 'AdminController@kemaskinisenarainota');
    Route::resource('hapus-nota-admin', 'AdminController@buangnota');
    Route::resource('daftar-nota-admin', 'AdminController@daftarnota');
    Route::resource('kemaskini-nota-admin', 'AdminController@kemaskininota');
    Route::resource('senarai-tindakan-admin', 'AdminController@senaraitindakan');
    Route::get('senarai-kawasan-admin', 'AdminController@senaraikawasan');
    Route::get('laporan-kawasan-admin', 'AdminController@laporankawasan');
    Route::resource('risiko-admin', 'AdminController@laporankawasanrisiko');
    Route::get('laporan-soalan-bancian-admin', 'AdminController@laporansoalan');
    Route::resource('soalan-admin', 'AdminController@laporansoalanpenuh');
    Route::get('laporan-bulanan-admin', 'AdminController@laporanbulanan');
    Route::resource('bulanan-admin', 'AdminController@laporanbulananpenuh');

    Route::get('/pejabatKesihatan', 'PejabatKesihatanController@index');
    Route::get('semak-permohonan-PK', 'PejabatKesihatanController@semak');
    Route::get('senarai-perumahan', 'PejabatKesihatanController@senaraiperumahan');
    Route::get('senarai-soalan-bancian', 'PejabatKesihatanController@senaraisoalanbancian');
    Route::get('daftar-perumahan', 'PejabatKesihatanController@daftarperumahan');
    Route::get('daftar-perumahan-pk', 'PejabatKesihatanController@daftarperumahanbaru');
    Route::get('tahap-risiko', 'PejabatKesihatanController@tahaprisiko');
    Route::resource('daftar-risiko', 'PejabatKesihatanController@daftarisiko');
    Route::resource('hapus-pengguna', 'PejabatKesihatanController@buangpengguna');
    Route::resource('hapus-perumahan', 'PejabatKesihatanController@buangperumahan');
    Route::resource('profil-pejabat-kesihatan', 'PejabatKesihatanController@profil');
    Route::resource('kemaskini-profile-pk', 'PejabatKesihatanController@kemaskiniProfile');
    Route::resource('kemaskini-soalan', 'PejabatKesihatanController@kemaskinisoalan');
    Route::resource('kemaskiniprofilpk', 'PejabatKesihatanController@update');
    Route::resource('kemaskini-soalan-bancian', 'PejabatKesihatanController@kemaskinisoalanbancian');
    Route::resource('kemaskini-tahap-risiko', 'PejabatKesihatanController@kemaskinitahaprisiko');
    Route::resource('kemaskini-risiko', 'PejabatKesihatanController@kemaskinirisiko');
    Route::get('daftar-baru-KL', 'PejabatKesihatanController@createKetuaLokaliti');
    Route::get('daftar-soalan-bancian', 'PejabatKesihatanController@daftarsoalanbancian');
    Route::post('daftar-ketua-lokaliti', 'PejabatKesihatanController@storeKetuaLokaliti');
    Route::resource('muatnaik-soalan', 'PejabatKesihatanController@muatnaiksoalan');
    Route::get('daftar-baru-PV', 'PejabatKesihatanController@createPegawaiVektor');
    Route::post('daftar-pegawai-vektor', 'PejabatKesihatanController@storePegawaiVektor');
    Route::resource('ubah-kata-laluan-PK', 'PejabatKesihatanController@ubahKataLaluan');
    Route::resource('katalaluan-PK', 'PejabatKesihatanController@kemaskinikatalaluan');
    Route::get('jadual-tindakan', 'PejabatKesihatanController@jadualtindakan');
    Route::resource('daftar-jadual-tindakan', 'PejabatKesihatanController@daftarjadualtindakan');
    Route::get('senarai-tindakan', 'PejabatKesihatanController@senaraitindakan');
    Route::get('nota', 'PejabatKesihatanController@nota');
    Route::resource('daftar-nota', 'PejabatKesihatanController@daftarnota');
    Route::resource('kemaskini-senarai-nota', 'PejabatKesihatanController@kemaskinisenarainota');
    Route::resource('kemaskini-nota', 'PejabatKesihatanController@kemaskininota');
    Route::resource('hapus-nota', 'PejabatKesihatanController@buangnota');
    Route::resource('kemaskini-perumahan', 'PejabatKesihatanController@kemaskiniperumahan');
    Route::resource('kemaskini-perumahan-baru', 'PejabatKesihatanController@kemasrumahbaru');
    Route::resource('daftar-kawalan', 'PejabatKesihatanController@daftarkawalan');
    Route::get('laporan-kawasan', 'PejabatKesihatanController@laporankawasan');
    Route::get('dropdownlaporan', 'PejabatKesihatanController@laporanperumahan');
    Route::resource('risiko', 'PejabatKesihatanController@laporankawasanrisiko');
    Route::get('laporan-soalan-bancian', 'PejabatKesihatanController@laporansoalan');
    Route::resource('soalan', 'PejabatKesihatanController@laporansoalanpenuh');
    Route::resource('bulanan', 'PejabatKesihatanController@laporanbulananpenuh');
    Route::get('laporan-bulanan', 'PejabatKesihatanController@laporanbulanan');
    Route::get('dropdown-laporan', 'PejabatKesihatanController@categoryDropDownData');

    Route::get('/ketuaLokaliti', 'KetuaLokalitiController@index');
    Route::get('semak-permohonan-KL', 'KetuaLokalitiController@semak');
    Route::resource('profil-ketua-lokaliti', 'KetuaLokalitiController@profil');
    Route::resource('kemaskini-profile-kl', 'KetuaLokalitiController@kemaskiniProfile');
    Route::resource('kemaskiniprofilkl', 'KetuaLokalitiController@update');
    Route::get('daftar-baru-pembanci', 'KetuaLokalitiController@create');
    Route::post('daftar-pembanci', 'KetuaLokalitiController@store');
    Route::resource('ubah-kata-laluan-KL', 'KetuaLokalitiController@ubahKataLaluan');
    Route::resource('katalaluan-KL', 'KetuaLokalitiController@kemaskinikatalaluan');
    Route::get('senarai-kawasan', 'KetuaLokalitiController@senaraikawasan');
    Route::get('daftar-kawasan', 'KetuaLokalitiController@daftarkawasan');
    Route::get('daftar-kawasan-kl', 'KetuaLokalitiController@daftarkawasanbaru');
    Route::resource('hapus-kawasan', 'KetuaLokalitiController@buangkawasan');
    Route::get('calendar', 'KetuaLokalitiController@calendar');
    Route::resource('daftar-bancian', 'KetuaLokalitiController@simpan');
    Route::resource('senarai-bancian', 'KetuaLokalitiController@senaraibancian');
    Route::resource('hapus-jadual', 'KetuaLokalitiController@buangjadual');
    Route::resource('kemaskini-kawasan', 'KetuaLokalitiController@kemaskinikawasan');
    Route::resource('kemaskini-kawasan-baru', 'KetuaLokalitiController@kemaskawasanbaru');
    Route::resource('kemaskini-kalendar', 'KetuaLokalitiController@kemaskinikalendar');
    Route::resource('kemaskini-kalendar-baru', 'KetuaLokalitiController@kemaskalendarbaru');
    Route::resource('hapus-pengguna-pembanci', 'KetuaLokalitiController@buangpengguna');
    Route::get('dropdown', 'KetuaLokalitiController@categoryDropDownData');
    Route::get('laporan-kawasan-KL', 'KetuaLokalitiController@laporankawasan');
    Route::resource('risiko-KL', 'KetuaLokalitiController@laporankawasanrisiko');
    Route::get('laporan-soalan-bancian-KL', 'KetuaLokalitiController@laporansoalan');
    Route::resource('soalan-KL', 'KetuaLokalitiController@laporansoalanpenuh');
    Route::get('laporan-bulanan-KL', 'KetuaLokalitiController@laporanbulanan');
    Route::resource('bulanan-KL', 'KetuaLokalitiController@laporanbulananpenuh');

    Route::get('/pegawaiVektor', 'PegawaiVektorController@index');
    Route::resource('profil-pegawai-vektor', 'PegawaiVektorController@profil');
    Route::resource('kemaskini-profile-pv', 'PegawaiVektorController@kemaskiniProfile');
    Route::resource('kemaskiniprofilpv', 'PegawaiVektorController@update');
    Route::resource('ubah-kata-laluan-PV', 'PegawaiVektorController@ubahKataLaluan');
    Route::resource('katalaluan-PV', 'PegawaiVektorController@kemaskinikatalaluan');
    Route::resource('senarai-tindakan-pv', 'PegawaiVektorController@senaraitindakan');
    Route::resource('semburan', 'PegawaiVektorController@semburan');
    Route::resource('kemaskini-jadual-tindakan', 'PegawaiVektorController@kemaskiniJadualTindakan');
    Route::resource('kemaskinitindakan', 'PegawaiVektorController@updatetindakan');

    Route::get('/pembanci', 'PembanciController@index');
    Route::resource('profil-pembanci', 'PembanciController@profil');
    Route::resource('kemaskini-profile-pembanci', 'PembanciController@kemaskiniProfile');
    Route::resource('kemaskiniprofilpembanci', 'PembanciController@update');
    Route::resource('ubah-kata-laluan-pembanci', 'PembanciController@ubahKataLaluan');
    Route::resource('katalaluan-pembanci', 'PembanciController@kemaskinikatalaluan');
    Route::resource('senarai-bancian-pembanci', 'PembanciController@senaraibancian');
    Route::resource('kemaskini-bancian', 'PembanciController@kemaskiniBancian');
    Route::resource('kemaskinibancian', 'PembanciController@updatebancian');

    Route::resource('bancian', 'SoalanController@pertama');
    Route::resource('jawapanbancian', 'SoalanController@jawapan');

});
