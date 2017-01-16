<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\ketuaLokaliti;
use App\pejabatkesihatan;
use App\pembanci;
use App\kawasan;
use App\perumahan;
use App\pegawaiVektor;
use App\nota;
use DB;
use Auth;
use App\jawapan_bancian;
use App\jadual_bancian;
use App\tahap_risiko;
use App\risiko;
use Cartalyst\Alerts\Native\Facades\Alert;
use App\Http\Requests\CreateUser2Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Session;

class KetuaLokalitiController extends Controller
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
      $nota = Nota::where('sasaran', '=', 'Semua')->orWhere('sasaran', 'Ketua Lokaliti')->get();
      $jumlahkawasan = kawasan::all()->count('nama');

      return view ('ketuaLokaliti.menu-ketua-lokaliti')
                ->withPejabatkesihatan($pejabatkesihatan)
                ->withKetualokaliti($ketualokaliti)
                ->withPembanci($pembanci)
                ->withPegawaivektor($pegawaivektor)
                ->withNota($nota)
                ->withJumlahkawasan($jumlahkawasan);
    }

    public function profil($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = ketuaLokaliti::where('user_id', $id)->get();
        return view ('ketuaLokaliti.profile-ketua-lokaliti')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskiniProfile($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = ketuaLokaliti::where('user_id', $id)->get();
        return view ('ketuaLokaliti.kemaskini-profil-KL')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'        => 'required|max:50',
            'email'       => 'required|email|max:50',
            'no_KP'       => 'required|numeric',
            'status'      => 'required|max:15',
            'jawatan'     => 'required|max:30',
            'no_tel'      => 'required|numeric',
            'no_rumah'    => 'required|max:10',
            'taman_rumah' => 'required|max:30',
            'jalan_rumah' => 'required|max:30',
            'poskod'      => 'required|numeric',
            'bandar'      => 'required|max:20',
            'negeri'      => 'required|max:50',
        ]);

      $user = User::find($id);

      $user->update([
            'name'          => $request->nama,
            'email'         => $request->email,
            'KP'            => $request->no_KP,
            'status'        => $request->status,
            'jawatan'       => $request->jawatan,
        ]);

      $user->ketuaLokaliti()->update([
            'no_tel'        => $request->no_tel,
            'alamat_1'      => $request->no_rumah,
            'alamat_2'      => $request->taman_rumah,
            'alamat_3'      => $request->jalan_rumah,
            'poskod'        => $request->poskod,
            'bandar'        => $request->bandar,
            'negeri'        => $request->negeri,
        ]);

      return redirect('/ketuaLokaliti');
    }

    public function ubahKataLaluan($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = ketuaLokaliti::find($id);
        return view ('ketuaLokaliti.ubah-kata-laluan')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kawasanid = kawasan::all();
        return view ('ketuaLokaliti.register-pembanci')
                ->withKawasanid($kawasanid);
    }

    public function semak()
    {
        $pengguna = User::where('kumpulan', '4')->get();
        return view ('ketuaLokaliti.semak_permohonan')
                    ->withPengguna($pengguna);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser2Request $request)
    {
      $user = new User([
          'name'          =>          $request->name,
          'email'         =>          $request->email,
          'password'      =>          bcrypt($request->password),
          'KP'            =>          $request->KP,
          'kumpulan'      =>          '4',
          'jawatan'       =>          'Pembanci',
          'status'        =>          'Mendaftar'
      ]);
      $user->save();

      $customer = new Pembanci([
         'user_id'     => $user->id,
         'no_tel'      => $request->telefon,
         'alamat_1'    => $request->noRumah,
         'alamat_2'    => $request->namaTaman,
         'alamat_3'    => $request->namaJalan,
         'poskod'      => $request->poskod,
         'bandar'      => $request->bandar,
         'negeri'      => $request->negeri,
     ]);
     $customer->save();
     Session::flash('msg', 'Maklumat Pembanci telah berjaya didaftarkan. Terima kasih.');
      return redirect('/ketuaLokaliti');
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

      return redirect('/ketuaLokaliti');
    }

    public function senaraikawasan()
    {
        $kawasan = kawasan::where('ketuaLokaliti_id', '=', Auth::user()->id)->get();
        return view ('ketuaLokaliti.senarai_kawasan')
                    ->withKawasan($kawasan);
    }

    public function daftarkawasan()
    {
      $pembanci = User::where('kumpulan', '4')->get();
      $perumahan = perumahan::where('ketuaLokaliti_id', '=', Auth::user()->id)->get();
        return view ('ketuaLokaliti.daftar-kawasan')
                ->withPembanci($pembanci)
                ->withPerumahan($perumahan);
    }

    public function daftarkawasanbaru(Request $request9)
    {
      if(kawasan::where('nama', $request9->name)->first())
      {
        Session::flash('msg', 'Maklumat kawasan perumahan telah didaftarkan dengan seorang Pembanci. Sila pilih kawasan perumahan yang lain. Terima kasih.');
         return redirect('/ketuaLokaliti');
      }
      else {
        $perumahan = perumahan::where('nama', $request9->nama_perumahan)->first();
        $userPembanci = User::where('name', $request9->pembanci)->first();

        $kawasan = new kawasan([
            'perumahan_id'     =>          $perumahan->id,
            'nama'             =>          $request9->name,
            'bandar'           =>          $request9->city,
            'negeri'           =>          $request9->state,
            'lat'              =>          $request9->lat,
            'lng'              =>          $request9->lng,
            'ketualokaliti_id' =>          Auth::user()->id,
            'user_id'          =>          $userPembanci->id,
        ]);
        $kawasan->save();
      }
      Session::flash('msg', 'Maklumat kawasan perumahan telah berjaya didaftarkan. Terima kasih');
        return redirect('/senarai-kawasan');
    }

    public function buangkawasan($id)
    {
        $hapus_kawasan = kawasan::where('id', '=', $id)->delete();
        return redirect('/ketuaLokaliti');
    }

    public function calendar()
    {
        $jadualbanci = jadual_bancian::all();
        $kawasanbancian = kawasan::where('ketualokaliti_id', '=', Auth::user()->id)->groupBy('user_id')->get();
        $userbancian = User::all();
        return view ('ketuaLokaliti.calendar')
                ->withKawasanbancian($kawasanbancian)
                ->withJadualbanci($jadualbanci)
                ->withUserbancian($userbancian);
    }

    public function simpan(Request $request10)
    {
      // $kawasan1 = DB::table('kawasans')->where('kawasans.pembanci', $request10->pembanci)->first();
      // dd($kawasan1);
      $this->validate($request10, [
          'mula'    => 'after:yesterday',
          'akhir'   => 'after:mula',
      ]);

      $user_2 = User::where('name',$request10->pembanci)->first();
      $kwsnbancian = kawasan::where('nama', $request10->kawasan)->first();
      $jadualbancian = new jadual_bancian([
          'pembanci_id'       =>          $user_2->id,
          'kawasan_id'        =>          $kwsnbancian->id,
          'tarikh_mula'       =>          $request10->mula,
          'tarikh_akhir'      =>          $request10->akhir,
          'status'            =>          'Dihantar',
      ]);
      $jadualbancian->save();
      Session::flash('msg', 'Maklumat jadual bancian telah berjaya didaftarkan. Terima kasih.');
      return redirect('/senarai-bancian');
    }

    public function senaraibancian()
    {
        $senaraijadualbancian = jadual_bancian::where('status', '=', 'Dihantar')->get();
        $senaraijadualbancian1 = jadual_bancian::where('status', '=', 'Dalam Proses')->get();
        $senaraijadualbancian2 = jadual_bancian::where('status', 'Selesai')->orWhere('status', 'Aktiviti Semburan Selesai')->get();

        return view ('ketuaLokaliti.senarai-jadual-bancian')
                    ->withSenaraijadualbancian($senaraijadualbancian)
                    ->withSenaraijadualbancian1($senaraijadualbancian1)
                    ->withSenaraijadualbancian2($senaraijadualbancian2);
    }

    public function buangjadual($id)
    {
        $hapus_jadual = jadual_bancian::where('id', '=', $id)->delete();
        return redirect('/ketuaLokaliti');
    }

    public function kemaskinikawasan($id)
    {
        $kawasan1 = kawasan::find($id);
        $perumahankemaskini = perumahan::where('id', $kawasan1->perumahan_id)->first();
        $userkemaskini = User::where('id', $kawasan1->user_id)->first();
        return view ('ketuaLokaliti.kemaskini-kawasan')
                ->withKawasan1($kawasan1)
                ->withPerumahankemaskini($perumahankemaskini)
                ->withUserkemaskini($userkemaskini);
    }

    public function kemaskawasanbaru(Request $request11, $id)
    {
      $kemaskawasan = kawasan::find($id);
      $perumahankemaskinibaru = perumahan::where('nama', $request11->perumahan)->first();
      $userkemaskinibaru = User::where('name', $request11->pembanci)->first();

      $kemaskawasan->update([
            'perumahan_id'      => $perumahankemaskinibaru->id,
            'nama'              => $request11->name,
            'bandar'            => $request11->city,
            'negeri'            => $request11->state,
            'ketualokaliti_id'  =>          Auth::user()->id,
            'user_id'           => $userkemaskinibaru->id,
        ]);
        Session::flash('msg', 'Maklumat kawasan perumahan telah berjaya dikemaskini. Terima kasih.');
      return redirect('/senarai-kawasan');
    }

    public function kemaskinikalendar($id)
    {
        $jadualbanci = jadual_bancian::all();
        $jadual1 = jadual_bancian::find($id);
        $usercalendar = User::where('id', $jadual1->pembanci_id)->first();
        $kawasancalendar = kawasan::where('id', $jadual1->kawasan_id)->first();
        return view ('ketuaLokaliti.kemaskini-calendar')
                ->withJadual1($jadual1)
                ->withUsercalendar($usercalendar)
                ->withKawasancalendar($kawasancalendar)
                ->withJadualbanci($jadualbanci);
    }

    public function kemaskalendarbaru(Request $request12, $id)
    {
      $kemaskalendar = jadual_bancian::find($id);
      $usercalendarbaru = User::where('name', $request12->pembanci)->first();
      $kawasancalendarbaru = kawasan::where('nama', $request12->kawasan)->first();

      $kemaskalendar->update([
            'pembanci'          => $usercalendarbaru->id,
            'kawasan_bancian'   => $kawasancalendarbaru->id,
            'tarikh_mula'       => $request12->mula,
            'tarikh_akhir'      => $request12->akhir,
        ]);
        Session::flash('msg', 'Maklumat jadual bancian telah berjaya dikemaskini. Terima kasih.');
        return redirect('/senarai-bancian');
    }

    public function buangpengguna($id)
    {
        $hapus_user = User::where('id', '=', $id)->delete();
        $hapus_PK = pejabatKesihatan::where('user_id', '=', $id)->delete();
        $hapus_KL = ketuaLokaliti::where('user_id', '=', $id)->delete();
        $hapus_Pembanci = pembanci::where('user_id', '=', $id)->delete();
        $hapus_PV = pegawaiVektor::where('user_id', '=', $id)->delete();

        return redirect('/ketuaLokaliti');
    }

    public function categoryDropDownData()
    {
        $state_id = Input::get('pembanci');
        $user_id1 = User::where('name', $state_id)->first();
        $subcategories = kawasan::where('user_id', $user_id1->id)->orderBy('nama', 'asc')->get();

        return Response::json($subcategories);
    }

    public function laporankawasan()
    {
      $jwpnbancian = jawapan_bancian::all();
      $lprnperumahan = perumahan::all();

        return view ('ketuaLokaliti.laporan-kawasan-KL')
                   ->withJwpnbancian($jwpnbancian)
                   ->withLprnperumahan($lprnperumahan);
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

        return view ('ketuaLokaliti.laporan-kawasan-risiko-KL')
                   ->withFinalsend($finalsend)
                   ->withPerumahanrisiko($perumahanrisiko)
                   ->withKawasan($kawasan)
                   ->withFinal($final)
                   ->withWarna($warna);
    }

    public function laporansoalan()
    {
      $lprnkawasan = kawasan::all();

        return view ('ketuaLokaliti.laporan-soalan-KL')
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
          return view('ketuaLokaliti.laporan-soalan-bancian-KL', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan'));
       } else
       {
         return view('ketuaLokaliti.tiada-laporan-bancian-KL', compact('kawasan', 'jbanci', 'tahun', 'bulan'));
       }
    }
    public function laporanbulanan()
    {
      $lprnkawasan = kawasan::all();

        return view ('ketuaLokaliti.laporan-bulanan-KL')
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
          return view('ketuaLokaliti.laporan-bulanan-soalan-bancian-KL', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan', 'colorFill', 'colorStroke'));
       } else
       if($questioncount < 40)
       {
         $colorFill = "#AF050E";
         $colorStroke = "#EF222C";
           return view('pejabatKesihatan.tiada-laporan-bulanan-KL', compact('kawasan' , 'tahun'));
       } else if($questioncount > 40)
       {
         $colorFill = "#AF050E";
         $colorStroke = "#EF222C";
           return view('pejabatKesihatan.tiada-laporan-bulanan-KL', compact('kawasan' , 'tahun'));
       }
         if($statusjbancian->status == "Dalam Proses")
         {
           $colorFill = "#00FF00";
           $colorStroke = "#008000";
             return view('ketuaLokaliti.tiada-laporan-bulanan-KL', compact('kawasan' , 'tahun'));
         }
    }
}
