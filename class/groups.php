<?php
//require "../datos/datos.php";

class groups{
    private $groupname;
    private $admin;
    
    
    public function __construct($groupname, $admin){
        $this->groupname=$groupname;
        $this->admin=$admin;
    }

    public static function newgroup(){
        //require "../datos/datos.php";
        //datos::insert_group();
        require("../database/database.php");
      $query="INSERT INTO groups_t (id_groups, name, admin, id_files, id_chores) VALUES (:id, :name, :admin, :idfi, :idch)";
      $stmt=$conexion->prepare($query);
      $groupname="aa";
      $admin="bb";
      $id=32;
      $idfi=22;
      $idch=45;
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $groupname);
      $stmt->bindParam(':admin', $admin);
      $stmt->bindParam(':idfi', $idfi);
      $stmt->bindParam(':idch', $idch);
      echo "estoy en newgroup";
      return $stmt->execute();
    }
}
?>