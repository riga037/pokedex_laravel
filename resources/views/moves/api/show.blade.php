@extends('plantilla')

@section('content')

<br>

<h1>Move Information</h1>

<hr>

<h2 id="name">Name: </h2>
<h2>Description</h2>
<p id="description"></p>
<h2>Monsters</h2>
<ul id="monsters"></ul>

<script>
    
async function loadMove(){

    try {
        
        const response = await fetch("http://localhost:8000/api/allmoves",
        {headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }
    });
    
    const json = await response.json();

    var noImage = 'this.onerror=null; this.src="/img/show/undetermined.gif"';
    
    for (const row of json) {
        if(row.id == id){
            document.getElementById("name").innerHTML += row.name;
            document.getElementById("description").innerHTML = row.description;
            for (const monster of row.monsters){
                document.getElementById("monsters").innerHTML += "<li>"+monster.monstername+" <img src='/img/show/"+monster.id+".gif'onerror='"+noImage+"'>";
            }
        }
        
    }
    
} catch(error) {
    
}
}

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('id');

loadMove();

</script>

@endsection