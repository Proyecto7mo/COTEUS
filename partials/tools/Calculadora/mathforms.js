var formex=NaN;
var auxform=NaN;
var c=0;
var c2=0;
function state()
{
    var name=document.getElementById("form-name").value;
    var form=document.getElementById("mathform").value;
    var dataen="nombre_formula="+name  +"&formula="+form;

    $.ajax({
        type:'post',
        url:'saveform.php',
        data:dataen
    });
    setTimeout(function(){
        $('#Tformulas').load('printform.php');
    },400);

    return false;
}

$(document).ready(function(){
            $('#Tformulas').load('printform.php');
});

$(function() {
    $('#Tformulas').change(function() {
    var s=document.getElementById("Tformulas");
    $("#nombre_formula").val($("#Tformulas option:selected").attr('id'));
    $("#formula").val($("#Tformulas option:selected").val());
    Add();
    });
    });

function Add()
{
    c=0;
    formex=NaN;
    auxform=NaN;
    var resultbox=document.getElementById("result-box");
    resultbox.innerHTML="";
    var inputsbox=document.getElementById("data");
    var contador=0;
    var form=document.getElementById("mathform").value;
    form=form.replaceAll("^","**");
    var words="abcdefghijklmnñopqrstuvwxyzQWERTYUIOPASDFGHJKLÑZXCVBNM,;.:-_/*-+";
    var Words=words.split("");
    inputsbox.innerHTML="";
    form=form.toLowerCase();
    var ri;
    var rin;
    rin=form.indexOf("=");
    ri=form.slice(0,rin+1);
    form=form.replaceAll(ri,"");
    form=form.split("");
    var Form=form;

    for(i=0;i<Form.length;i++)
    {
    for(k=0;k<Words.length;k++)
    {
        if(Form[i]==Words[k])
        {
            var letter=Form[i];
            contador++;
            var data=document.createElement("data");
            var np=document.createElement("p");
            np.textContent=letter.toUpperCase();
            data.type = "number";
            data.id = letter;
            data.name = letter;
            data.onchange=function(){
                OperationF();
            };
            inputsbox.appendChild(np);
            inputsbox.appendChild(data);
            Words.splice(k,1);
        }
    }
    }
}

    var arrnum=[];
    var arrids=[];
    function OperationF()
    {
    
        $("#data > data[type=\"number\"]").each(function(){
        
            var stop=document.getElementById($(this).attr('id')).value;
            
            if(stop!="")
            {
              arrnum.push(stop);
              arrids.push($(this).attr('id'));
            }
          });

        OperationS();

        arrnum=[];
        arrids=[];
    }
    
    var ri;
    var rin;

    function OperationS()
    {
        if(c==0)
            {
            var f;
            var form=document.getElementById("math-form").value;
            formex=form.toLowerCase();

            rin=formex.indexOf("=");
            ri=formex.slice(0,rin+1);
            formex=formex.replaceAll(ri,"");

            auxform=formex;
            c++;
            }
            auxform=formex;
        for(i=0;i<arrnum.length;i++)
        {
            f=auxform.replaceAll(arrids[i],arrnum[i]);
            auxform=f;
        }
        f=auxform;

        var r;
        r=NaN;
        r=eval(f);
        var resultbox=document.getElementById("resultbox");
        var sentence=document.createElement("sentence");
        resultbox.innerHTML="";
        sentence.textContent="";
        sentence.textContent=ri+""+r;
        sentence.type = "number";
        sentence.id = "sentence-id";
        sentence.name = "sentence-name";
        resultbox.appendChild(sentence);
        if(isNaN(r)){
            resultbox.innerHTML="";
        }
    }

    