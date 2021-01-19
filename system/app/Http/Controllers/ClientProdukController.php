<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ClientProdukController extends Controller
{
	function home(){
		$data['list_produk'] = Produk::paginate(3);
		return view('customer.home', $data);
	}

	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('customer.produk_single', $data);
	}

	function seller(Produk $produk){
		$data['list_produk'] = produk::all();
		return view('customer.seller', $data);
	}

	function about(){
		return view('customer.about');
	}
	function blog(){
		return view('customer.blog');
	}
	function contact(){
		return view('customer.contact');
	}
	function filter(){
		$nama = request('nama');
		$data['list_produk'] = Produk::where('nama_produk', 'like', "%$nama%")->get();
		$data['nama'] = $nama;
		return view('customer.home', $data);
		//dd(request()->all());
	}

}