@extends('plantilla')
@section('content')

<br>

<div>
    <button type="button" class="btn btn-warning" onclick="location.href='{{ route('monsters.index') }}'">Back</a>
</div>

<br>

<div>
    <h2>Add New Monster</h2>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<div>
<form action="{{ route('monsters.store') }}" method="POST">
    @csrf
  
    <div>
        <strong>Monster Name:</strong>
        <input type="text" name="monstername" value="{{ old('monstername') }}">
    </div>
    <br>
    <div>           
        <strong>Category:</strong>
        <input type="text" name="category" value="{{ old('category') }}">
    </div>
    <br>
    <div>           
        <strong>Description:</strong>
        <input type="textarea" name="description" value="{{ old('description') }}">
    </div>
    <br>
    <div>           
        <strong>Type:</strong>
        <select name="type_id">
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }} >
                            {{ $type->name }}
                        </option>       
            @endforeach            
        </select>
    </div>
    <br>
    <div>
        <input type="submit" value="Save" class="btn btn-dark">
    </div>
    
</form>
</div>
@endsection