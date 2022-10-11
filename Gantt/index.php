<?php
$val=$_POST["val"];
if($val=="Guardar"){
  $title=$_POST["title"];
  $asigned=$_POST["asigned"];
  $f_inicio=$_POST["f_inicio"];
  $f_fin=$_POST["f_fin"];
  $predecesora=$_POST["predecesora"];
  $id_grup=$_POST["grup"];
  //echo($tit);

  $g=new Gantt($title, $asigned, $f_inicio, $f_fin, $predecesora, $id_grup);
  $g->newTask();
  $tasks=Gantt::getTask($id_grup);
  $tasks=Gantt::to_string($tasks);
  echo($tasks);
}
else{
  $id_grup=$_POST["grup"];
  $tasks=Gantt::getTask($id_grup);
  $tasks=Gantt::to_string($tasks);
  echo($tasks);
}

class Gantt{

  public $title;
  public $asigned;
  public $f_inicio;
  public $f_fin;
  public $predecesora;
  public $id_grup;

  public function __construct($title, $asigned, $f_inicio, $f_fin, $predecesora, $id_grup){
    $this->title=$title;
    $this->asigned=$asigned;
    $this->f_inicio=$f_inicio;
    $this->f_fin=$f_fin;
    $this->predecesora=$predecesora;
    $this->id_grup=$id_grup;
  }

  public function newTask(){
    require '../datos/datos.php';

    datos::new_Task($this);
  }

  public static function getTask($id_grup){
    require_once '../datos/datos.php';

    $resp=datos::get_Task($id_grup);

    return $resp;
  }

  public static function to_string($tasks){
    $c=0;
    $res="";
    foreach($tasks as $key){
      if($c==0){
        $res=$res.'["'.$key->title.'","'.$key->startDate.'","'.$key->endDate.'",'.'"#c1409b"'.',"'.$key->assignment.'","'.$key->id_chores.'"]';
        $c=$c+1;
      }
      else{
        $res=$res.',["'.$key->title.'","'.$key->startDate.'","'.$key->endDate.'",'.'"#4287f5"'.',"'.$key->assignment.'","'.$key->id_chores.'"]';
      }
      //$res=$res.'['.$key->title.','.$key->startDate.','.$key->endDate.','.'#4287f5'.','.$key->assignment.']';
    }
    $c=0;
    $res='<script type="text/javascript"> new Gantt(['.$res.']); </script>';
    return $res;
  }
}
?>