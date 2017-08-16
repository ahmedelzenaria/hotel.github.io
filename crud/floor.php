<?php
require_once 'databasemodel.php';
class floor extends databasemodel
{
    protected $floor_id;
    protected $floor_number;
    protected $tablename ='floor';
    protected $fieldnames=array('floor_number');
    public function __construct($floor_number,$floor_id="")
    {
        $this->floor_number=$floor_number;
        $this->floor_id=$floor_id;
    }
    
}
$floor=new floor(22);
$floor->add();
