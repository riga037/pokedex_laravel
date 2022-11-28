@extends('plantilla')

@section('content')
    <div>        
        <h2>Types</h2>
    </div>
    <div>
        <a href="{{ route('types.create') }}">New Type</a>
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
        
        @foreach ($types as $type)
        
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->description }}</td>                     
            <td>     
                  <a href="{{ route('types.show',$type->id) }}">Show</a> 
                  @if(Auth::user()->role=='admin')       
                  <a href="{{ route('types.edit',$type->id) }}">Edit</a>
                  <a href="{{ route('types.destroy',$type->id) }}">Delete</a>    
                  @endif           
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $types->links('pagination::bootstrap-4') }}
      
@endsection