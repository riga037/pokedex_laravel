@extends('plantilla')

@section('content')

<br>

<h1>CRUD Monsters</h1>

<hr>

<input type="button" class="btn btn-info" id="createButton" onclick="showForm()" value="Create/Update Form">

<div id="createForm" style="display:none">
Name:
<input type="text" id="monsterNameInput"><br><br>
Category:
<input type="text" id="monsterCategoryInput"><br><br>
Description:
<input type="text" id="monsterDescriptionInput"><br><br>
<input type="button" class="btn btn-dark" id="saveButton" onclick="showForm()" value="Save new Monster">
</div>

<div id="errors" class="alert alert-danger"></div>

<br>

<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Icon</th>
<th>Name</th>
<th>Category</th>
<th>Description</th>
<th>Type</th>
<th>Operations</th>
</tr>
</thead>
<tbody id="taula">
</tbody>
</table>

<nav class="mt-2">
<ul id="pagination" class="pagination"></ul>
</nav>

</body>
</html>

<script type="text/javascript">

const monsterNameinput = document.getElementById('monsterNameInput');
const monsterCategoryInput = document.getElementById('monsterCategoryInput');
const monsterDescriptionInput = document.getElementById('monsterDescriptionInput');
const saveButton = document.getElementById('saveButton');
saveButton.addEventListener('click', saveMonster);

const divErrors = document.getElementById("errors");
divErrors.style.display = "none";

const url = "http://localhost:8000/api/monsters";

function showForm() {
    
    document.getElementById("createButton").style.display = "none";
    document.getElementById("createForm").style.display = "block";
    
}

function showErrors(errors) {
    
    divErrors.style.display = "block";
    divErrors.innerHTML = "";
    const ul = document.createElement("ul");
    
    for (const error of errors) {
        const li = document.createElement("li");
        li.textContent = error;
        ul.appendChild(li);
    }
    
    divErrors.appendChild(ul);
    
}

function afegirLinks(links) {
    
    for(const link of links) {
        
        afegirBoto(link);
    }
}

function afegirBoto(link) {
    console.log(link);
    
    const pagli = document.createElement("li");
    pagli.classList.add('page-item');
    
    
    
    if(link.url == null) {
        pagli.classList.add('disabled');
        
    }
    
    if(link.active == true) {
        pagli.classList.add('active');
    }
    
    const pagAnchor = document.createElement("a");
    pagAnchor.innerHTML = link.label;
    pagAnchor.addEventListener('click', function(event) { paginate(link.url)});
    pagAnchor.classList.add('page-link');
    pagAnchor.setAttribute('href',"#");
    
    pagli.appendChild(pagAnchor);
    pagination.appendChild(pagli);
}

function paginate(url) {
    console.log(url);
    pagination.innerHTML = "";
    taula.innerHTML = "";
    loadIntoTable(url);
}

async function loadIntoTable(url) {
    
    var noImage = 'this.onerror=null; this.src="/img/show/undetermined.gif"';
    
    try {
        
        const response = await fetch(url,
        {headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }
    });
    const json = await response.json();
    const rows = json.data.data;
    
    for (const row of rows) {
        
        document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td><img src='/img/show/" + row.id + ".gif' onerror='"+noImage+"'></td><td>"+row.monstername+"</td><td>"+row.category+"</td><td>"+row.description+"</td><td>"+row.type.name+"</td><td><input type=button onclick='deleteMonster("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='updateMonster("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";
        
    }
    
    const links = json.data.links;
    
    afegirLinks(links);
    
} catch(error) {
    
}

}

async function getToken() {
    try {
        const response = await fetch('http://localhost:8000/token');
        const json = await response.json();
        window.localStorage.setItem("token", json.token);
        console.log(json);
    } catch (error) {
        console.log('error');
    }
}

async function getUser() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/user',
        {headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }
    }
);
const json = await response.json();
console.log(json);
} catch (error) {
    console.log('error');
}
}


async function saveMonster(event)  {
    
    console.log('Desar');
    
    var newMonster = {
        'name' : monsterNameInput.value,
        'category' : monsterCategoryInput.value,
        'description' : monsterDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json'
            },
            
            body: JSON.stringify(newMonster)
        }
        
        )
        
        const data = await response.json();
        
        console.log(response);
        
        if(response.ok) {
            
            console.log(data.data);
            afegirFila(data.data);
            
        } else {
            
            showErrors(data.data);
            console.log("Error creating monster.");
            
        }
        
    } catch (error) {
        //Errors de xarxa/connexió amb el servidor
        console.log('Server/network error.');
        
    }
    
}

async function deleteMonster(id) {
    
    console.log(id)
    
    try {
        
        const response = await fetch(url+"/"+id, {method: "DELETE"});
        const json = await response.json();
        
        if(response.ok) {
            const row = document.getElementById(id);
            console.log(row);
            row.remove();
        } else {
            console.log("Deleting error.");
        }
        
        console.log(json);
        
    } catch(error) {
        
        console.log('Error.');
        
    }
    
}

async function updateMonster(id) {
    
    console.log(id)
    
    var rowName = document.getElementById(id).children[1];
    console.log(rowName);
    var rowDescription = document.getElementById(id).children[2];
    console.log(rowDescription);
    
    var updatedMonster = {
        'name' : monsterNameInput.value,
        'category' : monsterCategoryInput.value,
        'description' : monsterDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url+"/"+id, {method: "PUT", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json'
        },body: JSON.stringify(updatedMonster)});
        
        const data = await response.json();
        
        if(response.ok) {
            const row = document.getElementById(id);
            console.log(row);
            rowName.innerHTML = data.data.name;
            rowDescription.innerHTML = data.data.description;
            
        } else {
            console.log("Updating error.");
            showErrors(data.data);
        }
        
        //console.log(json);
        
    } catch(error) {
        
        console.log('Error.');
        
    }
    
}

function afegirFila(row) {
    
    document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td><img src='/img/show/" + row.id + ".gif'></td><td>"+row.monstername+"</td><td>"+row.category+"</td><td>"+row.description+"</td><td>"+row.type.name+"</td><td><input type=button onclick='deleteMonster("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='updateMonster("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";    
    
}

async function getInfos() {
    await getToken();
    await getUser();
}

getInfos();
loadIntoTable(url);


</script>

@endsection