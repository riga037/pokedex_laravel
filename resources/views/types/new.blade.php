@extends('plantilla')
@section('content')

<br>

<div>
    <button type="button" class="btn btn-warning" onclick="location.href='{{ route('types.index') }}'">Back</button>
</div>

<br>

<div>
    <h2>Add New Type</h2>
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
<form action="{{ route('types.store') }}" method="POST">
    @csrf
  
    <div>
        <strong>Type Name:</strong>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <br>
    <div>           
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description') }}">
    </div>
    <br>
    <div>
        <input type="submit" value="Save" class="btn btn-dark">
    </div>
    
</form>
</div>
@endsection