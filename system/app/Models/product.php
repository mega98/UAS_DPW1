<?php 

namespace App\Models;


use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;
use Illuminate\Support\Str;
use App\Controllers\ProductController;

class Product Extends Model{

	use ProdukAttributes, ProdukRelations;

	protected $table = 'product';
	protected $primarykey = 'uuid';
	public protected $incrementing = false;

	protected static function boot(){
		parent::boot();

		static::creating(function($item){
			$item->uuid = (string) str::uuid();
		});
	}
}