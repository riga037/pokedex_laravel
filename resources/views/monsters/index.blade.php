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
                @if ($monster->type_id==1)
                <img src="https://raw.githubusercontent.com/riga037/pokedex_laravel/main/img/{{ $monster->id }}.gif" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: rgb(228,255,177);background: radial-gradient(circle, rgba(228,255,177,1) 0%, rgba(7,255,0,1) 96%);">
                @elseif ($monster->type_id==2)
                <img src="https://raw.githubusercontent.com/riga037/pokedex_laravel/main/img/{{ $monster->id }}.gif" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background:rgb(255,177,177);background: radial-gradient(circle, rgba(255,177,177,1) 0%, rgba(255,0,0,1) 96%);">
                @else
                <img src="https://raw.githubusercontent.com/riga037/pokedex_laravel/main/img/{{ $monster->id }}.gif" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background:rgb(177,207,255); background:radial-gradient(circle, rgba(177,207,255,1) 0%, rgba(99,159,231,1) 100%);">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><strong>#{{ $monster->id }} {{ $monster->monstername }}</strong></h5>
                    <p class="card-text"><strong>Type:</strong> {{ $monster->type->name }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $monster->category }}</p>
                    <h6><strong>Description:</strong></h6>
                    <p class="card-text">{{ $monster->description }}</p>
                    <h6><strong>Moves:</strong></h6>
                    <p class="card-text">
                    <ul>
                        @foreach($monster->moves as $move)
                            <li>
                            {{ $move->name }} 
                            </li>
                        @endforeach
                    </ul>
                    </p>
                    @if(Auth::user()->role=='admin') 
                    <h6><strong>Options:</strong></h6>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('monsters.editmoves',$monster->id) }}'">Moves</button>
                    <button type="button" class="btn btn-success" onclick="location.href='{{ route('monsters.edit',$monster->id) }}'">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='{{ route('monsters.destroy',$monster->id) }}'">Delete</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <br>

    {{ $monsters->links('pagination::bootstrap-4') }}
      
@endsection
