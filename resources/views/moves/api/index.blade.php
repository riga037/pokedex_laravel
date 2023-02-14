@extends('plantilla')

@section('content')

<!-- <div class="content">
            <h1>Who's That Pokémon ?</h1>
    <div id="wrapper">
        <img id="pkmn">
    </div>
    <div id="game">
        Enter a name: <input type="text" id="enteredName">
        <br><br>
        <input type="button" id="button" value="Check">
        <h3 id="msg"></h3>
    </div>
    <div id="data">
                <h3 id="item1"></h3>
        <h3 id="item2"></h3>
        <h3 id="item3"></h3>
    </div>
    <h3 id="points">0 points</h3>
    <h3 id="total"></h3>
    <h3 id="timer">Time left: 100 s</h3>
    <input type="button" id="again" value="Next Pokémon">
    </div>

    <script type="text/javascript">
    
    async function apiCall() {
        
                var rand = Math.floor(Math.random() * 15);
        
        await fetch("https://pokeapi.co/api/v2/pokemon/" + rand)
        .then(response => response.json())
        .then(pokemon => {
            img.src = "/pkmn/" + rand + ".gif";
            num.textContent = "#" + pokemon.id;
            pkmnName.textContent = pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1);
            pkmnType.textContent = pokemon.types[0].type.name.charAt(0).toUpperCase() + pokemon.types[0].type.name.slice(1);
            if(pokemon.types[1] != null) {
                pkmnType.textContent += "/" + pokemon.types[1].type.name.charAt(0).toUpperCase() + pokemon.types[1].type.name.slice(1)
            }
            pkmnType.textContent += " type";
            document.getElementById("pkmn").style.filter = "brightness(0%)";
            document.getElementById("game").style.display = "block";
            document.getElementById("data").style.display = "none";
            document.getElementById("msg").innerHTML = "";
        })
    }
    
    function check() {
        if(document.getElementById("enteredName").value == pkmnName.textContent) {
            document.getElementById("pkmn").style.filter = "brightness(100%)";
            document.getElementById("game").style.display = "none";
            document.getElementById("data").style.display = "block";
            numPoints++;
            points.innerHTML = numPoints + " points";
            console.log(numPoints);
        } else {
            document.getElementById("msg").innerHTML = "Wrong name!";
        }
        
    }
    
    function countdown() {
        if (timeLeft == 0) {
            clearTimeout(timerId);
            document.getElementById("points").style.display = "none";
            document.getElementById("timer").innerHTML = "Time's up!";
            document.getElementById("total").innerHTML = "Total points: " + numPoints;
        } else {
            document.getElementById("timer").innerHTML = "Time left: " + timeLeft + " s";
            timeLeft--;
        }
    }
    
    var timeLeft = 100;
    var timerId = setInterval(countdown, 1000);
    
    var numPoints = 0;
    
    var img = document.getElementById("pkmn");
            var num = document.getElementById("item1");
    var pkmnName = document.getElementById("item2");
    var pkmnType = document.getElementById("item3");
    var points = document.getElementById("points");
    
    document.getElementById("button").addEventListener("click",check,false);
    document.getElementById("again").addEventListener("click",apiCall,false);
    
    apiCall();
    
    </script> -->

<br>

<h1>CRUD Moves</h1>

<hr>

<input type="button" class="btn btn-info" id="createButton" onclick="showForm()" value="Create/Update Form">

<div id="createForm" style="display:none">
    Name:
    <input type="text" id="moveNameInput"><br><br>
    Description:
    <input type="text" id="moveDescriptionInput"><br><br>
    <input type="button" class="btn btn-dark" id="saveButton" onclick="showForm()" value="Save new Move">
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
    
    const divErrors = document.getElementById("errors");
    divErrors.style.display = "none";
    
    const url = "http://127.0.0.1:8000/api/moves";

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
        
        try {
            
            const response = await fetch(url);
            const json = await response.json();
            const rows = json.data.data;
            
            for (const row of rows) {
                document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td>"+row.description+"</td><td><input type=button onclick='deleteMove("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='updateMove("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";
            }

            const links = json.data.links;

            afegirLinks(links);
            
        } catch(error) {
            
        }
        
    }
    
    async function getToken() {
        try {
            const response = await fetch('http://127.0.0.1:8000/token');
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
    
    var newType = {
        'name' : moveNameInput.value,
        'description' : moveDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json'
            },
            
            body: JSON.stringify(newMove)
        }
        
        )
        
        const data = await response.json();
        
        console.log(response);
        
        if(response.ok) {
            
            console.log(data.data);
            afegirFila(data.data);
            
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

async function updateMove(id) {
    
    console.log(id)
    
    var rowName = document.getElementById(id).children[1];
    console.log(rowName);
    var rowDescription = document.getElementById(id).children[2];
    console.log(rowDescription);
    
    var updatedType = {
        'name' : moveNameInput.value,
        'description' : moveDescriptionInput.value
    }
    
    try {
        
        const response = await fetch(url+"/"+id, {method: "PUT", headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json'
        },body: JSON.stringify(updatedMove)});
        
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
    
    document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td>"+row.description+"</td><td><input type=button onclick='deleteMove("+row.id+")' value='Delete' class='btn btn-danger m-2'><input type=button onclick='updateMove("+row.id+")' value='Update' class='btn btn-success m-2'></td></tr>";
    
    
}

async function getInfos() {
    await getToken();
    await getUser();
}

getInfos();
loadIntoTable(url);


</script>

@endsection