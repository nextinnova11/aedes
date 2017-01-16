<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\pembanci;
use App\User;
use App\nota;
use App\jadual_bancian;
use Auth;
use App\kawasan;
use DB;
use App\risiko;
use App\tahap_risiko;
use Illuminate\Support\Facades\Input;

class PembanciController extends Controller
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
      $nota = Nota::where('sasaran', '=', 'Semua')->orWhere('sasaran', 'Pembanci')->get();

        return view ('pembanci.menu-pembanci')
        ->withPejabatkesihatan($pejabatkesihatan)
        ->withKetualokaliti($ketualokaliti)
        ->withPembanci($pembanci)
        ->withPegawaivektor($pegawaivektor)
        ->withNota($nota);
    }

    public function profil($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pembanci::where('user_id', $id)->get();
        return view ('pembanci.profile-pembanci')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskiniProfile($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pembanci::where('user_id', $id)->get();
        return view ('pembanci.kemaskini-profil-pembanci')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function update(Request $request, $id)
    {
      $pejabatkesihatan = User::where('kumpulan', '=', '2')->count('kumpulan');
      $ketualokaliti = User::where('kumpulan', '=', '3')->count('kumpulan');
      $pembanci = User::where('kumpulan', '=', '4')->count('kumpulan');
      $pegawaivektor = User::where('kumpulan', '=', '5')->count('kumpulan');

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

      $user->pembanci()->update([
            'no_tel'        => $request->no_tel,
            'alamat_1'      => $request->no_rumah,
            'alamat_2'      => $request->taman_rumah,
            'alamat_3'      => $request->jalan_rumah,
            'poskod'        => $request->poskod,
            'bandar'        => $request->bandar,
            'negeri'        => $request->negeri,
        ]);

      return redirect('/pembanci');
    }

    public function ubahKataLaluan($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pembanci::find($id);
        return view ('pembanci.ubah-kata-laluan')
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

      return redirect('/pembanci');
    }

    public function senaraibancian()
    {
        $senaraijadualbancian = jadual_bancian::where('pembanci_id', Auth::user()->id)->get();
        $namapembanci = User::where('id', Auth::user()->id)->first();
        $kawasanbancian = kawasan::where('user_id', Auth::user()->id)->first();

        return view ('pembanci.senarai-jadual-bancian')
                    ->withSenaraijadualbancian($senaraijadualbancian)
                    ->withNamapembanci($namapembanci)
                    ->withKawasanbancian($kawasanbancian);
    }

    public function kemaskiniBancian($id)
    {
        $jadualbancian = jadual_bancian::where('id', $id)->get();
        $namapembanci1 = User::where('id', Auth::user()->id)->first();
        $kawasanbancian1 = kawasan::where('user_id', Auth::user()->id)->first();
        return view ('pembanci.kemaskini-bancian')
                ->withJadualbancian($jadualbancian)
                ->withNamapembanci1($namapembanci1)
                ->withKawasanbancian1($kawasanbancian1);
    }

    public function updatebancian(Request $request2, $id)
    {
      $jbancian = jadual_bancian::find($id);
      $namepembanci = User::where('name', $request2->pembanci)->first();
      $kwsnbanci = kawasan::where('nama', $request2->kawasan)->first();
      $statustahaprisiko = tahap_risiko::where('keterangan', '=', 'Sederhana')->first();

      $jumlKptsnBancian = DB::table('jawapan_bancians')
      ->selectRaw('sum(q1_1 + q1_2 + q2_1 + q2_2 + q3_1 + q3_2 + q4_1 + q4_2 + q5_1 + q5_2 + q5_3 + q6_1 + q6_2 + q7_1 + q7_2 + q7_3 + q8_1 + q8_2 + q8_3 + q9_1 + q9_2 + q9_3 + q9_4 + q9_5 + q10_1 + q10_2 + q10_3 + q11_1 + q12_1 + q12_2 + q12_3 + q13_1 + q13_2 + q14_1 + q14_2 + q14_3 + q15_1 + q16_1 + q16_2 + q17_1 + q18_1 + q19_1 + q19_2 + q20_1 + q20_2) as sum')
      ->where('kawasan_id', $kwsnbanci->id)
      ->where('tarikh_mula', Input::get('mula'))
      ->lists('sum');

      $jumlKptsnBancianPercentage = DB::table('jawapan_bancians')
      ->selectRaw('count(q1_1 + q1_2 + q2_1 + q2_2 + q3_1 + q3_2 + q4_1 + q4_2 + q5_1 + q5_2 + q5_3 + q6_1 + q6_2 + q7_1 + q7_2 + q7_3 + q8_1 + q8_2 + q8_3 + q9_1 + q9_2 + q9_3 + q9_4 + q9_5 + q10_1 + q10_2 + q10_3 + q11_1 + q12_1 + q12_2 + q12_3 + q13_1 + q13_2 + q14_1 + q14_2 + q14_3 + q15_1 + q16_1 + q16_2 + q17_1 + q18_1 + q19_1 + q19_2 + q20_1 + q20_2) as sum')
      ->where('kawasan_id', $kwsnbanci->id)
      ->where('tarikh_mula', Input::get('mula'))
      ->lists('sum');

      $jumlKptsnBancian1            = implode($jumlKptsnBancian);
      $jumlKptsnBancianPercentage1  = implode($jumlKptsnBancianPercentage) * 45;
      $jumlrisiko                   = $jumlKptsnBancian1 / $jumlKptsnBancianPercentage1 * 100;
      // $tarikhbancian = jadual_bancian::where('kawasan_id', $kwsnbanci->id)->orderby('created_at', 'desc')->first();

      $risiko = new risiko([
        'kawasan_id'        =>  $kwsnbanci->id,
        'tarikh_mula'       =>  Input::get('mula'),
        'soalan_dijawab'    =>  $jumlKptsnBancian1,
        'jumlah_soalan'     =>  $jumlKptsnBancianPercentage1,
        'keputusan_bancian' =>  $jumlrisiko,
      ]);

      $risiko->save();

      if($jumlrisiko < $statustahaprisiko->nilai)
      {
          $jbancian->update([
                'pembanci_id'     => $namepembanci->id,
                'kawasan_id'      => $kwsnbanci->id,
                'tarikh_mula'     => $request2->mula,
                'tarikh_akhir'    => $request2->akhir,
                'status'          => $request2->status,
            ]);
      }else {
        $jbancian->update([
              'pembanci_id'     => $namepembanci->id,
              'kawasan_id'      => $kwsnbanci->id,
              'tarikh_mula'     => $request2->mula,
              'tarikh_akhir'    => $request2->akhir,
              'status'          => "Aktiviti Penyemburan Diperlukan",
          ]);
      }

      return redirect('/senarai-bancian-pembanci');
    }
}
