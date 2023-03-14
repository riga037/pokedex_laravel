<?php $__env->startSection('content'); ?>

<br>

<h1>CRUD Moves</h1>

<hr>

<input type="button" class="btn btn-dark" id="createButton" onclick="showForm()" value="Create Form">

<div id="createForm" style="display:none">
Name:
<input type="text" id="moveNameInput"><br><br>
Description:
<input type="text" id="moveDescriptionInput"><br><br>
<input type="button" class="btn btn-dark" id="saveButton" value="Save new Move">
<input type="button" class="btn btn-dark" id="updateButton" value="Update Move">
</div>

<div id="errors" class="alert alert-danger"></div>

<br>

<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
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

const typeNameinput = document.getElementById('moveNameInput');
const typeDescriptionInput = document.getElementById('moveDescriptionInput');
const saveButton = document.getElementById('saveButton');
saveButton.addEventListener('click', saveMove);
const updateButton = document.getElementById('updateButton');
updateButton.addEventListener('click', updateMove);

const divErrors = document.getElementById("errors");
divErrors.style.display = "none";

var toUpdate = 0;

const url = "http://localhost:8000/api/moves";

function showForm() {
    
    document.getElementById("createButton").style.display = "none";
    document.getElementById("createForm").style.display = "block";
    document.getElementById("saveButton").style.display = "block";
    document.getElementById("updateButton").style.display = "none";
    
}

function showUpdateForm(id){
    
    document.getElementById("createButton").style.display = "none";
    document.getElementById("createForm").style.display = "block";
    document.getElementById("saveButton").style.display = "none";
    document.getElementById("updateButton").style.display = "block";
    
    var tr = document.getElementById(id);
    document.getElementById("moveNameInput").value = tr.children[1].outerText;
    document.getElementById("moveDescriptionInput").value = tr.children[2].outerText;
    toUpdate = id;
    
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
        document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td>"+row.description+"</td><td><a href='http://localhost:8000/moveshow?id="+row.id+"'><input type='button' value='Show' class='btn btn-info m-2'></input></a><input type=button onclick='deleteMove("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='showUpdateForm("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";
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


async function saveMove(event)  {
    
    console.log('Desar');
    
    var newMove = {
        'name' : moveNameInput.value,
        'description' : moveDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + window.localStorage.getItem('token')
            },
            
            body: JSON.stringify(newMove)
        }
        
        )
        
        const data = await response.json();
        
        console.log(response);
        
        if(response.ok) {
            
            console.log(data.data);
            afegirFila(data.data);

            document.getElementById("createButton").style.display = "block";
            document.getElementById("createForm").style.display = "none";
            document.getElementById("saveButton").style.display = "block";
            document.getElementById("updateButton").style.display = "none";

            divErrors.style.display = "none";
            
        } else {
            
            showErrors(data.data);
            console.log("Error creating move.");
            
        }
        
    } catch (error) {
        //Errors de xarxa/connexió amb el servidor
        console.log('Server/network error.');
        
    }
    
}

async function deleteMove(id) {
    
    console.log(id)
    
    try {
        
        const response = await fetch(url+"/"+id, {method: "DELETE", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        }});
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

async function updateMove(event) {
    
    console.log(toUpdate)
    
    var rowName = document.getElementById(toUpdate).children[1];
    console.log(rowName);
    var rowDescription = document.getElementById(toUpdate).children[2];
    console.log(rowDescription);
    
    var updatedMove = {
        'name' : moveNameInput.value,
        'description' : moveDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url+"/"+toUpdate, {method: "PUT", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + window.localStorage.getItem('token')
        },body: JSON.stringify(updatedMove)});
        
        const data = await response.json();
        
        if(response.ok) {
            const row = document.getElementById(toUpdate);
            console.log(row);
            rowName.innerHTML = data.data.name;
            rowDescription.innerHTML = data.data.description;

            document.getElementById("createButton").style.display = "block";
            document.getElementById("createForm").style.display = "none";
            document.getElementById("saveButton").style.display = "block";
            document.getElementById("updateButton").style.display = "none";

            divErrors.style.display = "none";
            
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
    
    document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td>"+row.description+"</td><td><a href='http://localhost:8000/moveshow?id="+row.id+"'><input type='button' value='Show' class='btn btn-info m-2'></input></a><input type=button onclick='deleteMove("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='showUpdateForm("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";
    
    
}

async function getInfos() {
    await getToken();
    await getUser();
}

getInfos();
loadIntoTable(url);


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ricar\OneDrive\Documents\ViB\M7\pokedex_laravel\resources\views/moves/api/index.blade.php ENDPATH**/ ?>