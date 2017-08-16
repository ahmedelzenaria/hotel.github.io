<?php
require_once 'databasemodel.php';
class type extends databasemodel
{
    protected $type_id;
    protected $type_name;
    protected $tablename ='type';
    protected $fieldnames=array('type_name');
    public function __construct($type_name,$type_id="")
    {
        $this->type_name=$type_name;
        $this->type_id=$type_id;
    }
}
$type= new type("amarican");
$type->add();