<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class resturant
{
    private $resturant_id;
    private $resturant_name;
    private $resturant_floor;
    private $resturant_food;
    
    public function __construct($resturant_name,$resturant_floor,$resturant_food, $resturant_id="")
    {
        $this->resturant_name = $resturant_name;
        $this->resturant_floor = $resturant_floor;
        $this->resturant_food = $resturant_food;
        $this->resturant_id = $resturant_id;
    }
    
    public function addresturant()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO `resturant`(`resturant_name`,`resturant_location_id`,`resturant_food_type_id`) VALUES ($this->resturant_name,$this->resturant_floor,$this->resturant_food)");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllresturant()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM resturant");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deleteresturant($resturant_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM resturant WHERE resturant_id='$resturant_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveresturantbyId($resturant_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM resturant WHERE resturant_id='$resturant_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updateresturant()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE resturant SET resturant_name='$this->resturant_name' WHERE resturant_id='$this->resturant_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
