<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class floor
{
    private $floor_id;
    private $floor_number;
    
    public function __construct($floor_number, $floor_id="")
    {
        $this->floor_number = $floor_number;
        $this->floor_id = $floor_id;
    }
    
    public function addfloor()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO floor(floor_number) VALUES('$this->floor_number')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllfloors()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM floor");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deletefloor($floor_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM floor WHERE floor_id='$floor_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreivefloorbyId($floor_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM floor WHERE floor_id='$floor_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updatefloor()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE floor SET floor_number='$this->floor_number' WHERE floor_id='$this->floor_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
