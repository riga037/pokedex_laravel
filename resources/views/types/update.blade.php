@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('types.index') }}">Back</a>
</div>
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

    <div>
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description', $type->description) }}">
    </div>  
        
    <div>
        <input type="submit" value="Save">
    </div>
    
</form>
</div>
@endsection