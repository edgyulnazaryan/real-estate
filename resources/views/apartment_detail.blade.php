@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style type="text/css">
body
{
	background-color: darkslategrey;
}
.card-body>label
{
	color: darkolivegreen;
	font-size: 18px;
}
</style>
<div class="row">
<div class="col-4">

</div>
<div class="col-4">
<div class="card" >
	<img class="card-img-top" src="/image/{{ json_decode($data->image)[0] }}" alt="Card image cap">
	<div class="card-body">
		
		<h5 class="card-title">{{ $data->type }}<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>{{$data->price}} դրամ </h5>
		<label>Հասցե</label>
		<p class="card-text"><i class="fa fa-location-arrow" aria-hidden="true"></i>{{ $data->address }}</p>
		<label>Վիճակ</label>
		<p class="card-text">{{ $data->status }}</p>
		<label>Արտաքին պատեր</label>
		<p class="card-text">{{ $data->wall }}</p>
		<label>Սենյակների քանակը</label>
		<p class="card-text">{{ $data->room }}</p>
		<label>Մակերես</label>
		<p class="card-text">{{ $data->area }}</p>
		<label>Հարկ</label>
		<p class="card-text">{{ $data->floor }}</p>
		<label>Լրացուցիչ ինֆորմացիա</label>
		<p class="card-text">{{ $data->info }}</p>

		
	</div>

</div>
</div>
<div class="col-4"></div>
</div>


	

<div class="slider-nav">
		@foreach(json_decode($data->image) as $value)
		<div class="slider-for">
			<img src="/image/{{$value}}" style="height: 250px;">
		</div>
		@endforeach
</div>
	

	
	

<script type="text/javascript">
$('.slider-for').slick(
{
	slidesToShow: 1,
	slidesToScroll: 1,
	fade: true,
	asNavFor: '.slider-for',
	
});

$('.slider-nav').slick(
{
	infinite: true,
	dots: false,
	slidesToShow: 3,
	slidesToScroll: 1
});
				

</script>


@endsection