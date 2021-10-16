function ValidarSacarCarrito() {
    var resp = confirm("Estas seguro que desea sacar el producto del carrito?");
    if(resp == true){
        return true;
    }else{
        return false;
    }
}