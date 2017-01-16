<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\pegawaiVektor;
use App\User;
use App\nota;
use App\jadual_tindakan;
use Auth;
use DB;
use App\kawasan;

class PegawaiVektorController extends Controller
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
      $nota = Nota::where('sasaran', '=', 'Semua')->orWhere('sasaran', 'Pegawai Vektor')->get();

        return view ('pegawaiVektor.menu-pegawai-vektor')
        ->withPejabatkesihatan($pejabatkesihatan)
        ->withKetualokaliti($ketualokaliti)
        ->withPembanci($pembanci)
        ->withPegawaivektor($pegawaivektor)
        ->withNota($nota);
    }

    public function profil($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pegawaiVektor::where('user_id', $id)->get();
        return view ('pegawaiVektor.profile-pegawai-vektor')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function kemaskiniProfile($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pegawaiVektor::where('user_id', $id)->get();
        return view ('pegawaiVektor.kemaskini-profil-pv')
                ->withPengguna1($pengguna1)
                ->withPengguna2($pengguna2);
    }

    public function ubahKataLaluan($id)
    {
        $pengguna1 = User::find($id);
        $pengguna2 = pegawaiVektor::find($id);
        return view ('pegawaiVektor.ubah-kata-laluan')
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

      return redirect('/pegawaiVektor');
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

       $user->pegawaiVektor()->update([
             'no_tel'        => $request->no_tel,
             'alamat_1'      => $request->no_rumah,
             'alamat_2'      => $request->taman_rumah,
             'alamat_3'      => $request->jalan_rumah,
             'poskod'        => $request->poskod,
             'bandar'        => $request->bandar,
             'negeri'        => $request->negeri,
             'no_pekerja'    => $request->no_pekerja,
         ]);

       return redirect('/pegawaiVektor');
     }

     public function senaraitindakan()
     {
         $senaraitindakan = jadual_tindakan::where('pegawaiVektor_id', '=', Auth::user()->id)->get();

         return view ('pegawaiVektor.senarai-jadual-tindakan')
                     ->withSenaraitindakan($senaraitindakan);
     }

     public function semburan($id)
     {
         DB::table('jadual_tindakans')->where('id', $id)->update(['status' => 'Dalam Proses']);

         $senaraitindakan = jadual_tindakan::where('pegawaiVektor_id', '=', Auth::user()->id)->get();
         $senaraitindakan1 = jadual_tindakan::where('pegawaiVektor_id', '=', Auth::user()->id)->first();
         $tamantindakan = kawasan::where('id', $senaraitindakan1->kawasan_id)->first();

         return view ('pegawaiVektor.details-tindakan')
                      ->withSenaraitindakan($senaraitindakan)
                      ->withTamantindakan($tamantindakan);
      }

      public function kemaskiniJadualTindakan($id)
      {
          $jadualtindakan = jadual_tindakan::where('id', $id)->get();
          $jadualtindakan1 = jadual_tindakan::find($id);
          $namataman = kawasan::where('id', $jadualtindakan1->kawasan_id)->first();
          $pegawai = User::where('id', Auth::user()->id)->first();

          return view ('pegawaiVektor.kemaskini-tindakan')
                  ->withJadualtindakan($jadualtindakan)
                  ->withNamataman($namataman)
                  ->withPegawai($pegawai);
      }

      public function updatetindakan(Request $request1, $id)
      {
        $jtindakan = jadual_tindakan::find($id);
        $tamankemaskini = kawasan::where('nama', $request1->taman)->first();
        $userkemaskini = User::where('name', $request1->pegawai)->first();

        $jtindakan->update([
              'kawasan_id'        => $tamankemaskini->id,
              'pegawaiVektor_id'  => $userkemaskini->id,
              'mesej'             => $request1->mesej,
              'tarikh_mula'       => $request1->mula,
              'status'            => $request1->status,
          ]);

          DB::table('jadual_bancians')->where('kawasan_id', $tamankemaskini->id)->update(['status' => 'Aktiviti Semburan Selesai']);

        return redirect('/pegawaiVektor');
      }
}
