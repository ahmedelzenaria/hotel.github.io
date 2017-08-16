<?php
$dbh= new PDO("mysql:dbhost=localhost;dbname=hotel", "root","");

class databasemodel
{
    public function handleattributes()
    {
         $string = array();
            
         foreach ($this->fieldnames as $field){
              $string[] = $field .'='."'".$this->$field."'";
              }
            return implode(',', $string);
    }
    public function add()
    {
        global $dbh;
        $sql =$dbh->prepare("INSERT $this->tablename set ". $this->handleattributes() ) ;
        $sql->execute();
    }
    public static function retreivealldata($tablename)
    {
        global $dbh;
        $sql =$dbh->prepare("SELECT * FROM $tablename");
        $sql->execute();
        $data=null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data =$fetch;  
        }
        return $data;
    }
    public static function retreivedatabyid($tablename,$id)
    {
        global $dbh;
        $sql =$dbh->prepare("SELECT * FROM $tablename WHERE id='$id'");
        $sql->execute();
        $data=null;
        $fetch=$sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    public static function delete($tablename,$id)
    {
        global $dbh;
        $sql =$dbh->prepare("DELETE FROM $tablename WHERE id='$id'");
        $sql->execute();
    }
    public function update()
    {
        global $dbh;
        $sql =$dbh->prepare("UPDATE $this->tablename SET" .$this->handleattributes() ."WHERE id='$this->id'") ;
        $sql->execute();
    }
    
}