<?php
require_once 'databasemodel.php';
class reception extends databasemodel
{
    protected $reseption_id;
    protected $reception_name;
    protected $reception_password;
    protected $tablename ='reception';
    protected $fieldnames=array('reception_name','reception_password');
    public function __construct($reception_name,$reception_password,$reseption_id="")
    {
        $this->reception_name=$reception_name;
        $this->reception_password=$reception_password;
        $this->reseption_id=$reseption_id;
    }
}
