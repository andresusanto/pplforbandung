<?php 
namespace App\Http\Controllers;
use Request;
use DB;
use App\TPA;
use App\TPS;
use App\Sarana;
use App\Petugas;
	class LaporanController extends Controller {
		public function createLaporan(){

			//$result = DB::select('SELECT COUNT(*) FROM `tpa`');
			$result = DB::table('tpa')
				-> count();
			$jumTPA = $result;

			$result = DB::table('tps')
				-> count();
			$jumTPS = $result;

			$result = DB::table('petugas')
				-> count();
			$jumPetugas = $result;

			$result = DB::table('sarana')
				-> count();
			$jumSarana = $result;
			

			$result = DB::table('tpa')
				->sum('volume');
			$jumVolume = $result;
			$result = DB::table('tps')
				->sum('volume');
			$jumVolume += $result;

			$result = DB::select('SELECT * FROM tpa');
			$result = json_decode(json_encode($result),true);

			
			

			return view('laporan')->with('jumTPA', $jumTPA)->with('jumTPS', $jumTPS)->with('jumSarana', $jumSarana)->with('jumPetugas', $jumPetugas)->with('jumVolume', $jumVolume)->with('result', $result);
			
		}
		/*public function DelTPA($id){
			$tpa = TPA::find($id);
			$tpa->delete();
			return redirect('inventoryTPA');	
		}

		public function DelTPS($id){
			$tps = TPS::find($id);
			$tps->delete();
			return redirect('inventoryTPS');	
		}

		public function DelSarana($id){
			$sarana = Sarana::find($id);
			$sarana->delete();
			return redirect('inventorySarana');	
		}

		public function DelPetugas($id){
			$petugas = Petugas::find($id);
			$petugas->delete();
			return redirect('inventoryPetugas');	
		}*/
	}
?>