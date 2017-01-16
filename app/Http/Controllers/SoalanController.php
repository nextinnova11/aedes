<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\bancian;
use App\jadual_bancian;
use DB;
use Auth;
use App\jawapan_bancian;
use App\kawasan;
use App\risiko;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateUser3Request;

class SoalanController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function pertama(Request $request, $id)
  {
      DB::table('jadual_bancians')->where('id', $id)->update(['status' => 'Dalam Proses']);
      $senaraijadualbancian = jadual_bancian::where('pembanci_id', '=', Auth::user()->id)->first();
      $kawasanrumah = kawasan::where('id', $senaraijadualbancian->kawasan_id)->first();

      $soalanbancian1 = bancian::where('id', '=', '1')->first();
      $soalanbancian2 = bancian::where('id', '=', '2')->first();
      $soalanbancian3 = bancian::where('id', '=', '3')->first();
      $soalanbancian4 = bancian::where('id', '=', '4')->first();
      $soalanbancian5 = bancian::where('id', '=', '5')->first();
      $soalanbancian6 = bancian::where('id', '=', '6')->first();
      $soalanbancian7 = bancian::where('id', '=', '7')->first();
      $soalanbancian8 = bancian::where('id', '=', '8')->first();
      $soalanbancian9 = bancian::where('id', '=', '9')->first();
      $soalanbancian10 = bancian::where('id', '=', '10')->first();
      $soalanbancian11 = bancian::where('id', '=', '11')->first();
      $soalanbancian12 = bancian::where('id', '=', '12')->first();
      $soalanbancian13 = bancian::where('id', '=', '13')->first();
      $soalanbancian14 = bancian::where('id', '=', '14')->first();
      $soalanbancian15 = bancian::where('id', '=', '15')->first();
      $soalanbancian16 = bancian::where('id', '=', '16')->first();
      $soalanbancian17 = bancian::where('id', '=', '17')->first();
      $soalanbancian18 = bancian::where('id', '=', '18')->first();
      $soalanbancian19 = bancian::where('id', '=', '19')->first();
      $soalanbancian20 = bancian::where('id', '=', '20')->first();

      return view ('pembanci.soalan-bancian')
                ->withSoalanbancian1($soalanbancian1)
                ->withSoalanbancian2($soalanbancian2)
                ->withSoalanbancian3($soalanbancian3)
                ->withSoalanbancian4($soalanbancian4)
                ->withSoalanbancian5($soalanbancian5)
                ->withSoalanbancian6($soalanbancian6)
                ->withSoalanbancian7($soalanbancian7)
                ->withSoalanbancian8($soalanbancian8)
                ->withSoalanbancian9($soalanbancian9)
                ->withSoalanbancian10($soalanbancian10)
                ->withSoalanbancian11($soalanbancian11)
                ->withSoalanbancian12($soalanbancian12)
                ->withSoalanbancian13($soalanbancian13)
                ->withSoalanbancian14($soalanbancian14)
                ->withSoalanbancian15($soalanbancian15)
                ->withSoalanbancian16($soalanbancian16)
                ->withSoalanbancian17($soalanbancian17)
                ->withSoalanbancian18($soalanbancian18)
                ->withSoalanbancian19($soalanbancian19)
                ->withSoalanbancian20($soalanbancian20)
                ->withSenaraijadualbancian($senaraijadualbancian)
                ->withKawasanrumah($kawasanrumah);
  }

  public function jawapan(Request $request)
  {
    if(!empty(Input::get('q1_1')))
    {
      $q1_1  = '1';
    }else {
      $q1_1  = '0';
    }
    if(!empty(Input::get('q1_2')))
    {
        $q1_2  = '1';
    }else {
        $q1_2  = '0';
    }
    if(!empty(Input::get('q2_1')))
    {
        $q2_1  = '1';
    }else {
        $q2_1  = '0';
    }
    if(!empty(Input::get('q2_2')))
    {
        $q2_2  = '1';
    }else {
        $q2_2  = '0';
    }
    if(!empty(Input::get('q3_1')))
    {
        $q3_1  = '1';
    }else {
        $q3_1  = '0';
    }
    if(!empty(Input::get('q3_2')))
    {
        $q3_2  = '1';
    }else {
        $q3_2  = '0';
    }
    if(!empty(Input::get('q4_1')))
    {
        $q4_1  = '1';
    }else {
        $q4_1  = '0';
    }
    if(!empty(Input::get('q4_2')))
    {
        $q4_2  = '1';
    }else {
        $q4_2  = '0';
    }
    if(!empty(Input::get('q5_1')))
    {
        $q5_1  = '1';
    }else {
        $q5_1  = '0';
    }
    if(!empty(Input::get('q5_2')))
    {
        $q5_2  = '1';
    }else {
        $q5_2  = '0';
    }
    if(!empty(Input::get('q5_3')))
    {
        $q5_3 = '1';
    }else {
        $q5_3  = '0';
    }
    if(!empty(Input::get('q6_1')))
    {
        $q6_1 = '1';
    }else {
        $q6_1  = '0';
    }
    if(!empty(Input::get('q6_2')))
    {
        $q6_2 = '1';
    }else {
        $q6_2  = '0';
    }
    if(!empty(Input::get('q7_1')))
    {
        $q7_1 = '1';
    }else {
        $q7_1  = '0';
    }
    if(!empty(Input::get('q7_2')))
    {
        $q7_2 = '1';
    }else {
        $q7_2  = '0';
    }
    if(!empty(Input::get('q7_3')))
    {
        $q7_3 = '1';
    }else {
        $q7_3  = '0';
    }
    if(!empty(Input::get('q8_1')))
    {
        $q8_1 = '1';
    }else {
        $q8_1  = '0';
    }
    if(!empty(Input::get('q8_2')))
    {
        $q8_2 = '1';
    }else {
        $q8_2  = '0';
    }
    if(!empty(Input::get('q8_3')))
    {
        $q8_3 = '1';
    }else {
        $q8_3  = '0';
    }
    if(!empty(Input::get('q9_1')))
    {
        $q9_1 = '1';
    }else {
        $q9_1  = '0';
    }
    if(!empty(Input::get('q9_2')))
    {
        $q9_2 = '1';
    }else {
        $q9_2  = '0';
    }
    if(!empty(Input::get('q9_3')))
    {
        $q9_3 = '1';
    }else {
        $q9_3  = '0';
    }
    if(!empty(Input::get('q9_4')))
    {
        $q9_4 = '1';
    }else {
        $q9_4  = '0';
    }
    if(!empty(Input::get('q9_5')))
    {
        $q9_5 = '1';
    }else {
        $q9_5  = '0';
    }
    if(!empty(Input::get('q10_1')))
    {
        $q10_1 = '1';
    }else {
        $q10_1  = '0';
    }
    if(!empty(Input::get('q10_2')))
    {
        $q10_2 = '1';
    }else {
        $q10_2  = '0';
    }
    if(!empty(Input::get('q10_3')))
    {
        $q10_3 = '1';
    }else {
        $q10_3  = '0';
    }
    if(!empty(Input::get('q11_1')))
    {
        $q11_1 = '1';
    }else {
        $q11_1  = '0';
    }
    if(!empty(Input::get('q12_1')))
    {
        $q12_1 = '1';
    }else {
        $q12_1  = '0';
    }
    if(!empty(Input::get('q12_2')))
    {
        $q12_2 = '1';
    }else {
        $q12_2  = '0';
    }
    if(!empty(Input::get('q12_3')))
    {
        $q12_3 = '1';
    }else {
        $q12_3  = '0';
    }
    if(!empty(Input::get('q13_1')))
    {
        $q13_1 = '1';
    }else {
        $q13_1  = '0';
    }
    if(!empty(Input::get('q13_2')))
    {
        $q13_2 = '1';
    }else {
        $q13_2  = '0';
    }
    if(!empty(Input::get('q14_1')))
    {
        $q14_1 = '1';
    }else {
        $q14_1  = '0';
    }
    if(!empty(Input::get('q14_2')))
    {
        $q14_2 = '1';
    }else {
        $q14_2  = '0';
    }
    if(!empty(Input::get('q14_3')))
    {
        $q14_3 = '1';
    }else {
        $q14_3  = '0';
    }
    if(!empty(Input::get('q15_1')))
    {
        $q15_1 = '1';
    }else {
        $q15_1  = '0';
    }
    if(!empty(Input::get('q16_1')))
    {
        $q16_1 = '1';
    }else {
        $q16_1  = '0';
    }
    if(!empty(Input::get('q16_2')))
    {
        $q16_2 = '1';
    }else {
        $q16_2  = '0';
    }
    if(!empty(Input::get('q17_1')))
    {
        $q17_1 = '1';
    }else {
        $q17_1  = '0';
    }
    if(!empty(Input::get('q18_1')))
    {
        $q18_1 = '1';
    }else {
        $q18_1  = '0';
    }
    if(!empty(Input::get('q19_1')))
    {
        $q19_1 = '1';
    }else {
        $q19_1  = '0';
    }
    if(!empty(Input::get('q19_2')))
    {
        $q19_2 = '1';
    }else {
        $q19_2  = '0';
    }
    if(!empty(Input::get('q20_1')))
    {
        $q20_1 = '1';
    }else {
        $q20_1  = '0';
    }
    if(!empty(Input::get('q20_2')))
    {
        $q20_2 = '1';
    }else {
        $q20_2  = '0';
    }

    $this->validate($request, [
        'no_rumah'     => 'required|max:10',
        'jalan_blok'   => 'required|max:20',
    ]);

      $kwsnbancianid = kawasan::where('nama', $request->perumahan)->first();
      $tarikhbancian = jadual_bancian::where('kawasan_id', $kwsnbancianid->id)->orderby('created_at', 'desc')->first();

    $jawapanbanci = new jawapan_bancian([
        'kawasan_id'       =>     $kwsnbancianid->id,
        'jalan_blok'       =>     $request->jalan_blok,
        'tarikh_mula'      =>     $tarikhbancian->tarikh_mula,
        'no_rumah'         =>     $request->no_rumah,
        'q1_1'             =>     $q1_1,
        'q1_2'             =>     $q1_2,
        'q2_1'             =>     $q2_1,
        'q2_2'             =>     $q2_2,
        'q3_1'             =>     $q3_1,
        'q3_2'             =>     $q3_2,
        'q4_1'             =>     $q4_1,
        'q4_2'             =>     $q4_2,
        'q5_1'             =>     $q5_1,
        'q5_2'             =>     $q5_2,
        'q5_3'             =>     $q5_3,
        'q6_1'             =>     $q6_1,
        'q6_2'             =>     $q6_2,
        'q7_1'             =>     $q7_1,
        'q7_2'             =>     $q7_2,
        'q7_3'             =>     $q7_3,
        'q8_1'             =>     $q8_1,
        'q8_2'             =>     $q8_2,
        'q8_3'             =>     $q8_3,
        'q9_1'             =>     $q9_1,
        'q9_2'             =>     $q9_2,
        'q9_3'             =>     $q9_3,
        'q9_4'             =>     $q9_4,
        'q9_5'             =>     $q9_5,
        'q10_1'             =>     $q10_1,
        'q10_2'             =>     $q10_2,
        'q10_3'             =>     $q10_3,
        'q11_1'             =>     $q11_1,
        'q12_1'             =>     $q12_1,
        'q12_2'             =>     $q12_2,
        'q12_3'             =>     $q12_3,
        'q13_1'             =>     $q13_1,
        'q13_2'             =>     $q13_2,
        'q14_1'             =>     $q14_1,
        'q14_2'             =>     $q14_2,
        'q14_3'             =>     $q14_3,
        'q15_1'             =>     $q15_1,
        'q16_1'             =>     $q16_1,
        'q16_2'             =>     $q16_2,
        'q17_1'             =>     $q17_1,
        'q18_1'             =>     $q18_1,
        'q19_1'             =>     $q19_1,
        'q19_2'             =>     $q19_2,
        'q20_1'             =>     $q20_1,
        'q20_2'             =>     $q20_2,
    ]);
    $jawapanbanci->save();

    return redirect('/senarai-bancian-pembanci');
  }
}
