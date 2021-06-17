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
