@extends('plantilla')
  
@section('content')
<br>
<button type="button" class="btn btn-link" onclick="location.href='{{ route('types.index') }}'">Back</a>
    <br>
<h2>Type Data</h2>

    <div>
        <strong>Type name:</strong>
        {{ $type->name }}
    </div>

    <div>
        <strong>Monsters:</strong>
        @foreach($type->monsters as $monster)
            <li>{{ $monster->monstername }}</li>
        @endforeach
    </div>
@endsection