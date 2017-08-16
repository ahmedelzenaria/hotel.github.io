<?php
require_once 'databasemodel.php';
class food extends databasemodel
{
    protected $food_id;
    protected $food_type;
    protected $tablename ='food';
    protected $fieldnames=array('food_type');
    public function __construct($food_type,$food_id="")
    {
        $this->food_type=$food_type;
        $this->food_id=$food_id;
    }
}
$food= new food("orintal");
$food->add();