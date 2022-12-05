<!-- @extends('plantilla')
  
@section('content')
<br>
<div class="float-right">
    <button type="button" class="btn btn-link" onclick="location.href='{{ route('monsters.index') }}'">Back</button>
</div>
<br>
<h2>Monster Data</h2>
              
<div>
        
    <div>
        <strong>Monster Name:</strong>
        {{ $monster->monstername }}
    </div>
        
    <div>            
       <strong>Category:</strong>
       {{ $monster->category }}
    </div>
    <div>
        <strong>Description:</strong>
        {{ $monster->description }}
    </div>
        
    <div>
        <strong>Type:</strong>
        {{ $monster->type->name }}
    </div>
        
    <div>
        <strong>Moves:</strong>
        <ul>
        @foreach($monster->moves as $move)
            <li>
            {{ $move->name }} 
            </li>
        @endforeach
        </ul>
    </div>
        
@endsection -->