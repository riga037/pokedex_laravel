

<?php $__env->startSection('content'); ?>

<br>

<h1>Monster Information</h1>

<hr>

<img id="image" onerror="this.onerror=null; this.src='/img/undetermined.gif'">
<br><br>
<h2 id="name">Name: </h2>
<h2 id="type">Type : </h2>
<h2 id="category">Category: </h2>
<h2>Description</h2>
<p id="description"></p>
<h2>Moves</h2>
<ul id="moves"></ul>

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
            document.getElementById("name").innerHTML += row.monstername;
            document.getElementById("type").innerHTML += row.type.name;
            document.getElementById("category").innerHTML += row.category;
            document.getElementById("description").innerHTML = row.description;
            for (const move of row.moves){
                document.getElementById("moves").innerHTML += "<li>"+move.name+"</li>";
            }
        }
        
    }
    
} catch(error) {
    
}
}

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('id');

loadMonster();

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/monsters/api/show.blade.php ENDPATH**/ ?>