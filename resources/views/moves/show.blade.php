@extends('plantilla')

@section('content')
<a href="{{ route('moves.index') }}">Back</a>

<h2>Move</h2>
       
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
     	<li>
            {{ $monster->monstername }} 
            </li>
   @endforeach
</ul>
</div>
@endsection