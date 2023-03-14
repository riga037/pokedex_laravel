<?php $__env->startSection('content'); ?>
<br>
<div class="content" style="text-align:center">
<h1>Who's That Pokémon ?</h1>
<br>
<div id="wrapper">
<img id="pkmn">
<br><br>
</div>
<div id="game">
Enter a name: <input type="text" id="enteredName">
<br><br>
<input type="button" id="button" class="btn btn-dark" value="Check">
<br>
<h3 id="msg" style="padding-top:10px"></h3>
</div>
<div id="data" style="display:none;">
<h3 id="item1"></h3>
<h3 id="item2"></h3>
<h3 id="item3"></h3>
</div>
<h3 id="points">0 points</h3>
<h3 id="total"></h3>
<h3 id="timer">Time left: 50 s</h3>
<input type="button" id="again" class="btn btn-dark" value="Next Pokémon">
</div>

<script type="text/javascript">

pkmn = document.getElementById("pkmn");
data = document.getElementById("data");
item1 = document.getElementById("item1");
item2 = document.getElementById("item2");
item3 = document.getElementById("item3");

async function apiCall() {
    
    try {
        
        var rand = Math.floor(Math.random() * 15);
        
        const response = await fetch("http://localhost:8000/api/allmonsters",
            {headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + window.localStorage.getItem('token')
            }
            });
        const json = await response.json();
        console.log(json);
        const monster = json[rand];
        pkmn.src = "/img/" + monster.id + ".gif";
        pkmn.style.filter = "brightness(0%)";
        item1.textContent = "#" + monster.id;
        item2.textContent = monster.monstername;
        item3.textContent = monster.type.name + " type";
        
    } catch(error) {
        
    }
    
}

function check() {
    if(document.getElementById("enteredName").value == item2.textContent) {
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

function reload() {
    apiCall();
    document.getElementById("pkmn").style.filter = "brightness(0%)";
    document.getElementById("game").style.display = "block";
    document.getElementById("data").style.display = "none";
    document.getElementById("msg").innerHTML = "";
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

var timeLeft = 50;
var timerId = setInterval(countdown, 1000);

var numPoints = 0;

var img = document.getElementById("pkmn");
var num = document.getElementById("item1");
var pkmnName = document.getElementById("item2");
var pkmnType = document.getElementById("item3");
var points = document.getElementById("points");

document.getElementById("button").addEventListener("click",check,false);
document.getElementById("again").addEventListener("click",reload,false);

apiCall();

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/game.blade.php ENDPATH**/ ?>