@extends('plantilla')

@section('content')

<br>

<h1>Learn and Forget Moves</h1>

<hr>
<img id="image" onerror="this.onerror=null; this.src='/img/undetermined.gif'">
<br><br>
<h2 id="name"></h2>

<div class="row">

<div class="col-sm">
<form>	     	
<div class="form-group">
<label>Assigned Moves</label>
<select multiple id="learnt" size="10" name="moves[]" class="form-control">                       	    			
</select>
</div>
<br>
<input id="detach" type="button" value="Discard Moves" class="btn btn-dark">
</form>

</div>
<div class="col-sm">
<form>
<div class="form-group">
<label>Moves List</label>
<select multiple id="canLearn" class="form-control" size="10" name="moves[]">                 
</select>
</div>
<br>
<input type="button" id="attach" class="btn btn-dark" value="Assign Moves">
</form>
</div>

</div>

</div>

<script>
async function loadMonster(){
    
    try {
        
        const response = await fetch("http://localhost:8000/api/allmonsters",
        {headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }
    });
    
    const json = await response.json();
    
    for (const row of json) {
        if(row.id == id){
            document.getElementById("image").src = "/img/"+row.id+".gif";
            if(row.type_id == 1){
                document.getElementById("image").style = "padding: 2em; background: radial-gradient(circle, rgba(228,255,177,1) 0%, rgba(7,255,0,1) 96%);";
            } else if(row.type_id == 2){
                document.getElementById("image").style = "padding: 2em; background: radial-gradient(circle, rgba(255,177,177,1) 0%, rgba(255,0,0,1) 96%);";
            }else if(row.type_id == 3){
                document.getElementById("image").style = "padding: 2em; background:radial-gradient(circle, rgba(177,207,255,1) 0%, rgba(99,159,231,1) 96%);"
            }else{
                document.getElementById("image").style = "padding: 2em; background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(135,135,135,1) 100%);"
            }
            document.getElementById("name").innerHTML = row.monstername;
            for (const move of row.moves){
                document.getElementById("learnt").innerHTML += "<option value ='"+move.id+"'>"+move.name+"</option>";
            }

            learntIds = Array.from(document.getElementById("learnt").options, option => parseInt(option.value));

        }
        
    }
    
} catch(error) {
    
}
}

async function loadMoveList(){
    
    try {
        
        const response = await fetch("http://localhost:8000/api/allmoves",
        {headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }
    });
    
    const json = await response.json();

    for (const row of json) {
        if(!learntIds.includes(row.id)){
            document.getElementById("canLearn").innerHTML += "<option value ='"+row.id+"'>"+row.name+"</option>";
        }
    }
    
} catch(error) {
    
}

}

async function detachmoves(event){
    
    forgetIds = Array.from(document.getElementById("learnt").selectedOptions, option => option.value);
    
    var detachMoves = {
        'monster_id' : id,
        'moves' : forgetIds
    }
    
    try {
        
        const response = await fetch("http://localhost:8000/api/detach", {method: "POST", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        },body: JSON.stringify(detachMoves)});
        
        const data = await response.json();
        
        if(response.ok) {
            
            document.getElementById("learnt").innerHTML = "";
            document.getElementById("canLearn").innerHTML = "";
            loadMonster();
            loadMoveList();
            
        } else {
            console.log("Detaching error.");
            showErrors(data.data);
        }
        
    } catch(error) {
        
        console.log('Error.');
        
    }
    
}

async function attachmoves(event){
    
    learnIds = Array.from(document.getElementById("canLearn").selectedOptions, option => option.value);
    
    var attachMoves = {
        'monster_id' : id,
        'moves' : learnIds
    }
    
    try {
        
        const response = await fetch("http://localhost:8000/api/attach", {method: "POST", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        },body: JSON.stringify(attachMoves)});
        
        const data = await response.json();
        
        if(response.ok) {
            
            document.getElementById("learnt").innerHTML = "";
            document.getElementById("canLearn").innerHTML = "";
            loadMonster();
            loadMoveList();
            
        } else {
            console.log("Attaching error.");
            showErrors(data.data);
        }
        
    } catch(error) {
        
        console.log('Error.');
        
    }
    
}

var detach = document.getElementById('detach');
detach.addEventListener('click', detachmoves);
var attach = document.getElementById('attach');
attach.addEventListener('click', attachmoves);

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('id');
var learntIds = [];

loadMonster();
loadMoveList();

</script>

@endsection