var formul=NaN;
var formulaux=NaN;
var c=0;
var c2=0;
function state()
{
    var nombreformula=document.getElementById("nombre_formula").value;
    var formula=document.getElementById("formula").value;
    var dataen="nombre_formula="+nombreformula  +"&formula="+formula;

    $.ajax({
        type:'post',
        url:'guard.php',
        data:dataen
    });
    setTimeout(function(){
        $('#Tformulas').load('mostr.php');
    },400);

    return false;
}

$(document).ready(function(){
            $('#Tformulas').load('mostr.php');
});

$(function() {
    $('#Tformulas').change(function() {
    var s=document.getElementById("Tformulas");
    $("#nombre_formula").val($("#Tformulas option:selected").attr('id'));
    $("#formula").val($("#Tformulas option:selected").val());
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
    var words="abcdefghijklmnñopqrstuvwxyz";
    var Words=words.split("");
    divInputs.innerHTML="";
    var Formula=formula.toLowerCase().split("");

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
            np.textContent=leter.toUpperCase();
            input.type = "number";
            input.id = leter;
            input.name = leter;
            input.onchange=function(){operacion();};
            divInputs.appendChild(np);
            divInputs.appendChild(input);
            Words.splice(k,1);
        }
    }
    }
}

    var arrnum=[];
    var arrids=[];
    function operacion()
    {
        var divInputs=document.getElementById("Inputs");
        var formula=document.getElementById("formula").value;
        var Formula=formula.toLowerCase();
        $("#Inputs > input[type=\"number\"]").each(function(){
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
    
    
    function operacion2()
    {
        if(c==0)
            {
            var f;
            var formula=document.getElementById("formula").value;
            formul=formula.toLowerCase();
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
        label.textContent=r;
        label.type = "number";
        label.id = "labres";
        label.name = "labres";
        divRespuesta.appendChild(label);
        if(isNaN(r)){
            divRespuesta.innerHTML="";
        }
    }

    