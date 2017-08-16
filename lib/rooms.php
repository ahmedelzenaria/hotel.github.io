<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class rooms
{
    private $rooms_id;
    private $rooms_number;
    private $rooms_type;
    private $rooms_view;
    private $rooms_floor;
    private $active;
    
    
    public function __construct($rooms_number,$rooms_type,$rooms_view,$rooms_floor,$active, $rooms_id="")
    {
        $this->rooms_number = $rooms_number;
        $this->rooms_type = $rooms_type;
        $this->rooms_view = $rooms_view;
        $this->rooms_floor = $rooms_floor;
        $this->active = $active;
        $this->rooms_id = $rooms_id;
    }
    
    public function addrooms()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO `rooms`(`rooms_number`,`rooms_type_id`,`rooms_view_id`,`rooms_floor_id`,`rooms_active`) VALUES ($this->rooms_number,$this->rooms_type,$this->rooms_view,$this->rooms_floor,$this->active)");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllrooms()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM rooms");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deleterooms($rooms_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM rooms WHERE rooms_id='$rooms_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveviewbyId($view_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM view WHERE view_id='$view_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public static function retreiveroomsbyId($rooms_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM rooms WHERE id='$rooms_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updaterooms()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE rooms SET rooms_number='$this->rooms_number' WHERE rooms_id='$this->rooms_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
