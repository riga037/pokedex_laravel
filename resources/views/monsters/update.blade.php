@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('monsters.index') }}"> Back</a>
</div>
<div>
    <h2>Update Monster</h2>
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
<form action="{{ route('monsters.update',$monster) }}" method="POST">
    @csrf
  
    <div>
        <strong>Monster Name:</strong>
        <input type="text" name="monstername" value="{{ old('mosntername', $monster->monstername) }}">
    </div>
        
    <div>           
        <strong>Category:</strong>
        <input type="text" name="category" value="{{ old('category', $monster->category) }}">
    </div>
        
    <div>           
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description', $monster->description) }}">
    </div>    

    <div>           
        <strong>Type:</strong>
        <select name="type_id">
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if (old('type_id',$monster->type_id) == $type->id) selected @endif >{{ $type->name }}</option>       
            @endforeach            
        </select>
    </div>
        
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
@endsection