<?php
  session_start();

  //Comkprueba que halla una url pero no demuestra que sea valida
  if(isset($_SESSION['user_id']) && isset($_GET['grcl']))
    JoinGroup();
  else {
    $_SESSION['url'] = $_SERVER["REQUEST_URI"];
    header('Location: ../Login');
  }

  function JoinGroup(){
    require_once '../class/group.php';
    require_once '../class/employee.php';

    $user_id = $_SESSION['user_id'];
    $groups_list = group::getgroups($user_id);
    
    foreach ($groups_list as $group) {
      $grcl = $group->id_group . "-" . $group->key;
    
      if(password_verify($grcl, $_GET['grcl'])){
        //Existe el grupo y estas unido a el con tu seccion actual asi que te redirije
        $gr = $group->id_group;
        $grh = password_hash($gr, PASSWORD_BCRYPT);
        $_SESSION['gr'] = $grh;
        header("Location: ../Grupo/group.php");
        
        return 0;
      }
    }

    $allgroups_list = group::getallgroups();
    
    foreach($allgroups_list as $group){
      $grcl = $group->id_group . "-" . $group->key;
      
      if(password_verify($grcl, $_GET['grcl'])){
        employee::joingroup($user_id, $group->id_group);
        $gr = $group->id_group;
        $grh = password_hash($gr, PASSWORD_BCRYPT);
        $_SESSION['gr'] = $grh;
        
        header("Location: ../Grupo/group.php");
      }
    }

    echo "No se encontro tal grupo";
  }
