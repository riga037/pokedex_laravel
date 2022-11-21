@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('moves.index') }}">Back</a>
</div>
<div>
    <h2>Update Move</h2>
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
<form action="{{ route('moves.update',$move) }}" method="POST">
    @csrf
  
    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ old('name', $move->name) }}">
    </div>  

    <div>
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description', $move->description) }}">
    </div>     
        
    <div>
        <input type="submit" value="Save">
    </div>
    
</form>
</div>
@endsection