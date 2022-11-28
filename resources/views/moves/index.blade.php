@extends('plantilla')

@section('content')
    <div>        
        <h2>Moves</h2>
    </div>
    <div>
        <a href="{{ route('moves.create') }}">New Move</a>
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

       
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>           
                <th>Operations</th>
            </tr>
        </thead>
        
        @foreach ($moves as $move)
        
        <tr>
            <td>{{ $move->id }}</td>
            <td>{{ $move->name }}</td>     
            <td>{{ $move->description }}</td>                           
            <td>     
                  <a href="{{ route('moves.show',$move->id) }}">Show</a> 
                  @if(Auth::user()->role=='admin')       
                  <a href="{{ route('moves.edit',$move->id) }}">Edit</a>
                  <a href="{{ route('moves.destroy',$move->id) }}">Delete</a>  
                  @endif             
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $moves->links('pagination::bootstrap-4') }}
      
@endsection