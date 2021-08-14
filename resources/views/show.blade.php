@extends('layouts.app')
@section('content')
<style type="text/css">
body
{
	background: slategray;
}
a
{
	text-decoration: none; 
	color: darkkhaki;
}

.fa-map-marker
{
	color: #125488;
}


</style>
<div class="row">

@foreach($data as $el)

<div class="col-4">
	<div class="card">
		<a href="{{route('apartment-detail', $el->id)}}" >
  			<img class="card-img-top" src="/image/{{ json_decode($el->image)[0] }}" alt="Card image cap" style="height: 400px;" class="rounded">
  			
  			<div class="card-body">
  				<label class="card-text price">{{$el->price}} դրամ </label>
    			<h5 class="card-title">{{ $el->type }}</h5>
				<p class="card-text"><i class="fa fa-location-arrow" aria-hidden="true"></i>{{ $el->address }}</p>
  			</div>
		</a>
	</div>

</div>
@endforeach


<div class="col-8"></div>

</div>


@endsection

