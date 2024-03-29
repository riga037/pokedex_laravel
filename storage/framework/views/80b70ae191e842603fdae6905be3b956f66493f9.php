

<?php $__env->startSection('content'); ?>

<br>

<h1>Type Information</h1>

<hr>

<h2 id="name">Name: </h2>
<h2>Description</h2>
<p id="description"></p>
<h2>Monsters</h2>
<ul id="monsters"></ul>

<script>
    
async function loadType(){

    try {
        
        const response = await fetch("http://localhost:8000/api/alltypes",
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

loadType();

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/types/api/show.blade.php ENDPATH**/ ?>