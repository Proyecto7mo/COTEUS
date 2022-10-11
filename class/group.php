<?php
    class group{

        public $admin;
        public $groupname;
        public $groupdesc;

        public function __construct($admin=0, $groupname="ng", $groupdesc="Sin Descripción"){
            $this->admin=$admin;
            $this->groupname=$groupname;
            $this->groupdesc=$groupdesc;
        }

        public function get(){
            require "../datos/datos.php";

        }

        public function newgroup(){
            require "../datos/datos.php";
            $result=0;

            if(datos::insert_group($this) > 0){
                $result = 1;
              }else{
                $result = -1;
              }
          
            return $result;
        }

        public static function getgroups($user_id){
            require_once "../datos/datos.php";
            $groups_list=datos::get_groups($user_id);
            //$res=group::to_String($groups_list);

            return $groups_list;
        }

        public static function getallgroups(){
            require_once "../datos/datos.php";
            $allgroup_list=datos::get_all_groups();

            return $allgroup_list;
        }

        public static function to_String($groups_list){
            $res="";
            foreach($groups_list as $key) {
            //while($key=$groups_list){
                //password_hash($key->id_groups, PASSWORD_BCRYPT)
                $res=$res.'<form action="group.php" method="post"><input type="hidden" name="grup" value="'.password_hash($key->id_groups, PASSWORD_BCRYPT).'"><input type="submit" value="'.$key->name.'"></form>';
                //$res=$res.'<a href='.$key->name.'>'.$key->name.'</a>';
                //'<form action="./group.php" method="post"><input type="hidden" name="grup" value="'..'"></form>';
                //$res=$res."<p>"."Nombre de grupo: ".$key->name."</p>";
            }
            //}
            return $res;
        }

        public static function getmembersgr($group_id){
            require_once "../datos/datos.php";
            $allmembers_list=datos::get_members_gr($group_id);

            return $allmembers_list;
        }

        public static function getURL($userid, $idgrup){
            require_once "../datos/datos.php";
            $url="1";

            $groups_list=group::getgroups($userid);
            foreach($groups_list as $key){
            if($key->id_groups==$idgrup){
            //$_SESSION['name']=$key->name;
            $name=$key->name;
            $grcl=$key->id_groups."-".$key->clave;
            $grclh=password_hash($grcl, PASSWORD_BCRYPT);
            $url="http://".$_SERVER['HTTP_HOST']."/coteus/link/?grcl=".$grclh;
            $idgrup=$key->id_groups;
            //unset($_SESSION['gr']);
            return $url;
            }
            }
            
        }

        public static function modifyrank($tipo, $id_user, $id_groups){
            require_once "../datos/datos.php";

            datos::modify_rank($tipo, $id_user, $id_groups);
        }

        public static function deletemember($id_user, $id_groups){
            require_once "../datos/datos.php";

            datos::delete_member($id_user, $id_groups);
        }
    }
?>