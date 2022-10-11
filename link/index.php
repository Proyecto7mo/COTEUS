<?php
    session_start();
    //echo $_GET['grcl'];
    //Comprueba que el usuario este logueado
    if(isset($_SESSION['user_id'])){
        //Comkprueba que halla una url pero no demuestra que sea valida
        if(isset($_GET['grcl']))
        {
            JoinGroup();
        }
    }
    else
    {
        $_SESSION['url']=$_SERVER["REQUEST_URI"];
        header('Location: ../Login');
    }
    function JoinGroup(){
        require_once '../class/group.php';
            $user_id=$_SESSION['user_id'];
            $groups_list=group::getgroups($user_id);
            //echo "hola";
            foreach ($groups_list as $key) {
                $grcl=$key->id_groups."-".$key->clave;
                if(password_verify($grcl, $_GET['grcl'])){
                    //Existe el grupo y estas unido a el con tu seccion actual asi que te redirije
                    $gr=$key->id_groups;
                    $grh=password_hash($gr, PASSWORD_BCRYPT);
                    $_SESSION['gr']=$grh;
                    header("Location: ../Grupo/group.php");
                    return 0;
                    echo "vamos capo";
                }
            }

        require_once '../class/employee.php';
            $allgroups_list=group::getallgroups();
            foreach($allgroups_list as $key){
                $grcl=$key->id_groups."-".$key->clave;
                if(password_verify($grcl, $_GET['grcl'])){
                    employee::joingroup($user_id, $key->id_groups);
                    $gr=$key->id_groups;
                    $grh=password_hash($gr, PASSWORD_BCRYPT);
                    $_SESSION['gr']=$grh;
                    header("Location: ../Grupo/group.php");
                }
            }

            echo "No se encontro tal grupo";

            //http://localhost/coteus/link/?grcl=dg
    }
?>