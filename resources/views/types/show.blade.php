@extends('plantilla')
@section('content')
<br>
<div>
    <button type="button" class="btn btn-warning" onclick="location.href='{{ route('types.index') }}'">Back</a>
</div>

<br>

<h2>Type Data</h2>

    <div>
        <strong>Type name:</strong>
        {{ $type->name }}
    </div>

    <div>
        <strong>Monsters:</strong>
        @foreach($type->monsters as $monster)
            @if($type->name == "Normal")
                <li>{{ $monster->monstername }}</li>
                <img src="/img/show/undetermined.gif">
            @else
                <li>{{ $monster->monstername }}</li>
                <img src="/img/show/{{ $monster->id }}.gif" onerror="this.src='/img/show/undetermined.gif'">
            @endif
        @endforeach
    </div>
@endsection