window.onload(setTimeout(Buscar,700));

function Buscar(){
    let grup=document.getElementById("grup").value;
    let val="Buscar";
    var parametros={
        "grup" : grup,
        "val" : val
    };
    $.ajax({
        url:"./../Gantt/index.php",
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


const aumentar = document.getElementById("aumentar");
const eliminar = document.getElementById("eliminar");

const alert = () => {
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
    }
  });
};

aumentar.onclick = alert;
eliminar.onclick = alert;

/*function Buscar(){
    document.querySelector('#dropdownMenuTask').click();
}*/

function agregarTask(){
    $.ajax({
        url:"./../Gantt/index.php",
        type:"post",
        data:$("#subTask").serialize(),
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
    return false;
}