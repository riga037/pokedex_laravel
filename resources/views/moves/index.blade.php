@extends('plantilla')
@section('content')
    <br>
    <div>        
        <h2>Moves</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='{{ route('moves.create') }}'">New Move</a>
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
                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('moves.show',$move->id) }}'">Show</button> 
                  @if(Auth::user()->role=='admin')       
                  <button type="button" class="btn btn-success" onclick="location.href='{{ route('moves.edit',$move->id) }}'">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="location.href='{{ route('moves.destroy',$move->id) }}">Delete</button>  
                  @endif             
            </td>
        </tr>
        @endforeach
    </table>
    {{ $moves->links('pagination::bootstrap-4') }}
      
@endsection