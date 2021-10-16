function ValidarRegistro(){
    var resp = confirm("Estas seguro que desea registrarse con estos datos?, recuerde que estos mismo seran utilizados para sus compras");
    if(resp == true){
        return true;
    }else{
        return false;
    }
}