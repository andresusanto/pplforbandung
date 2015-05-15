<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Input;
use Session;

use App\Models\Template;
class TemplateController extends Controller {

	public function getIndex()
	{
		$list_template = Template::all();
		return view('izin.template.index',['list_template'=>$list_template,'template'=>new Template()]);
	}

	public function getCreate()
	{
		$template = new Template();
		return view('izin.template.create',compact('template'));
	}

	public function postCreate()
	{
		$template = new Template();
		$template->nama = Request::input('nama');
		$template->save();
		return redirect()->route('izin.template.index');
	}

	public function postUpdate($id)
	{
		$template = Template::findOrFail($id);
		$template->nama = Request::input('nama');
		$template->butuh_upload = Request::input('butuh_upload');
		$template->butuh_perpanjangan = Request::input('butuh_perpanjangan');
		$template->save();
		Session::flash('notif-success','Template berhasil diubah');
		return redirect()->route('izin.template.index');
	}

	public function getUpdate($id)
	{
		$template = Template::findOrFail($id);
		return view('izin.template.update',compact('template'));
	}

	public function postUpload($id)
	{
		$template = Template::findOrFail($id);
		$file = Input::file('file');

		if ($file !== null){
			$filePath = public_path().'/uploads/templates/';
			$file->move($filePath,$id.'.'.$file->getClientOriginalExtension());
			$template->url = 'uploads/templates/'.$id.'.'.$file->getClientOriginalExtension();
			$template->save();
		}
		return redirect()->route('izin.template.index');
	}
}
