<?php 

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Auth;

class AuthController extends Controller
{
	function showlogin(){
		return view ('login');
	}

	function loginProcess(){
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
		 	$user = Auth::user();
		 	if($user->level == 1) return redirect('dashboard/admin')->with('success', 'Login Berhasil');
		 	if($user->level == 0) return redirect('dashboard/pengguna')->with('success', 'Login Berhasil');
		}else{
		 	return back()->with('danger', 'Login Gagal, Silahkan cek email dan password anda');
		}

		// $email = request('email');
		// $user = Pembeli::where('email', $email)->first();
		// if(!$user){
		// 	$guard = 'pembeli';
		// }else{
		// 	$user = Pembeli::where('email', $email)->first();
		// 	if($user){
		// 		$guard = 'penjual';
		// 	}else{
		// 		$guard = false;
		// 	}
		// }

		// if(!$guard){
		// 	return back()->with('danger', 'Login Gagal, Email Tidak Ditemukan');
		// }else{
		// 	if(Auth::guard($guard)->attempt(['email' => request('email'), 'password' => request('password')])){
		// 		return redirect("beranda/$guard")->with('success', 'Login Berhasil');
		// 	}else{
		// 		return back()->with('danger', 'Login Gagal, Silahkan cek email dan password anda');
		// 	}
		// }

		// if(request('login_as') == 1){
		// 	if(Auth::guard('pembeli')->attempt(['email'=> request('email'), 'password' => request('password')])){
		// 		return redirect('dashboard/pembeli')->with('success','Login Berhasil');
		// 	}else{
		// 		return back()->with('danger', 'Login Gagal, Silahkan cek email dan password anda');
		//  	}
	 // 	}else{
		// 	if(Auth::guard('penjual')->attempt(['email'=> request('email'), 'password' => request('password')])){
		// 		return redirect('dashboard/penjual')->with('success','Login Berhasil');
		// 	}else{
		// 	 return back()->with('danger', 'Login Gagal, Silahkan cek email dan password anda');
		//  }
		// }


	}

	function logout(){
		Auth::logout();
		Auth::guard('pembeli')->logout();
		Auth::guard('penjual')->logout();
		return redirect('dashboard');
	}

	function showRegister(){
		return view ('register');
	}

	function forgotpassword(){

	}

}