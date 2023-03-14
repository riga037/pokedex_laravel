

<?php $__env->startSection('content'); ?>

<br>

<h1>Learn and Forget Moves</h1>

<hr>
<img id="image" onerror="this.onerror=null; this.src='/img/undetermined.gif'">
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
	    	<input type="button" value="Discard Moves" class="btn btn-dark">
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
    		<input type="button" class="btn btn-dark" value="Assign Moves">
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
            document.getElementById("name").innerHTML += row.monstername;
            for (const move of row.moves){
                document.getElementById("learnt").innerHTML += "<option value ='"+move.id+"'>"+move.name+"</option>";
            }
        }
        
    }
    
} catch(error) {
    
}
}

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('id');

var learntIds = [];

loadMonster();

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ricar\OneDrive\Documents\ViB\M7\pokedex_laravel\resources\views/monsters/api/edit.blade.php ENDPATH**/ ?>