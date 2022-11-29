@extends('plantilla')

@section('content')
    <div>        
        <h2>Monsters</h2>
    </div>
    <div>
        <a href="{{ route('monsters.create') }}">New Monster</a>
    </div>
        
    <br>
   
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

       
    <!-- <table class="table">
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
                <a href="{{ route('monsters.show',$monster->id) }}">Show</a> 
                @if(Auth::user()->role=='admin')       
                <a href="{{ route('monsters.editmoves',$monster->id) }}">Moves</a>       
                <a href="{{ route('monsters.edit',$monster->id) }}">Edit</a>
                <a href="{{ route('monsters.destroy',$monster->id) }}">Delete</a>
                @endif               
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $monsters->links('pagination::bootstrap-4') }} -->

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($monsters as $monster)
        <div class="col">
            <div class="card h-100">
            <img src="https://raw.githubusercontent.com/riga037/pokedex_laravel/main/img/{{ $monster->id }}.gif" class="card-img-top" style="margin:auto">
            <div class="card-body">
                <h5 class="card-title">#{{ $monster->id }} {{ $monster->monstername }}</h5>
                <p class="card-text">{{ $monster->category }}</p>
                <p class="card-text">{{ $monster->description }}</p>
            </div>
            </div>
        </div>
        @endforeach
    </div>

    <br>

    {{ $monsters->links('pagination::bootstrap-4') }}
      
@endsection
