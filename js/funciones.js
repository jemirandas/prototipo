
function regresarEliminar(){
    
    var tam=document.getElementsByTagName("input").length;
    var bandera=false;

    for(var i=0;i<tam;i++){
    var check=document.getElementsByTagName("input")[i];

    if(check.type=="checkbox"){

        if(check.checked){
            var r=confirm("¿Seguro que desea salir de esta página sin guardar cambios?");
            if(r==true){
                location.href="inicioAdministrador.php";
                break;
            }
            else{
               bandera=true;
               break;
            }
        }
    }

}

if(bandera==false){
location.href="index.php";
}
}





