<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class type
{
    private $type_id;
    private $type_name;
    
    public function __construct($type_name, $type_id="")
    {
        $this->type_name = $type_name;
        $this->type_id = $type_id;
    }
    
    public function addtype()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO type(type_name) VALUES('$this->type_name')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAlltype()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM type");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deletetype($type_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM type WHERE type_id='$type_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreivetypebyId($type_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM type WHERE type_id='$type_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updatetype()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE type SET type_name='$this->type_name' WHERE type_id='$this->type_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
