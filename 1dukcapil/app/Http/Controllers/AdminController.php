<?php namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests;

use Redirect;
use Request;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    /**
     * Return the logged in admin user.
     *
     */
    public static function user() {
        if (Session::has('admin')) {
            $admin = Admin::find(Session::get('admin'));
//            dd($admin);
            return $admin;
        } else {
            return null;
        }
    }

    public function attempt($username, $password) {
        $admin = Admin::where('username', '=', $username)->first();
        if ($admin == null) {
            return false;
        } else if (!Hash::check($password, $admin->password)){
            return false;
        } else {
            return true;
        }
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.login');
	}

    public function login() {
        $username = Request::input('username');
        $password = Request::input('password');

        if ($this->attempt($username, $password)) {
            // add to session
            $admin = Admin::where('username', '=', $username)->first();
            Session::put('admin', $admin->id);
            Session::put('admin_name', $admin->name);

            // TODO: redirect to a proper place
            return Redirect('admin');
        } else {
            return Redirect::back()->withErrors(['message' => 'Username/password yang Anda masukkan salah!']);
        }
    }

    public function logout() {
        if (Session::has('admin')) {
            Session::pull('admin');
            Session::pull('admin_name');

            return Redirect('/');
        } else {
            return Redirect::back();
        }

    }

}
