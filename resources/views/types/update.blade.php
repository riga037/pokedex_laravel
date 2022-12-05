@extends('plantilla')
@section('content')
<br>
<div>
    <button type="button" class="btn btn-warning" onclick="location.href='{{ route('monsters.index') }}'">Back</a>
</div>

<br>

<div>
    <h2>Update Type</h2>
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
<form action="{{ route('types.update',$type) }}" method="POST">
    @csrf
  
    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ old('name', $type->name) }}">
    </div>     
    <br>
    <div>
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description', $type->description) }}">
    </div>  
    <br>
    <div>
        <input type="submit" value="Save" class="btn btn-dark">
    </div>
    
</form>
</div>
@endsection