<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class food
{
    private $food_id;
    private $food_type;
    
    public function __construct($food_type, $food_id="")
    {
        $this->food_type = $food_type;
        $this->food_id = $food_id;
    }
    
    public function addfood()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO food(food_type) VALUES('$this->food_type')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllfood()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM food");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deletefood($food_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM food WHERE food_id='$food_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreivefoodbyId($food_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM food WHERE food_id='$food_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updatefood()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE food SET food_type='$this->food_type' WHERE food_id='$this->food_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
