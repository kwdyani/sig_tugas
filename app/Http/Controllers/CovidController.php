<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Positif;
use App\Kabupaten;
use Carbon\Carbon;

class CovidController extends Controller
{
    public function index()
    {

    	// $sembuh = DB::table('tb_positif')->where ('tanggal', Data::max('tanggal'))->orderBy('tanggal','desc')
     //            ->sum('sembuh');

    	// mengambil data dari table tb_positif
    	$tb_positif = DB::table('tb_positif')->get();
 
    	// mengirim data tb_positif ke view index
    	return view('index',['tb_positif' => $tb_positif]);

	}
		// method untuk menampilkan view form tambah tb_positif
	public function tambah()
	{

        $kabupaten = Kabupaten::all();
		// memanggil view tambah
		return view('tambah',['kabupaten' => $kabupaten]);
 
	}
 
	// method untuk insert data ke table tb_positif
	public function store(Request $request)
	{
        $kabupaten = Kabupaten::all();
		// insert data ke table tb_positif
		DB::table('tb_covid')->insert([
			'id_kabupaten' => $request->id_kabupaten,
			'positif' => $request->positif,
			'dirawat' => $request->dirawat,
			'sembuh' => $request->sembuh,
			'meninggal' => $request->meninggal,
			'tanggal' => $request->tanggal
			
	]);
		// alihkan halaman ke halaman tb_positif
		return redirect('/dashboard');
 
	}
    public function show()
    {
 
    }

		// method untuk edit data tb_positif
	public function edit($id)
	{
        $kabupaten = Kabupaten::all();
		// mengambil data tb_positif berdasarkan id yang dipilih
		$tb_covid = DB::table('tb_covid')->where('id',$id)->get();

		// passing data tb_positif yang didapat ke view edit.blade.php
		return view('edit',['tb_covid' => $tb_covid, 'kabupaten' => $kabupaten]);
 
	}

	public function update(Request $request)
	{
        $kabupaten = Kabupaten::all();

		// update data tb_positif
		DB::table('tb_covid')->where('id',$request->id)->update([
			'id_kabupaten' => $request->id_kabupaten,
			'positif' => $request->positif,
			'dirawat' => $request->dirawat,
			'sembuh' => $request->sembuh,
			'meninggal' => $request->meninggal,
			'tanggal' => $request->tanggal
	]);
		// alihkan halaman ke halaman tb_positif
		return redirect('/dashboard');
	}	

		// method untuk hapus data tb_positif
	public function hapus($id)
	{
		// menghapus data tb_positif berdasarkan id yang dipilih
		DB::table('tb_covid')->where('id',$id)->delete();
		
		// alihkan halaman ke halaman tb_positif
		return redirect('/dashboard');
	}

	public function dashboard(Request $request)
	{
		// mengambil data dari table tb_positif
		$kabupaten = Kabupaten::all();
    	
 
    	// mengirim data tb_positif ke view index
    	
		// return view('/dashboard');

		$caritgl = $request->get('caritgl');
        $carikabupaten = $request->get('carikabupaten');
        
        if(isset($caritgl)){

            $tglnow = Carbon::parse($request->caritgl);

            $totaldirawat = Positif::select(DB::raw('COALESCE(SUM(dirawat),0) as dirawat'))
            ->where('tanggal',$request->caritgl)
            ->get();

            $totalsembuh = Positif::select(DB::raw('COALESCE(SUM(sembuh),0) as sembuh'))
            ->where('tanggal',$request->caritgl)
            ->get();

            $totalmeninggal = Positif::select(DB::raw('COALESCE(SUM(meninggal),0) as meninggal'))
            ->where('tanggal',$request->caritgl)
            ->get();

            $totalpositif = Positif::select(DB::raw('COALESCE(SUM(positif),0) as positif'))
            ->where('tanggal',$request->caritgl)
            ->get();

            $tb_covid=Positif::where('tanggal','like',"%".$caritgl."%")
            ->get();
           
        } else {

            $tglnow = date('Y-m-d');

            $totaldirawat = Positif::select(DB::raw('COALESCE(SUM(dirawat),0) as dirawat'))->where('tanggal',$tglnow)->get();
            $totalsembuh = Positif::select(DB::raw('COALESCE(SUM(sembuh),0) as sembuh'))->where('tanggal',$tglnow)->get();
            $totalmeninggal = Positif::select(DB::raw('COALESCE(SUM(meninggal),0) as meninggal'))->where('tanggal',$tglnow)->get();
            $totalpositif = Positif::select(DB::raw('COALESCE(SUM(positif),0) as positif'))->where('tanggal',$tglnow)->get();

            $tb_covid = Positif::where('tanggal' , date('Y-m-d'))->get();
        }

        
        // return $positif;

      return view('dashboard', ['tb_covid' => $tb_covid, 'kabupaten' => $kabupaten, 'tanggal' => $tglnow, 'totaldirawat' => $totaldirawat, 'totalsembuh' => $totalsembuh, 'totalmeninggal' => $totalmeninggal, 'totalpositif' => $totalpositif]);





	}

	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->tanggal;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$tb_covid = DB::table('tb_covid')->whereDate('tanggal', $cari)->orderBy('tanggal')->get();
		
 
    		// mengirim data pegawai ke view index

