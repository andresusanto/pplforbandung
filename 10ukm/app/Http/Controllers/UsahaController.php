<?php namespace App\Http\Controllers; 
use App\Usaha;
use App\Produk;
use App\Notifikasi;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Zipper;
use Fpdf;
use Response;
use Request;

class UsahaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usahas=Usaha::where('statusizin','=',1)->get();

		return view('usaha.index',compact('usahas'));		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('form.form_UKM');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();
		$destinationPath = '';
		if (Request::hasFile('image')) {
	        $file            = Request::file('image');
	        $filePath = $destinationPath . 'img/';
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['image']);
	    	$input['imagepath'] = $filePath . $filename;

	    }
	    else {
	    	$defaultimage = "default/empty_thumbnail.jpg";
	    	$filePath = $destinationPath . 'img/';
	        unset($input['image']);
	    	$input['imagepath'] = $filePath . $defaultimage;
	    }

	    if (Request::hasFile('izinusaha')) {
	        $file            = Request::file('izinusaha');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['izinusaha']);
	    	
	    }

	    if (Request::hasFile('kepemilikan')) {
	        $file            = Request::file('kepemilikan');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['kepemilikan']);
	    	
	    }

	    if (Request::hasFile('keteranganlokasi')) {
	        $file            = Request::file('keteranganlokasi');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['keteranganlokasi']);
	    	
	    }

	    if (Request::hasFile('pbb')) {
	        $file            = Request::file('pbb');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['pbb']);
	    	
	    }

	    if (Request::hasFile('gangguan')) {
	        $file            = Request::file('gangguan');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['gangguan']);
	    }

	    if (Request::hasFile('sumpah')) {
	        $file            = Request::file('sumpah');
	        $filePath = $destinationPath . 'dokumen/' . $input['nama'];
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($filePath, $filename);
	        unset($input['sumpah']);
	    }

	    $inputnotifikasi = array('nama_ukm' => $input['nama'],
	    		'konten' => $input['nama'] . ' telah melakukan pendaftaran !' 
	    	);

	    Notifikasi::create($inputnotifikasi);
		Usaha::create($input);
		$this->zipfile($input['nama']);
		return redirect('daftar-usaha');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usaha = Usaha::find($id);
		$produks = Produk::where('id_usaha','=',$id)->get();
		return view('usaha.show', compact('usaha'), compact('produks'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usaha = Usaha::find($id);
		return view('form.edit_UKM', compact('usaha'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Request::all();	
		$usaha = Usaha::find($id);
		// $usaha->nama = $input->nama;
		// $usaha->bidang = $input->bidang;
		// $usaha->lokasi = $input->lokasi;
		// $usaha->telepon = $input->telepon;
		// $usaha->save();
		$usaha->update($input);
		return redirect('daftar-usaha');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usaha = Usaha::find($id);
		$usaha->delete();
		return redirect('daftar-usaha');
	}

	public function download($id)
	{	
		$usaha = Usaha::find($id);
		$namausaha = $usaha['nama'];
		
		$headers = array(
				'Content-Type => application/octet-stream',
			);
		
		return Response::download('dokumen/' . $namausaha . '.zip', $namausaha .'.zip', $headers);
		
		//return redirect('daftar-usaha');
	}

	public function search()
	{
		$name = Request::get('query');
		$usahas = Usaha::where('nama','like','%'.$name.'%')->get();		
		return view('usaha.index',compact('usahas'));
	}

	public function sort($category)
	{
		$usahas = Usaha::where('bidang','=',$category)->get();
		return view('usaha.index',compact('usahas'));
	}

	private function zipfile($nama) {
		$namausaha = $nama;
		$files = glob('dokumen/'. $namausaha);
		$makezip = Zipper::make('dokumen/'. $namausaha .'.zip')->add($files);
	}

	public function createpdf(){
		$usahas = Usaha::all();
		$fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->SetXY(50,20);
        $fpdf->SetDrawColor(50,60,100);
        $fpdf->SetFont('Arial','B',16);
		$fpdf->Cell(120,10,'Laporan UKM dan Indag',1,0,'C',0);
		
		$count = 1;
		$x = 8;
		$y = 40;
		
		$fpdf->setXY($x,$y);

		$fpdf->SetFont('Arial','B',10);
		$fpdf->Cell(8,10,'No',1,0,'C',0); 
		$fpdf->Cell(40,10,'Nama',1,0,'C',0); 
		$fpdf->Cell(50,10,'Email',1,0,'C',0);
		$fpdf->Cell(45,10,'Alamat',1,0,'C',0);
		$fpdf->Cell(28,10,'Telepon',1,0,'C',0);
		$fpdf->Cell(13,10,'Bidang',1,0,'C',0);
		$fpdf->Cell(12,10,'Skala',1,0,'C',0);

		$y += 10;

		foreach($usahas as $usaha){
			$fpdf->setXY($x,$y);
			$fpdf->Cell(8,10,$count,1,0,'C',0); 
			$fpdf->Cell(40,10,$usaha['nama'],1,0,'C',0); 
			$fpdf->Cell(50,10,$usaha['email'],1,0,'C',0);
			$fpdf->Cell(45,10,$usaha['lokasi'],1,0,'C',0);
			$fpdf->Cell(28,10,$usaha['telepon'],1,0,'C',0);
			$fpdf->Cell(13,10,$usaha['bidang'],1,0,'C',0);
			$fpdf->Cell(12,10,$usaha['skala'],1,0,'C',0);
			$count++;
			$y += 10;	
		}
		// foreach($usahas as $usaha){
		// 	$fpdf->SetXY($x,$y);
		// 	$fpdf->Cell(1, $usaha ['nama'] );
		// 	$y += 10;


		// }
		
		
		
        $fpdf->Output('dokumen/coba2.pdf');

	}
}
