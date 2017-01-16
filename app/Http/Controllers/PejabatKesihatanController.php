<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\pejabatKesihatan;
use App\ketuaLokaliti;
use App\pegawaiVektor;
use App\pembanci;
use App\perumahan;
use App\bancian;
use App\tahap_risiko;
use App\Nota;
use App\jadual_tindakan;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateUser1Request;
use App\Http\Requests\CreateSoalanRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Cartalyst\Alerts\Native\Facades\Alert;
use App\jawapan_bancian;
use DB;
use App\jadual_bancian;
use App\kawasan;
use Illuminate\Support\Facades\Response;
use App\risiko;
use Session;

class PejabatKesihatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $pejabatkesihatan = User::where('kumpulan', '=', '2')->count('kumpulan');
      $ketualokaliti = User::where('kumpulan', '=', '3')->count('kumpulan');
      $pembanci = User::where('kumpulan', '=', '4')->count('kumpulan');
      $pegawaivektor = User::where('kumpulan', '=', '5')->count('kumpulan');
      $nota = Nota::where('sasaran', '=', 'Semua')->orWhere('sasaran', 'Pejabat Kesihatan')->get();

        return view ('pejabatKesihatan.menu-pejabat-kesihatan')
                  ->withPejabatkesihatan($pejabatkesihatan)
                  ->withKetualokaliti($ketualokaliti)
                  ->withPembanci($pembanci)
                  ->withPegawaivektor($pegawaivektor)
                  ->withNota($nota);
    }

    public function semak()
    {
        $pengguna = User::where('kumpulan', '3')->orWhere('kumpulan', '5')->get();
        return view ('pejabatKesihatan.semak_permohonan')
                    ->withPengguna($pengguna);
    }

    public function senaraiperumahan()
    {
        $perumahan = perumahan::all();
        return view ('pejabatKesihatan.senarai_perumahan')
                    ->withPerumahan($perumahan);
    }

    public function senaraisoalanbancian()
    {
        $bancian = bancian::all();
        return view ('pejabatKesihatan.senarai_soalan-bancian')
                  ->withBancian($bancian);
    }

    public function daftarperumahan()
    {
      $ketualokaliti = User::where('kumpulan', '3')->get();
        return view ('pejabatKesihatan.daftar-perumahan')
                ->withKetualokaliti($ketualokaliti);
    }

    public function profil($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pejabatKesihatan::where('user_id', $id)->get();
        return view ('pejabatKesihatan.profile')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskiniProfile($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pejabatKesihatan::where('user_id', $id)->get();
        return view ('pejabatKesihatan.kemaskini-profil-PK')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskinisoalan($id)
    {
        $banci = bancian::find($id);
        return view ('pejabatKesihatan.kemaskini-soalan-bancian')
                ->withBanci($banci);
    }

    public function createKetuaLokaliti()
    {
        return view ('pejabatKesihatan.daftar-ketua-lokaliti');
    }

    public function tahaprisiko()
    {
      $tahaprisiko = tahap_risiko::all();
        return view ('pejabatKesihatan.tahap-risiko')
              ->withTahaprisiko($tahaprisiko);
    }

    public function daftarsoalanbancian()
    {
        return view ('pejabatKesihatan.daftar-soalan-bancian');
    }

    public function storeKetuaLokaliti(CreateUser1Request $request1)
    {
        $user1 = new User([
            'name'          =>          $request1->name,
            'email'         =>          $request1->email,
            'password'      =>          bcrypt($request1->password),
            'KP'            =>          $request1->KP,
            'kumpulan'      =>          '3',
            'jawatan'       =>          'Ketua Lokaliti',
            'status'        =>          'Mendaftar'
        ]);
        $user1->save();

        $customer1 = new KetuaLokaliti([
           'user_id'     => $user1->id,
           'no_tel'      => $request1->telefon,
           'alamat_1'    => $request1->noRumah,
           'alamat_2'    => $request1->namaTaman,
           'alamat_3'    => $request1->namaJalan,
           'poskod'      => $request1->poskod,
           'bandar'      => $request1->bandar,
           'negeri'      => $request1->negeri,
       ]);
       $customer1->save();
        return redirect('/pejabatKesihatan');
    }

    public function createPegawaiVektor()
    {
        return view ('pejabatKesihatan.register-pegawai-vektor');
    }

    public function storePegawaiVektor(CreateUserRequest $request)
    {
        $user = new User([
            'name'          =>          $request->name,
            'email'         =>          $request->email,
            'password'      =>          bcrypt($request->password),
            'KP'            =>          $request->KP,
            'kumpulan'      =>          '5',
            'jawatan'       =>          'Pegawai Vektor',
            'status'        =>          'Mendaftar'
        ]);
        $user->save();

        $customer = new PegawaiVektor([
           'user_id'     => $user->id,
           'no_tel'      => $request->telefon,
           'alamat_1'    => $request->noRumah,
           'alamat_2'    => $request->namaTaman,
           'alamat_3'    => $request->namaJalan,
           'poskod'      => $request->poskod,
           'bandar'      => $request->bandar,
           'negeri'      => $request->negeri,
           'no_pekerja'  => $request->noPekerja,
       ]);
       $customer->save();

        return redirect('/pejabatKesihatan');
    }

    public function ubahKataLaluan($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pejabatKesihatan::find($id);
        return view ('pejabatKesihatan.ubah-kata-laluan')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskinikatalaluan(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|max:20',
        ]);

      $user = User::find($id);

      $user->update([
            'password' => bcrypt($request->password),
        ]);

      return redirect('/pejabatKesihatan');
    }

    public function buangpengguna($id)
    {
        $hapus_user = User::where('id', '=', $id)->delete();
        $hapus_PK = pejabatKesihatan::where('user_id', '=', $id)->delete();
        $hapus_KL = ketuaLokaliti::where('user_id', '=', $id)->delete();
        $hapus_Pembanci = pembanci::where('user_id', '=', $id)->delete();
        $hapus_PV = pegawaiVektor::where('user_id', '=', $id)->delete();

        return redirect('/pejabatKesihatan');
    }

    public function buangperumahan($id)
    {
        $hapus_perumahan = perumahan::where('id', '=', $id)->delete();
        return redirect('/pejabatKesihatan');
    }

    public function muatnaiksoalan(Request $request2)
    {
                $this->validate($request2, [
                  'file'                      => 'required|mimes:png,image_size:300,300',
            ]);

            $soalan = new bancian;

            $soalan->tempat_diperiksa            = Input::get('tempat_diperiksa');
            $soalan->soalan_1                    = Input::get('soalan_pertama');
            $soalan->soalan_2                    = Input::get('soalan_kedua');
            $soalan->soalan_3                    = Input::get('soalan_ketiga');
            $soalan->soalan_4                    = Input::get('soalan_keempat');
            $soalan->soalan_5                    = Input::get('soalan_kelima');
            $soalan->status                      = 'Aktif';

            $soalan->save();

            if(Input::hasFile('file'))
            {
                  $imageName = $soalan->id . '.' .
                  $request2->file('file')->getClientOriginalExtension();
                  $request2->file('file')->move('eAedesEx/images/', $imageName);

                  // redirect('/pejabatKesihatan');
            }
            return redirect('/pejabatKesihatan');
    }

    public function daftarisiko(Request $request3)
    {
        $this->validate($request3, [
                  'keterangan'   => 'required|max:30',
                  'tahap'        => 'required|numeric',
                  'warna'        => 'required|max:10',
            ]);

            $risiko = new tahap_risiko;

            $risiko->keterangan            = Input::get('keterangan');
            $risiko->nilai                 = Input::get('tahap');
            $risiko->warna                 = Input::get('warna');

            $risiko->save();

            return redirect('/tahap-risiko');
    }

    public function kemaskinitahaprisiko($id)
    {
        $tahaprisiko = tahap_risiko::all();
        $kemastahaprisiko = tahap_risiko::find($id);
        return view ('pejabatKesihatan.kemaskini-tahap-risiko')
                ->withTahaprisiko($tahaprisiko)
                ->withKemastahaprisiko($kemastahaprisiko);
    }

    public function daftarnota(Request $request6)
    {
        $this->validate($request6, [
                  'mesej'       => 'required|max:250',
                  'sasaran'     => 'required|max:30',
            ]);

            $note = new nota;

            $note->mesej            = Input::get('mesej');
            $note->sasaran          = Input::get('sasaran');

            $note->save();

            return redirect('/nota');
    }

     public function update(Request $request, $id)
     {
         $this->validate($request, [
             'nama'         => 'required|max:50',
             'email'        => 'required|email|max:50',
             'no_KP'        => 'required|numeric',
             'status'       => 'required|max:15',
             'jawatan'      => 'required|max:30',
             'no_tel'       => 'required|numeric',
             'no_rumah'     => 'required|max:10',
             'taman_rumah'  => 'required|max:30',
             'jalan_rumah'  => 'required|max:30',
             'poskod'       => 'required|numeric',
             'bandar'       => 'required|max:20',
             'negeri'       => 'required|max:50',
             'no_pekerja'   => 'required|max:20',
         ]);

       $user = User::find($id);

       $user->update([
             'name'          => $request->nama,
             'email'         => $request->email,
             'KP'            => $request->no_KP,
             'status'        => $request->status,
             'jawatan'       => $request->jawatan,
         ]);

       $user->pejabatKesihatan()->update([
             'no_tel'        => $request->no_tel,
             'alamat_1'      => $request->no_rumah,
             'alamat_2'      => $request->taman_rumah,
             'alamat_3'      => $request->jalan_rumah,
             'poskod'        => $request->poskod,
             'bandar'        => $request->bandar,
             'negeri'        => $request->negeri,
             'no_pekerja'    => $request->no_pekerja,
         ]);

       return redirect('/pejabatKesihatan');
     }

     public function kemaskinisoalanbancian(Request $request, $id)
     {
       $kemaskinisoalanbancian = bancian::find($id);

       $kemaskinisoalanbancian->update([
             'tempat_diperiksa'    => $request->tempat_diperiksa,
             'soalan_1'            => $request->soalan_1,
             'soalan_2'            => $request->soalan_2,
             'soalan_3'            => $request->soalan_3,
             'soalan_4'            => $request->soalan_4,
             'soalan_5'            => $request->soalan_5,
             'status'              => $request->status,
         ]);

       return redirect('/pejabatKesihatan');
     }

     public function kemaskinirisiko(Request $request5, $id)
     {
       $kemaskinirisiko = tahap_risiko::find($id);

       $kemaskinirisiko->update([
             'keterangan'    => $request5->keterangan,
             'nilai'         => $request5->tahap,
             'warna'         => $request5->warna,
         ]);

       return redirect('/tahap-risiko');
     }

     public function jadualtindakan()
     {
      //  $jwpnbancian = jawapan_bancian::groupBy('tarikh_mula')->get();
      $risikokawasan = risiko::all();

         return view ('pejabatKesihatan.daftar-jadual-tindakan')
                    ->withRisikokawasan($risikokawasan);
     }

     public function daftarjadualtindakan($id)
     {
       $dftrkawalan = jawapan_bancian::where('kawasan_id', $id)->first();
       $pegawaivektor = User::where('kumpulan', '5')->get();
       $kwsndftrkawalan = kawasan::where('id', $dftrkawalan->kawasan_id)->first();

         return view ('pejabatKesihatan.daftar-tindakan')
                    ->withDftrkawalan($dftrkawalan)
                    ->withPegawaivektor($pegawaivektor)
                    ->withkwsndftrkawalan($kwsndftrkawalan);
     }

     public function senaraitindakan()
     {
       $tindakan = jadual_tindakan::all();
         return view ('pejabatKesihatan.senarai-tindakan')
                    ->withTindakan($tindakan);
     }

     public function nota()
     {
        $senarainota = Nota::all();
         return view ('pejabatKesihatan.nota')
                  ->withSenarainota($senarainota);
     }

     public function kemaskinisenarainota($id)
     {
         $notasenarai1 = Nota::all();
         $notasenarai = Nota::find($id);
         return view ('pejabatKesihatan.kemaskini-nota')
                 ->withNotasenarai1($notasenarai1)
                 ->withNotasenarai($notasenarai);
     }

     public function kemaskininota(Request $request7, $id)
     {
       $kemaskininota = Nota::find($id);

       $kemaskininota->update([
             'mesej'      => $request7->mesej,
             'sasaran'    => $request7->sasaran,
         ]);

       return redirect('/nota');
     }

     public function buangnota($id)
     {
         $hapus_nota = Nota::where('id', '=', $id)->delete();

         return redirect('/pejabatKesihatan');
     }

     public function daftarperumahanbaru(Request $request8)
     {
       if(perumahan::where('nama', $request8->name)->first())
       {
         Session::flash('msg', 'Maklumat perumahan telah didaftarkan dengan seorang Ketua Lokaliti. Sila pilih perumahan yang lain. Terima kasih.');
          return redirect('/pejabatKesihatan');
       }
       else {
         $namakl = User::where('name', $request8->ketua_lokaliti)->first();

         $perumahan = new perumahan([
             'nama'                =>          $request8->name,
             'bandar'              =>          $request8->city,
             'negeri'              =>          $request8->state,
             'ketualokaliti_id'    =>          $namakl->id,
         ]);
         $perumahan->save();
         return redirect('/pejabatKesihatan');
       }
     }

     public function kemaskiniperumahan($id)
     {
         $perumahan1 = perumahan::find($id);
         $perumahan2 = perumahan::find($id);
         $userperumahan = User::where('id', $perumahan2->ketualokaliti_id)->first();

         return view ('pejabatKesihatan.kemaskini-perumahan')
                 ->withPerumahan1($perumahan1)
                 ->withUserperumahan($userperumahan);
     }

     public function kemasrumahbaru(Request $request9, $id)
     {
       $kemasperumahan = perumahan::find($id);
       $userrumah = User::where('name', $request9->ketua_lokaliti)->first();

       $kemasperumahan->update([
             'nama'           => $request9->name,
             'bandar'         => $request9->city,
             'negeri'         => $request9->state,
             'ketuaLokaliti'  => $userrumah->id,
         ]);
       return redirect('/pejabatKesihatan');
     }

     public function daftarkawalan(Request $request4)
     {
        $namataman = kawasan::where('nama', $request4->nama_taman)->first();
        $userkawalan = User::where('name', $request4->pegawai_vektor)->first();

        $this->validate($request4, [
            'tindakan'    => 'after:yesterday',
        ]);

         $jadualTindakan = new jadual_tindakan([
             'kawasan_id'          =>          $namataman->id,
             'pegawaiVektor_id'    =>          $userkawalan->id,
             'mesej'               =>          $request4->nota,
             'tarikh_mula'         =>          $request4->tindakan,
             'status'              =>          'Dihantar',
         ]);

         DB::table('jadual_bancians')->where('kawasan_id', $namataman->id)->update(['status' => 'Aktiviti Semburan Sedang Dijalankan']);

         $jadualTindakan->save();

        //  $hapus_kawasan_bancian = jawapan_bancian::where('kawasan_bancian', '=', $request4->nama_taman)->delete();
        //  $hapus_jadual_bancian  = jadual_bancian::where('kawasan_bancian', '=', $request4->nama_taman)->delete();
        //  $hapus_kawasan         = kawasan::where('nama', '=', $request4->nama_taman)->delete();

         return redirect('/pejabatKesihatan');
     }

     public function laporankawasan()
     {
       $jwpnbancian = jawapan_bancian::all();
       $lprnperumahan = perumahan::all();

         return view ('pejabatKesihatan.laporan-kawasan')
                    ->withJwpnbancian($jwpnbancian)
                    ->withLprnperumahan($lprnperumahan);
     }

     public function laporanperumahan()
     {
         $state_id = Input::get('perumahan');
         $perumahan_id1 = perumahan::where('nama', $state_id)->first();
         $subcategories = kawasan::where('perumahan_id', $perumahan_id1->id)->orderBy('nama', 'asc')->get();

         return Response::json($subcategories);
     }

     public function laporankawasanrisiko()
     {
         $perumahanrisiko = Input::get('perumahan');
         $kawasan = Input::get('kawasan');
         $final = kawasan::where('nama', $kawasan)->first();
         $finalsend = jadual_bancian::where('kawasan_id', $final->id)->get();
         $peratusrisiko = risiko::where('kawasan_id', $final->id)->first();

         if($peratusrisiko->keputusan_bancian <= 40)
         {
           $warna = "#00FF00";
         } else if($peratusrisiko->keputusan_bancian <= 70)
         {
           $warna = "#FDFD03";
         } else if($peratusrisiko->keputusan_bancian <= 90)
         {
           $warna = "#FD5203";
         } else if($peratusrisiko->keputusan_bancian <= 100)
         {
           $warna = "#AF050E";
         }

         return view ('pejabatKesihatan.laporan-kawasan-risiko')
                    ->withFinalsend($finalsend)
                    ->withPerumahanrisiko($perumahanrisiko)
                    ->withKawasan($kawasan)
                    ->withFinal($final)
                    ->withWarna($warna);
     }

     public function laporansoalan()
     {
       $lprnkawasan = kawasan::all();

         return view ('pejabatKesihatan.laporan-soalan')
                    ->withLprnkawasan($lprnkawasan);
     }

     public function laporansoalanpenuh()
     {
       $kawasan = Input::get('kawasan');
       $tahun = Input::get('tahun');
       $kawasanid = kawasan::where('nama', $kawasan)->first();

       $tahun1 = jawapan_bancian::whereRaw('YEAR(tarikh_mula) = ?',[$tahun])->get();
      $tarikhbanci = jadual_bancian::where('kawasan_id', $kawasanid->id)->first();

       if($tahun1->first()) //!$result->isEmpty(), $result->count(), count($result) -> boleh juga guna
       {
           for ($i = 0; $i < 20; $i++)
           {
              if($i == 0)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q1_1 + q1_2'));
              } else
              if($i == 1)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q2_1 + q2_2'));
              } else
              if($i == 2)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q3_1 + q3_2'));
              } else
              if($i == 3)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q4_1 + q4_2'));
              } else
              if($i == 4)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q5_1 + q5_2 + q5_3'));
              } else
              if($i == 5)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q6_1 + q6_2'));
              } else
              if($i == 6)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q7_1 + q7_2 + q7_3'));
              } else
              if($i == 7)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q8_1 + q8_2 + q8_3'));
              } else
              if($i == 8)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q9_1 + q9_2 + q9_3 + q9_4 + q9_5'));
              } else
              if($i == 9)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q10_1 + q10_2 + q10_3'));
              } else
              if($i == 10)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q11_1'));
              } else
              if($i == 11)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q12_1 + q12_2 + q12_3'));
              } else
              if($i == 12)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q13_1 + q13_2'));
              } else
              if($i == 13)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q14_1 + q14_2 + q14_3'));
              } else
              if($i == 14)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q15_1'));
              } else
              if($i == 15)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q16_1 + q16_2'));
              } else
              if($i == 16)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q17_1'));
              } else
              if($i == 17)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q18_1'));
              } else
              if($i == 18)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q19_1 + q19_2'));
              } else
              if($i == 19)
              {
                  $questioncount[$i] = jawapan_bancian::where('tarikh_mula',$tahun)->sum(DB::raw('q20_1 + q20_2'));
              }
           }
           return view('pejabatKesihatan.laporan-soalan-bancian', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan'));
        } else
        {
          return view('pejabatKesihatan.tiada-laporan-bancian', compact('kawasan', 'jbanci', 'tahun', 'bulan'));
        }
     }

     public function laporanbulanan()
     {
       $lprnkawasan = kawasan::all();

         return view ('pejabatKesihatan.laporan-bulanan')
                    ->withLprnkawasan($lprnkawasan);
     }

     public function laporanbulananpenuh()
     {
       $kawasan = Input::get('kawasan');
       $tahun = Input::get('tahun');
       $kawasanid = kawasan::where('nama', $kawasan)->first();

       $tahapsederhana = tahap_risiko::where('keterangan', 'Sederhana')->first();
       $tahapbahaya = tahap_risiko::where('keterangan', 'Bahaya')->first();
       $tahapsangatbahaya = tahap_risiko::where('keterangan', 'Sangat Bahaya')->first();
       $tahun1 = jawapan_bancian::whereRaw('YEAR(tarikh_mula) = ?',[$tahun])->get();
       $statusjbancian = jadual_bancian::where('kawasan_id', $kawasanid->id)->first();
       $jbanci = jadual_bancian::all();

       if($tahun1->first()) //!$result->isEmpty(), $result->count(), count($result) -> boleh juga guna
       {
          for ($i=0; $i < 12; $i++)
          {
            $questioncount[$i] = risiko::where(DB::raw('MONTH(tarikh_mula)'), '=', $i+1)
                                        ->where('kawasan_id', $kawasanid->id)
                                        ->sum(DB::raw('soalan_dijawab / jumlah_soalan * 100'));
            if($questioncount[$i] < 40)
            {
              $colorFill[$i] = "#00FF00";
              $colorStroke[$i] = "#008000";
            } else
            if($questioncount[$i] > 40)
            {
              $colorFill[$i] = "#AF050E";
              $colorStroke[$i] = "#EF222C";
            }
          }
              return view('pejabatKesihatan.laporan-bulanan-soalan-bancian', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan', 'colorFill', 'colorStroke'));
        } else
        if($questioncount < 40)
        {
          $colorFill = "#AF050E";
          $colorStroke = "#EF222C";
            return view('pejabatKesihatan.tiada-laporan-bulanan', compact('kawasan' , 'tahun'));
        } else if($questioncount > 40)
        {
          $colorFill = "#AF050E";
          $colorStroke = "#EF222C";
            return view('pejabatKesihatan.tiada-laporan-bulanan', compact('kawasan' , 'tahun'));
        }
     }

     public function categoryDropDownData()
     {
         $state_id = Input::get('kawasan');
         $user_id1 = kawasan::where('nama', $state_id)->first();
         $subcategories = jawapan_bancian::where('kawasan_id', $user_id1->id)->orderBy('tarikh_mula', 'asc')->groupBy('tarikh_mula')->get();

         return Response::json($subcategories);
     }
}
