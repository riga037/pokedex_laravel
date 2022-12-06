@extends('plantilla')
@section('content')
<br>
<div>
    <button type="button" class="btn btn-warning" onclick="location.href='{{ route('moves.index') }}'">Back</a>
</div>

<br>

<h2>Move Data</h2>
       
<div>
<strong>Name:</strong>
{{ $move->name }}
</div>

<div>
<strong>Description:</strong>
{{ $move->description }}
</div>
        

<div>
<strong>Monsters learning this move:</strong>
<ul>
   @foreach($move->monsters as $monster)
     	<li>{{ $monster->monstername }} </li>
        <img src="/img/show/{{ $monster->id }}.gif" onerror="this.src='/img/show/undetermined.gif'">
   @endforeach
</ul>
</div>
@endsection