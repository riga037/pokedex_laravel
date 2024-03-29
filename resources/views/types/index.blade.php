@extends('plantilla')
@section('content')
    <br>
    <div>        
        <h2>Types</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='{{ route('types.create') }}'">New Type</a>
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
                <div class="d-flex">   
                  <button type="button" class="btn btn-primary m-2" onclick="location.href='{{ route('types.show',$type->id) }}'">Show</button>
                  @if(Auth::user()->role=='admin')       
                  <button type="button" class="btn btn-success m-2" onclick="location.href='{{ route('types.edit',$type->id) }}'">Edit</button>
                  <button type="button" class="btn btn-danger m-2" onclick="location.href='{{ route('types.destroy',$type->id) }}'">Delete</button>    
                  @endif  
                </div>         
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $types->links('pagination::bootstrap-4') }}
      
@endsection