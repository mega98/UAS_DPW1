@extends('template.base')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<div class="card">
					<div class="card-header">
						Detail Data Produk
					</div>
                    <div class="card-body">
                    	<h3>{{$produk->nama}}</h3>
                         <hr>
                         <p>
                              Rp. {{number_format($produk->harga)}} |
                              Stok : {{$produk->stok}} |
                              Berat : {{$produk->berat}} gr |

                              <!-- hubungannya dengan model produkk -->
                              Seller : {{$produk->seller->username}} |

                              <!-- $Tanggal Produksi : {{$produk->tanggal_produksi}}-->
                              Tanggal Produk : {{$produk->created_at->diffForHumans()}}
                         </p>
                         <p>
                              {!! nl2br($produk->deskripsi)!!}
                         </p>
                         <p>
                              <img src="{{url("system/public/$produk->foto")}}" alt="{{$produk->foto}}">
                         </p>
                    </div>
				</div>	
			</div>
		</div>
	</div>
@endsection