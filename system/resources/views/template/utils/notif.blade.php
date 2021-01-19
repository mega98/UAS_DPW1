@foreach(['success','warning','danger'] as $status)
	@if (session($status))
	<div class="alert alert-{{$status}} alert-dismissable custom-{{$status}}-box">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
		<strong> {{session($status)}} </strong>
	</div>
	@endif
@endforeach
<!-- 
@if ($errors->any())
    <div class="alert alert-danger">
    	<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 -->