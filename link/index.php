<?php
    session_start();
    echo $_GET['gr'];
    if(isset($_SESSION['user_id'])){
        if(isset($_GET['gr'])&&isset($_GET['cl']))
        {
            require_once '../class/group.php';
            $user_id=$_SESSION['user_id'];
            $groups_list=group::getgroups($user_id);
            //echo "hola";
            foreach ($groups_list as $key) {
                if(($key->id_groups==$_GET['gr'])&&($key->clave==$_GET['cl'])){
                    echo "vamos capo";
                }
            }
            //http://localhost/coteus/link/?gr=y&cl=u
        }
    }
    else
    {

    }
?>