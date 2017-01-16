<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\admin;
use App\pejabatKesihatan;
use App\pembanci;
use AppegawaiVektor;
use App\bancian;
use App\tahap_risiko;
use App\Nota;
use App\perumahan;
use App\jadual_tindakan;
use App\kawasan;
use App\jawapan_bancian;
use App\jadual_bancian;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateUserRequest;
use DB;
use App\risiko;

class AdminController extends Controller
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
        $nota = Nota::all();

        return view ('admin.menu-admin')
                ->withPejabatkesihatan($pejabatkesihatan)
                ->withKetualokaliti($ketualokaliti)
                ->withPembanci($pembanci)
                ->withPegawaivektor($pegawaivektor)
                ->withNota($nota);
    }

    public function semak()
    {
        $pengguna = User::all();
        return view ('admin.semak_permohonan')
                    ->withPengguna($pengguna);
    }

    public function semakperumahan()
    {
        $perumahan = perumahan::all();
        return view ('admin.semak_permohonan_perumahan')
                    ->withPerumahan($perumahan);
    }

    public function profil($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = admin::find($id);
        return view ('admin.profile')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskiniProfile($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = admin::where('user_id', $id)->get();
        return view ('admin.kemaskini')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function ubahKataLaluan($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = admin::find($id);
        return view ('admin.ubah-kata-laluan')
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
            'no_pekerja'  => 'required|max:20',
        ]);

      $user = User::find($id);

      $user->update([
            'name'          => $request->nama,
            'email'         => $request->email,
            'KP'            => $request->no_KP,
            'status'        => $request->status,
            'jawatan'       => $request->jawatan,
        ]);

      $user->admin()->update([
            'no_tel'        => $request->no_tel,
            'alamat_1'      => $request->no_rumah,
            'alamat_2'      => $request->taman_rumah,
            'alamat_3'      => $request->jalan_rumah,
            'poskod'        => $request->poskod,
            'bandar'        => $request->bandar,
            'negeri'        => $request->negeri,
            'no_pekerja'    => $request->no_pekerja,
        ]);

      return redirect('/admin');
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

      return redirect('/admin');
    }

    public function senaraisoalanbancian()
    {
        $bancian = bancian::all();
        return view ('admin.senarai_soalan-bancian')
                  ->withBancian($bancian);
    }

    public function create()
    {
        return view ('admin.register');
    }

     public function store(CreateUserRequest $request)
     {
         $user = new User([
             'name'          =>          $request->name,
             'email'         =>          $request->email,
             'password'      =>          bcrypt($request->password),
             'KP'            =>          $request->KP,
             'kumpulan'      =>          '2',
             'jawatan'       =>          'Pejabat Kesihatan',
             'status'        =>          'Mendaftar'
         ]);
         $user->save();

         $customer = new PejabatKesihatan([
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

         return redirect('/admin');
     }

     public function tahaprisiko()
     {
       $tahaprisiko = tahap_risiko::all();
         return view ('admin.tahap-risiko')
               ->withTahaprisiko($tahaprisiko);
     }

     public function nota()
     {
        $senarainota = Nota::all();
         return view ('admin.nota')
                  ->withSenarainota($senarainota);
     }
     public function kemaskinisenarainota($id)
     {
         $notasenarai1 = Nota::all();
         $notasenarai = Nota::find($id);
         return view ('admin.kemaskini-nota')
                 ->withNotasenarai1($notasenarai1)
                 ->withNotasenarai($notasenarai);
     }

     public function buangnota($id)
     {
         $hapus_nota = Nota::where('id', '=', $id)->delete();

         return redirect('/admin');
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

             return redirect('/admin');
     }

     public function kemaskininota(Request $request7, $id)
     {
       $kemaskininota = Nota::find($id);

       $kemaskininota->update([
             'mesej'      => $request7->mesej,
             'sasaran'    => $request7->sasaran,
         ]);

       return redirect('/admin');
     }

     public function senaraitindakan()
     {
         $senaraitindakan = jadual_tindakan::all();
         return view ('admin.senarai-jadual-tindakan')
                     ->withSenaraitindakan($senaraitindakan);
     }

     public function senaraikawasan()
     {
         $kawasan = kawasan::all();
         return view ('admin.senarai_kawasan')
                     ->withKawasan($kawasan);
     }

     public function laporankawasan()
     {
       $jwpnbancian = jawapan_bancian::all();
       $lprnperumahan = perumahan::all();

         return view ('admin.laporan-kawasan-admin')
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

         return view ('admin.laporan-kawasan-risiko-admin')
                    ->withFinalsend($finalsend)
                    ->withPerumahanrisiko($perumahanrisiko)
                    ->withKawasan($kawasan)
                    ->withFinal($final)
                    ->withWarna($warna);
     }

     public function laporansoalan()
     {
       $lprnkawasan = kawasan::all();

         return view ('admin.laporan-soalan-admin')
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
           return view('admin.laporan-soalan-bancian-admin', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan'));
        } else
        {
          return view('admin.tiada-laporan-bancian-admin', compact('kawasan', 'jbanci', 'tahun', 'bulan'));
        }
     }

     public function laporanbulanan()
     {
       $lprnkawasan = kawasan::all();

         return view ('admin.laporan-bulanan-admin')
                    ->withLprnkawasan($lprnkawasan);
     }

     public function laporanbulananpenuh()
     {
       $kawasan = Input::get('kawasan');
       $tahun = Input::get('tahun');
       $kawasanid = kawasan::where('nama', $kawasan)->first();

       $statusjbancian = jadual_bancian::where('kawasan_id', $kawasanid->id)->first();

       $tahapsederhana = tahap_risiko::where('keterangan', 'Sederhana')->first();
       $tahapbahaya = tahap_risiko::where('keterangan', 'Bahaya')->first();
       $tahapsangatbahaya = tahap_risiko::where('keterangan', 'Sangat Bahaya')->first();

       $tahun1 = jawapan_bancian::whereRaw('YEAR(created_at) = ?',[$tahun])->get();
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
              return view('admin.laporan-bulanan-soalan-bancian-admin', compact('questioncount', 'kawasan', 'jbanci', 'tahun', 'bulan', 'colorFill', 'colorStroke'));
        } else
        if($questioncount < 40)
        {
          $colorFill = "#AF050E";
          $colorStroke = "#EF222C";
            return view('admin.tiada-laporan-bulanan-admin', compact('kawasan' , 'tahun'));
        } else if($questioncount > 40)
        {
          $colorFill = "#AF050E";
          $colorStroke = "#EF222C";
            return view('admin.tiada-laporan-bulanan-admin', compact('kawasan' , 'tahun'));
        }

     }
}
