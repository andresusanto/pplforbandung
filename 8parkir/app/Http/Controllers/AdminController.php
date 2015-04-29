<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permohonan;
use App\Admin;
use Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

	public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(){
    	$input = Request::all();
    	$admins = Admin::all();
    	foreach ($admins as $admin) {
    		if($input['email'] == $admin->email && $input['password'] == $admin->password){
                Session::set('admin', $admin);
    			return redirect::to('admin/home');
    		}
    	}

        $validator = array('login' => 'Email atau Password salah!');

    	return redirect::to('admin/login')->withErrors($validator);
    }

    public function getAdmin(){
        $session = Session::get('admin');
    	$admin = Admin::where('id', '=', $session->id)->firstOrFail();
    	return view('admin.home', compact("admin", $admin));
    }

    public function getPermohonan(){
        $permohonans = Permohonan::all();
        $admin = Session::get('admin');

        return view('admin.daftar_permohonan', compact('permohonans'), compact('admin'));
    }

    public function editPermohonan(){
        $input = Request::all();
        $admin = Session::get('admin');

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('admin.edit_permohonan', compact('permohonan'), compact('admin'));
    }

    public function updatePermohonan(){
        $input = Request::all();
        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        $permohonan->biaya_retribusi = $input['biaya_retribusi'];
        $permohonan->status_permohonan = $input['status_permohonan'];

        $permohonan->save();

        return redirect('admin/daftar_permohonan');
    }

    public function viewLaporan(){
        $admin = Session::get('admin');
        return view('admin.laporan',compact('admin'));
    }

    public function deletePermohonan($id){
        $permohonan = Permohonan::where('id', '=', $id)->firstOrFail();

        $permohonan->delete();

        return redirect('admin/daftar_permohonan'); 
    }

    public function generateLaporan(){
        $input = Request::all();
        $admin = Session::get('admin');
        $permohonan = 0;

        return view("admin.generate_laporan", compact('permohonan'), compact('admin'));
    }

    public function logout(){
        Session::forget('admin');
        return redirect('admin/login');
    }
}
