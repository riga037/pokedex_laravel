@extends('plantilla')
   
@section('content')
<div>
    <a href="{{ route('monsters.index') }}">Back</a>
</div>
<div>    
    <h2>Moves of {{ $monster->monstername }}</h2>
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


<div class="row">

    <div class="col-sm">
     	<form method='POST' action="{{ route('monsters.detachmoves',$monster->id) }}">
            @csrf
	     	<div class="form-group">
	    	  <label>Assigned Moves</label>
	    	  <select multiple  size="10" name="moves[]" class="form-control">
	    			
	    		@foreach($monster->moves as $move) {		
	                  <option value="{{ $move->id }}">
                            {{ $move->name }}                              
                          </option>                         
	                @endforeach
	    			
	    	</select>
	    	</div>
	    	<input type="submit" value="Discard Moves" class="btn btn-dark">
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action="{{ route('monsters.assignmoves',$monster->id) }}">
             @csrf
      		<div class="form-group">
    		<label>Moves List</label>
    		<select multiple class="form-control" size="20" name="moves[]">
          
    		  @foreach($moves as $move) {        
                    <option value="{{ $move->id }}">
                      {{ $move->name }}                              
                    </option>                         
                  @endforeach
    		</select>
    		
    		</div>
    		<input class="btn btn-dark" value="Assign Moves" type="submit">
    	</form>
    </div>
    
  </div>

@if (session('success'))
  <div class="alert alert-success">
     <p>{{ session('success') }}</p>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

@endsection