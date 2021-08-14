@extends('layouts.app')
@section('content')
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

<div class="container">
<div class="row">
	<div class="col-3"></div>
	<div class="col-2">
		<div class="mt-3"></div>
		<label class="form-control">Պայման</label>
		<div class="mt-3"></div>
		<label class="form-control">Տեսակ</label>
		<div class="mt-3"></div>
		<label class="form-control">Արտաքին Պատեր</label>
		<div class="mt-3"></div>
		<label class="form-control">Վիճակ</label>
		<div class="mt-3"></div>
		<label class="form-control">Հասցե</label>
		<div class="mt-3"></div>
		<label class="form-control">Գին</label>
		<div class="mt-3"></div>
		<label class="form-control">Սենյակ</label>
		<div class="mt-3"></div>
		<label class="form-control">Մակերես</label>
		<div class="mt-3"></div>
		<label class="form-control">Հարկ</label>
		<div class="mt-3"></div>
		<label class="form-control">Նկար</label>
		<div class="mt-3"></div>
		<label class="form-control">Լրացուցիչ տեղեկություն</label>
	</div>
	
	<div class="col-4">
	<div class="mt-3"></div>
	
	<form action="{{route('create-submit')}}" method="POST" enctype="multipart/form-data">
		@csrf
	<div class="form-group">
		
		<select class="form-control" name="buy_type">
			<option>Գնել</option>
			<option>Վարձակալել</option>
		</select>
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		
		<select class="form-control" name="type">
			<option>Բնակարան</option>
			<option>Առանձնատուն</option>
			<option>Կոմերցիոն</option>
			<option>Հողատարածք</option>
		</select>
	</div>

	<div class="mt-3"></div>

	<div class="form-group">

	<select class="form-control" name="wall">
		<option>Մոնոլիտ</option>
		<option>Քարե</option>
		<option>Պանել</option>
	</select>
	
	</div>
	
	<div class="mt-3"></div>

	<div class="form-group">

	<select class="form-control" name="status">
		<option>Վերանորոգված</option>
		<option>Զրոյական</option>
		<option>Լավ</option>
	</select>

	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="text" name="address">
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="number" name="price">
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="number" name="room">
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="number" name="area">
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="number" name="floor">
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<input class="form-control" type="file" name="image[]" multiple>
	</div>

	<div class="mt-3"></div>

	<div class="form-group">
		<textarea class="form-control" name="info"></textarea>
	</div>
	
	<div class="mt-3"></div>
	<input type="submit" class="btn btn-success col-12" name="submit" value="Create"> 				
	</div>
	</form>
	<div class="col-1"></div>
</div>

</div>

@endsection