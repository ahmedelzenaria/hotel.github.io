<?php
require_once 'databasemodel.php';
class resturant extends databasemodel
{
    protected $resturant_id;
    protected $resturant_name;
    protected $resturant_location_id;
    protected $resturant_food_type_id;
    protected $tablename ='resturant';
    protected $fieldnames=array('resturant_name','resturant_location_id','resturant_food_type_id');
    public function __construct($resturant_name,$resturant_floor,$resturant_food,$resturant_id="")
    {
        $this->resturant_name=$resturant_name;
        $this->resturant_location_id=$resturant_floor;
        $this->resturant_food_type_id=$resturant_food;
        $this->resturant_id=$resturant_id;
    }
}
$resturant= new resturant("orintal","3","2");
$resturant->add();