		return view('/dashboard',['tb_covid' => $cari]);
 
	}

	public function createPallette(Request $request)
    {

        $HexFrom = ltrim($request->start, '#');
        $HexTo = ltrim($request->end, '#');

    
        $ColorSteps = 9;
        $FromRGB['r'] = hexdec(substr($HexFrom, 0, 2));
        $FromRGB['g'] = hexdec(substr($HexFrom, 2, 2));
        $FromRGB['b'] = hexdec(substr($HexFrom, 4, 2));
    
        $ToRGB['r'] = hexdec(substr($HexTo, 0, 2));
        $ToRGB['g'] = hexdec(substr($HexTo, 2, 2));
        $ToRGB['b'] = hexdec(substr($HexTo, 4, 2));
    
        $StepRGB['r'] = ($FromRGB['r'] - $ToRGB['r']) / ($ColorSteps - 1);
        $StepRGB['g'] = ($FromRGB['g'] - $ToRGB['g']) / ($ColorSteps - 1);
        $StepRGB['b'] = ($FromRGB['b'] - $ToRGB['b']) / ($ColorSteps - 1);
    
        $GradientColors = array();
    
        for($i = 0; $i <= $ColorSteps; $i++) {
        $RGB['r'] = floor($FromRGB['r'] - ($StepRGB['r'] * $i));
        $RGB['g'] = floor($FromRGB['g'] - ($StepRGB['g'] * $i));
        $RGB['b'] = floor($FromRGB['b'] - ($StepRGB['b'] * $i));
    
        $HexRGB['r'] = sprintf('%02x', ($RGB['r']));
        $HexRGB['g'] = sprintf('%02x', ($RGB['g']));
        $HexRGB['b'] = sprintf('%02x', ($RGB['b']));
    
        $GradientColors[] = implode(NULL, $HexRGB);
        }
        $collect = collect($GradientColors);
        $filtered = $collect->filter(function($value, $key){
            return strlen($value) == 6;
        });
        return $filtered;
    }

    
    function len($val){
        return (strlen($val) == 6 ? true : false );
    }


    public function getDataMap(Request $request)
    {
        $kabupaten = Kabupaten::all();

        $tglnow = Carbon::now()->format('Y-m-d');
        if (is_null($request->date)) {
            $tanggal = $tglnow;
        }else{
            $tanggal = $request->date;
        }

        $dataMap = Positif::select('tb_covid.id', 'tb_kabupaten.id', 'tb_kabupaten.kabupaten', 'tb_covid.sembuh', 'tb_covid.dirawat', 'tb_covid.positif', 'tb_covid.meninggal')
        ->rightjoin('tb_kabupaten', 'tb_covid.id_kabupaten', '=', 'tb_kabupaten.id')
        ->where('tanggal', $tanggal)
        ->orderby('id_kabupaten','ASC')
        ->get();

        $dataColor = Positif::select('tb_covid.id', 'tb_kabupaten.id', 'tb_kabupaten.kabupaten', 'tb_covid.sembuh', 'tb_covid.dirawat', 'tb_covid.positif', 'tb_covid.meninggal')
        ->rightjoin('tb_kabupaten', 'tb_covid.id_kabupaten', '=', 'tb_kabupaten.id')
        ->where('tanggal', $tanggal)
        ->orderby('positif','DESC')
        ->get();
        return response()->json(["dataMap"=>$dataMap, "dataColor"=>$dataColor]);
        // return $dataMap;
    }
}

