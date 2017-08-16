<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class reception
{
    private $reception_id;
    private $reception_name;
    private $reception_password;
    
    public function __construct($reception_name,$reception_password, $reception_id="")
    {
        $this->reception_name = $reception_name;
        $this->reception_password = $reception_password;
        $this->reception_id = $reception_id;
    }
    
    public function addreception()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO reception(reception_name,reception_password) VALUES('$this->reception_name','$this->reception_password')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllreception()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM reception");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deletereception($reception_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM reception WHERE reception_id='$reception_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreivereceptionbyId($reception_id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM reception WHERE reception_id='$reception_id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updatereception()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE reception SET reception_name='$this->reception_name' reception_password='$this->reception_password' WHERE reception_id='$this->reception_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
