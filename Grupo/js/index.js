window.onload(showFiles());

//const aumentar = document.getElementById("aumentar");
//const eliminar = document.getElementById("eliminar");
//document.getElementsByClassName

/*const alerta = () => {
    return false;
  Swal.fire({
    title: "Estas seguroo?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "SI",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
      //$("#Aumentar").submit();
    }
  });
};*/

//aumentar.onclick = alert;
//eliminar.onclick = alert;
window.onload=setTimeout(Buscar,01);
//alert("djg");

function state(){
    /*$('#Eliminar').on('submit', function() {
        alert();
    
        return true;
    });*/
    alerta();
}

function Buscar(){
    let grup=document.getElementById("grup").value;
    let val="Buscar";
    var parametros={
        "grup" : grup,
        "val" : val
    };
    $.ajax({
        url:"./../class/Gantt.php",
        type:"post",
        data:parametros,
        success:function(res){
            //let resp=JSON.parse(res);
            document.getElementById("gantt").innerHTML;
            //let g=document.getElementById("create-task");
            $('div.create-task').html(res);
            console.log(res);
            //alert(res);
        },
        error:function(xhr, status){
            //alert("Error de conexión");
        }
    });
}

/*function Buscar(){
    document.querySelector('#dropdownMenuTask').click();
}*/

function agregarTask(){
  alert("hola");
    $.ajax({
      url:"./../class/Gantt.php",
      type:"post",
      data:$("#subTask").serialize(),
      success:function(res){
        //let resp=JSON.parse(res);
        document.getElementById("gantt").innerHTML;
        //let g=document.getElementById("create-task");
        $('div.create-task').html(res);
        console.log(res);
        document.getElementById("subTask").reset()
        //alert(res);
      },
      error:function(xhr, status){
          //alert("Error de conexión");
      }
    });
    return false;
}

function showFiles(){
  Buscar();
  //alert("hola");
  $.ajax({
    url:"./../partials/upload_files/upload_files.php",
    type:"post",
    data:$("#user").serialize(),
    success:function(res){
      //let resp=JSON.parse(res);
      //document.getElementById("gantt").innerHTML;
      //let g=document.getElementById("create-task");
      //$('div.create-task').html(res);
      //console.log(res);
      //document.getElementById("subTask").reset()
      //alert(res);
      $('div#filesContain').html(res);
      //alert(res);
    },
    error:function(xhr, status){
        //alert("Error de conexión");
    }
  });
  return false;
}