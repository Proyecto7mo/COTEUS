var formul=NaN;
var formulaux=NaN;
var c=0;
var c2=0;
function state()
{
    var nombreformula=document.getElementById("nombre_formula").value;
    var formula=document.getElementById("formula").value;
    var dataen={
        "valfor" : "GuardarF",
        "nombre_formula" : nombreformula,
        "formula" : formula
    }
    $.ajax({
        type:'post',
        url:'http://localhost/coteus/partials/HTML/nav/guard.php',
        data:dataen,
        success:function(res){
            
        }
    });
    setTimeout(function(){
        $('#Tformulas').load('http://localhost/coteus/partials/HTML/nav/mostr.php');
    },400);

    return false;
}

function deleteF(){
    var nombreformula=document.getElementById("nombre_formula").value;
    var formula=document.getElementById("formula").value;
    var id_for=$("#Tformulas option:selected").attr('id');
    var dataen={
        "valfor" : "EliminarF",
        "id_calc" : id_for
    }
    $.ajax({
        type:'post',
        url:'http://localhost/coteus/partials/HTML/nav/guard.php',
        data:dataen,
        success:function(res){

        }
    });
    setTimeout(function(){
        $('#Tformulas').load('http://localhost/coteus/partials/HTML/nav/mostr.php');
    },400);
}

$(document).ready(function(){
            $('#Tformulas').load('http://localhost/coteus/partials/HTML/nav/mostr.php');
});

$(function() {
    $('#Tformulas').change(function() {
    var s=document.getElementById("Tformulas");
    formulasComp=$("#Tformulas option:selected").val();
    formulasComp=formulasComp.split('|');
    if(formulasComp[0]!="Seleccione una formula"){
        $("#nombre_formula").val(formulasComp[0]);
        $("#formula").val(formulasComp[1]);
    }
    //$("#nombre_formula").val($("#Tformulas option:selected").attr('id'));
    //$("#formula").val($("#Tformulas option:selected").val());
    AñInputs();
    });
    });

function AñInputs()
{
    c=0;
    formul=NaN;
    formulaux=NaN;
    var divRespuesta=document.getElementById("resp");
    divRespuesta.innerHTML="";
    var divInputs=document.getElementById("Inputs");
    var contador=0;
    var formula=document.getElementById("formula").value;
    formula=formula.replaceAll("^","**");
    var words="abcdefghijklmnñopqrstuvwxyz";
    var Words=words.split("");
    divInputs.innerHTML="";
    formula=formula.toLowerCase();
    var ri;
    var rin;
    rin=formula.indexOf("=");
    ri=formula.slice(0,rin+1);
    formula=formula.replaceAll(ri,"");
    formula=formula.split("");
    var Formula=formula;

    for(i=0;i<Formula.length;i++)
    {
    for(k=0;k<Words.length;k++)
    {
        if(Formula[i]==Words[k])
        {
            var leter=Formula[i];
            contador++;
            var input=document.createElement("input");
            var np=document.createElement("p");
            var divcol=document.createElement("div");
            np.textContent=leter.toUpperCase();
            input.type = "number";
            input.className = "InpN";
            input.id = leter;
            input.name = leter;
            input.onchange=function(){operacion();};
            //divInputs.appendChild(np);
            //divInputs.appendChild(input);
            divcol.className="col";
            divcol.id="columna";
            divcol.appendChild(np);
            divcol.appendChild(input);
            divInputs.appendChild(divcol)
            Words.splice(k,1);
        }
    }
    }
}

    var arrnum=[];
    var arrids=[];
    function operacion()
    {
        /*$("#Inputs > div").each(function(){

        });*/
        $("#Inputs > div > input[type=\"number\"]").each(function(){
                var para=document.getElementById($(this).attr('id')).value;
              if(para!="")
              {
              arrnum.push(para);
              arrids.push($(this).attr('id'));
              }
          });
        operacion2();
        arrnum=[];
        arrids=[];
    }
    
    var ri;
    var rin;
    function operacion2()
    {
        if(c==0)
            {
            var f;
            var formula=document.getElementById("formula").value;
            formul=formula.toLowerCase();

            rin=formul.indexOf("=");
            ri=formul.slice(0,rin+1);
            formul=formul.replaceAll(ri,"");

            formulaux=formul;
            c++;
            }
            formulaux=formul;
        for(i=0;i<arrnum.length;i++)
        {
            f=formulaux.replaceAll(arrids[i],arrnum[i]);
            formulaux=f;
        }
        f=formulaux;

        var r;
        r=NaN;
        r=eval(f);
        var divRespuesta=document.getElementById("resp");
        var label=document.createElement("label");
        divRespuesta.innerHTML="";
        label.textContent="";
        label.textContent=ri+""+r;
        label.type = "number";
        label.id = "labres";
        label.name = "labres";
        divRespuesta.appendChild(label);
        if(isNaN(r)){
            divRespuesta.innerHTML="";
        }
    }

    