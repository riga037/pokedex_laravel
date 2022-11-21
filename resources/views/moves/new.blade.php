@extends('plantilla')
@section('content')

New Move
<br><br>
<form method="POST" action="{{ route('moves.store') }}">
	
	@csrf
	<input type="text" name="name" value="{{old('name')}}">
	<input type="text" name="description" value="{{old('description')}}">
	<input type="submit" name="Save">

</form>

@if($errors->any())

	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif

@endsection