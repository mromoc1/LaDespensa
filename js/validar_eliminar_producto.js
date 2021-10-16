function ValidarSacarProducto() {
    var resp = confirm("Estas seguro que desea eliminar el producto?");
    if(resp == true){
        return true;
    }else{
        return false;
    }
}