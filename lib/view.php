<?php
/*require_once '../config.php';*/
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");
class view
{
    private $view_id;
    private $view_name;
    
    public function __construct($view_name, $view_id="")
    {
        $this->view_name = $view_name;
        $this->view_id = $view_id;
    }
    
    public function addview()
    {
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO view(view_name) VALUES('$this->view_name')");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function retreiveAllview()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM view");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function deleteview($view_id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM view WHERE view_id='$view_id'");
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
    
    public function updateview()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE view SET view_name='$this->view_name' WHERE view_id='$this->view_id'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
}
