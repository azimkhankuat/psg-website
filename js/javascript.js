function responsive() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function likeFunction(x) {
    x.style.fontWeight = "bold";
    x.innerHTML = "✓ Liked";
}

function redshirt(){
    var x = document.getElementById('red-shirt');
    x.src = "img/red_shirt.jpg";
    x.style.display = "block";
}

function hechtershirt(){
    var x = document.getElementById('red-shirt');
    x.src="img/hechter_shirt.jpg";
    x.style.display = "block";
}

function whiteshirt(){
    var x = document.getElementById('red-shirt');
    x.src="img/white_shirt.jpg";
    x.style.display = "block";
}

function blackshirt(){
    var x = document.getElementById('red-shirt');
    x.src="img/black_shirt.jpg";
    x.style.display = "block";
}

function orangeshirt(){
    var x = document.getElementById('red-shirt');
    x.src="img/orange_shirt.jpg";
    x.style.display = "block";
}