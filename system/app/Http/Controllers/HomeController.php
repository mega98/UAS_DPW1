<?php 

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller{


	function showdashboard(){
		return view('dashboard');
	}

	function showproduk(){
		return view('produk');
	}

	function showkategori(){
		return view('kategori');
	}

	function showhome(){
		return view('home');
	}

	function showproduk1(){
		return view('produk1');
	}

	function showcheckout(){
		return view('checkout');
	}

	function showabout(){
		return view('about');
	}

	function showblog(){
		return view('blog');
	}

	function showcontact(){
		return view('contact');
	}

	function showcart(){
		return view('cart');
	}

}