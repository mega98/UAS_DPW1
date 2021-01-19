<?php 

namespace App\Http\Controllers;

use App\Models\Product;
use Faker;

class ProductController extends Controller 
{
	function index(){
		$user = request()->user();
		$data['list_product'] = Product::all();
		return view('product.index', $data);
	}

	function create(){
		return view('product.create');
	}

	function store(){

		
		$produk = new Product;
		$produk->id_user = request()->user()->id;
		$produk->nama= request('nama');
		$produk->stok = request('stok');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/product')->with('success','Data Berhasil Ditambahkan');
		// dd(request()->all());
	}

	function show(Product $product){
		$data['product'] = $product;
		return view('product.show', $data);
	}

	function edit(Product $product){
		$data['product'] = $produk;
		return view('product.edit', $data);
	}

	function update(Product $product){
		$produk->nama = request('nama');
		$produk->stok = request('stok');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		
		$produk->handleUploadFoto();

		$produk->save();

		return redirect('admin/product')->with('success','Data Berhasil Diedit');
	}

	function destroy(Product $product){
		$produk->handleDelete();
		$produk->delete();
		return redirect('admin/product')->with('success','Data Berhasil Dihapus');
	}

	function filter(){
		$nama = request('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');

		//Where, WhereIn, WhereBetween
		//$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
		//$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();

		//WhereNot, WhereNotIn, WhereNotBetween
		//$data['list_produk'] = Produk::where('stok', '<>', "$stok")->get();
		//$data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();

		//WhereNull, WherenotNull, WhereNotNull
		//$data['list_produk'] = Produk::whereNull('stok')->get();
		//$data['list_produk'] = Produk::whereNotNull('stok')->get();
		//$data['list_produk'] = Produk::whereNotNull('harga')->get();

		//WhereDate, WhereMonth, WhereDay, WhereYear, WhereTime
		//$data['list_produk'] = Produk::whereDate('create_at', '2021-01-04')->get();
		//$data['list_produk'] = Produk::whereMonth('create_at', '01')->whereYear('created_at', '2021')->get();
		//$data['list_produk'] = Produk::whereDay('create_at' 'month')->get();
		//$data['list_produk'] = Produk::whereYear('create_at', '2021')->get();
		//$data['list_produk'] = Produk::whereTime('create_at', '14:20:58')->get();

		//WhereGroup
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [20])->whereYear('create_at', '2021')->get();

		$data['nama'] = $nama;
		$data['stok'] = request('stok');

		return view('product.index', $data);

	}	


	function test($product, $hargaMin = 0, $hargaMax = 0){
		if($product == 'payung'){
			echo "Tampilkan Produk Payung";
		}elseif($produk == 'sepeda'){
			echo "Produk Sepeda";
		}
		echo "<br>";
		echo "Harga Min adalah $hargaMin <br>";
		echo "Harga Max adalah $hargaMax <br>";

	}

		public function testCollection(){

		$list_produk = ['Sawi', 'Wortel', 'Bayam', 'Buncis'];
		$collection = collect($list_produk);
		$list_produk = Produk::all();

		// Sorting
		//sort By Harga Terendah
		//dd($list_produk->sortBy('harga'));
		//sort By Harga Tertinggi
		//dd($list_produk->sortByDesc('harga'));


		//map
		// foreach($list_produk as $item){
		//	echo "$item->nama<br>";
		// }

		// $list_produk->each(function($item){
		//	echo "$item->nama<br>";
		// });

		//dd($list_bike, $collection, $list_produk);

		// Filter

		// $filtered = $list_produk->filter(function($item){
		//	return $item->harga > 50000;
		// });
		// dd($filtered);

		//Harga Teringgi
		// $sum = $list_produk->sum('harga');
		// dd($sum);

		// Harga Terendah
		// $sum = $list_produk->min('harga');
		// dd($sum);

		// Tinggi
		// $sum = $list_produk->max('harga');
		// dd($sum);

		// rata rata
		//$sum = $list_produk->average('stok');
		//dd($sum);


		//pagination
		$data['list'] = Produk::simplePaginate(3); /*hanya next dan previos*/
		$data['list'] = Produk::paginate(3); /*ada nomor halaman*/
		return view('test-collection', $data);

	}
}
