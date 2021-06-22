function confirmacion(e) {
    if (confirm("¿Está seguro de que desea eliminar el usuario?")){
        return true;
    } else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".tb");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click',confirmacion);
}

var boton = document.getElementById("button");
var input = document.getElementById("inputp");

button.addEventListener('click',showPassword);

function showPassword(){
    if(input.type == "password"){
        input.type = "text";
        boton.src ="ocultar.png";
        setTimeout("ocultar()", 3000);
    } else {
        input.type = "password";
        button.src = "mostrar.png";
    }
}
function hidePassword(){
        input.type="password";
        button.src ="ocultar.png";
    }