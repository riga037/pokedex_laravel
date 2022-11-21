@extends('plantilla')

@section('content')
    <div>        
        <h2>Monsters</h2>
    </div>
    <div>
        <a href="{{ route('monsters.create') }}">New Monster</a>
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
                <th>Monster Name</th>
                <th>Category</th>                        
                <th>Description</th>
                <th>Operations</th>
            </tr>
        </thead>
        
        @foreach ($monsters as $monster)
        
        <tr>
            <td>{{ $monster->id }}</td>
            <td>{{ $monster->monstername }}</td>
            <td>{{ $monster->category }}</td>
            <td>{{ $monster->description }}</td>                      
            <td>     
                <a href="{{ route('monsters.editmoves',$monster->id) }}">Moves</a>  
                <a href="{{ route('monsters.show',$monster->id) }}">Show</a>        
                <a href="{{ route('monsters.edit',$monster->id) }}">Edit</a>
                <a href="{{ route('monsters.destroy',$monster->id) }}">Delete</a>               
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $monsters->links('pagination::bootstrap-4') }}
      
@endsection
