<?php 
namespace App\Http\Controllers;
use App\TPA;
use App\TPS;
use App\Sarana;
use App\Petugas;
use App\Jadwal;
use App\Jadwal_Sarana;
use App\Quotation;
use Carbon\Carbon;
use DB;
use Request;
use Session;
	class MainController extends Controller {
		public function __construct()
		{
			$this->middleware('login', ['except' => ['index']]);
		}
		public function index()
		{
			return view('login');
		}
		public function homeAdmin(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$jumlahPTotal = DB::table('petugas')
							-> where ('pekerjaan', 'petugas')
							-> count ();
			$jumlahPAssigned = DB::table('petugas')
							-> where ('isAssigned', 1)
							-> count ();	
			$jumlahPnonAssigned = $jumlahPTotal - $jumlahPAssigned;
			$jumlahSTotal = DB::table('sarana')
							-> count ();
			$jumlahSAssigned = DB::table('sarana')
							-> where ('isAssigned', 1)
							-> count ();
			$jumlahSnonAssigned = $jumlahSTotal - $jumlahSAssigned;											
			return view('overviewAdmin')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas)
										->with('jumlahPAssigned', $jumlahPAssigned)->with('jumlahPnonAssigned', $jumlahPnonAssigned)
										->with('jumlahSAssigned', $jumlahSAssigned)->with('jumlahSnonAssigned', $jumlahSnonAssigned);
		}
		public function homeDinas(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$jumlahPTotal = DB::table('petugas')
							-> where ('pekerjaan', 'petugas')
							-> count ();
			$jumlahPAssigned = DB::table('petugas')
							-> where ('isAssigned', 1)
							-> count ();	
			$jumlahPnonAssigned = $jumlahPTotal - $jumlahPAssigned;
			$jumlahSTotal = DB::table('sarana')
							-> count ();
			$jumlahSAssigned = DB::table('sarana')
							-> where ('isAssigned', 1)
							-> count ();
			$jumlahSnonAssigned = $jumlahSTotal - $jumlahSAssigned;											
			return view('overviewDinas')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas)
										->with('jumlahPAssigned', $jumlahPAssigned)->with('jumlahPnonAssigned', $jumlahPnonAssigned)
										->with('jumlahSAssigned', $jumlahSAssigned)->with('jumlahSnonAssigned', $jumlahSnonAssigned);
		}
		public function homePetugas(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$jumlahPTotal = DB::table('petugas')
							-> where ('pekerjaan', 'petugas')
							-> count ();
			$jumlahPAssigned = DB::table('petugas')
							-> where ('isAssigned', 1)
							-> count ();	
			$jumlahPnonAssigned = $jumlahPTotal - $jumlahPAssigned;
			$jumlahSTotal = DB::table('sarana')
							-> count ();
			$jumlahSAssigned = DB::table('sarana')
							-> where ('isAssigned', 1)
							-> count ();
			$jumlahSnonAssigned = $jumlahSTotal - $jumlahSAssigned;											
			return view('overviewPetugas')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas)
										->with('jumlahPAssigned', $jumlahPAssigned)->with('jumlahPnonAssigned', $jumlahPnonAssigned)
										->with('jumlahSAssigned', $jumlahSAssigned)->with('jumlahSnonAssigned', $jumlahSnonAssigned);
		}
		public function inventoryTPA()
		{
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			return view('inventoryTPA')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas);
		}
		public function inventoryTPS()
		{
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			return view('inventoryTPS')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas);
		}
		public function inventorySarana()
		{
			$$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			return view('inventorySarana')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas);
		}
		public function inventoryPetugas()
		{
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			return view('inventoryPetugas')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas);
		}
		public function schedule(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$mytime = Carbon::now('Asia/Jakarta')->addDay()->toDateString();
			$mytime2 = Carbon::now('Asia/Jakarta')->toDateString();
			return view('schedule')->with('Date', $mytime)->with('Date2', $mytime2)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);
		}
		public function postAssignSchedule(){
			$input = Request::all();
			$jadwal = new Jadwal();
			$jadwal->fill($input)->save();

			$nama = Request::input('petugas');
			DB::table('petugas')
				-> where ('nama', $nama)
				-> update (['isAssigned' => 1]);

			$mytime = Carbon::now('Asia/Jakarta')->addDay()->toDateString();
			$mytime2 = Carbon::now('Asia/Jakarta')->toDateString();
			$Petugas = Petugas::all();
			$TPA = TPA::all();
			$TPS = TPS::all();

			return view('schedule')->with('Date', $mytime)->with('Date2', $mytime2)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);
		}
		public function viewSchedule(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$Jadwal = Jadwal::all();
			$Jadwal_Sarana = Jadwal_Sarana::all();
			$mytime = Carbon::now('Asia/Jakarta')->toDateString();
			return view('viewSchedule')->with('Jadwal', $Jadwal)->with('Jadwal_Sarana', $Jadwal_Sarana)->with('Date', $mytime)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);
		}
		public function viewScheduleSelf(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$Jadwal = DB::table('jadwal')->where('petugas', Session::get('name'))->get();
			$mytime = Carbon::now('Asia/Jakarta')->toDateString();
			return view('viewScheduleSelf')->with('Jadwal', $Jadwal)->with('Date', $mytime)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);
		}
		public function getIsiVolume() {
			$tpa = DB::select('SELECT * from tpa');
			$tps = DB::select('SELECT * from tps');
			return view('formIsiVolume')->with('tpa', $tpa)->with('tps', $tps);
		}
		public function postIsiVolume() {
			$input = Request::get("lokasi");
			$volume = Request::get("volume");
			$tempat = 'tps';
			/* Cek TPA atau TPS beserta voluemnya */
			if (sizeof($hasil = (DB::select('SELECT volume from tpa WHERE nama = ?', [$input]))) != 0) {
				$tempat = 'tpa';
			}
			else {
				$hasil = (DB::select('SELECT volume from tps WHERE nama = ?', [$input]));
			}

			$volume = $volume + $hasil[0]->volume;

			DB::table($tempat)
				-> where ('nama', $input)
				-> update (['volume' => $volume]);
			$tpa = DB::select('SELECT * from tpa');
			$tps = DB::select('SELECT * from tps');
			return view('formIsiVolume')->with('tpa', $tpa)->with('tps', $tps);
		}
		public function laporan(){
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			return view('laporan')->with('TPA', $TPA)->with('TPS', $TPS)->with('Sarana', $Sarana)->with('Petugas', $Petugas);
		}
		public function getPenjadwalanSarana() {
			$tpa = DB::select('SELECT * from tpa');
			$tps = DB::select('SELECT * from tps');
			$sarana = DB::select('SELECT * from sarana');
			$mytime = Carbon::now('Asia/Jakarta')->addDay()->toDateString();
			$mytime2 = Carbon::now('Asia/Jakarta')->toDateString();
			return view('formPenjadwalanSarana')->with('Date', $mytime)->with('Date2', $mytime2)->with('TPA', $tpa)->with('TPS', $tps)->with('sarana', $sarana);
		}
		public function postPenjadwalanSarana() {
			$durasi = Request::get("durasi");
			$lokasi = Request::get("lokasi");
			$jenis = Request::get("jenis_sarana");
			$plat = Request::get("plat_sarana");
			$tanggal = Request::get("tanggal");
			
			DB::table('jadwal_sarana')->insert(array(
			    array('tanggal' => $tanggal, 'durasi' => $durasi, 'jenis' => $jenis, 'lokasi' => $lokasi, 'plat' => $plat)
			));
			
			$plat = Request::input('plat_sarana');
			DB::table('sarana')
				-> where ('plat', $plat)
				-> update (['isAssigned' => 1]);

			$tpa = DB::select('SELECT * from tpa');
			$tps = DB::select('SELECT * from tps');
			$sarana = DB::select('SELECT * from sarana');
			$mytime = Carbon::now('Asia/Jakarta')->addDay()->toDateString();
			$mytime2 = Carbon::now('Asia/Jakarta')->toDateString();
			return view('formPenjadwalanSarana')->with('Date', $mytime)->with('Date2', $mytime2)->with('TPA', $tpa)->with('TPS', $tps)->with('sarana', $sarana);
		}
		public function resetJadwal(){
			DB::table('petugas')
				-> update (['isAssigned' => 0]);
			DB::table('jadwal')->delete();
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();

			$mytime = Carbon::now('Asia/Jakarta')->toDateString();
			return view('viewSchedule')->with('Jadwal', $Jadwal)->with('Date', $mytime)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);;
		}
		public function resetJadwalSarana(){
			DB::table('sarana')
				-> update (['isAssigned' => 0]);
			DB::table('jadwal_sarana')->delete();
			$TPA = TPA::all();
			$TPS = TPS::all();
			$Sarana = Sarana::all();
			$Petugas = Petugas::all();
			$Jadwal_Sarana = jadwal_sarana::all();
			$mytime = Carbon::now('Asia/Jakarta')->toDateString();
			return view('viewSchedule')->with('Jadwal', $Jadwal)->with('Jadwal_Sarana', $Jadwal_Sarana)->with('Date', $mytime)->with('Petugas', $Petugas)->with('TPA', $TPA)->with('TPS', $TPS);;
		}
	}
?>