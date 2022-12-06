@extends('plantilla')
@section('content')
    <br>
    <div>        
        <h2>Monsters</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='{{ route('monsters.create') }}'">New Monster</button>
    </div>
    <div>
        
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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($monsters as $monster)
        <div class="col">
            <div class="card h-100">
                @if ($monster->type_id==1)
                <img src="/img/{{ $monster->id }}.gif" onerror="this.src='/img/undetermined.gif'"  class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(228,255,177,1) 0%, rgba(7,255,0,1) 96%);">
                @elseif ($monster->type_id==2)
                <img src="/img/{{ $monster->id }}.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(255,177,177,1) 0%, rgba(255,0,0,1) 96%);">
                @elseif ($monster->type_id==3)
                <img src="/img/{{ $monster->id }}.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background:radial-gradient(circle, rgba(177,207,255,1) 0%, rgba(99,159,231,1) 96%);">
                @else
                <img src="/img/{{ $monster->id }}.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(135,135,135,1) 100%);">
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
