<?php
require_once 'databasemodel.php';
class rooms extends databasemodel
{
    protected $rooms_id;
    protected $rooms_number;
    protected $rooms_type_id;
    protected $rooms_view_id;
    protected $rooms_floor_id;
    protected $rooms_active;
    protected $tablename ='rooms';
    protected $fieldnames=array('rooms_number','rooms_type_id','rooms_view_id','rooms_floor_id','rooms_active');
    public function __construct($rooms_number,$rooms_type,$rooms_view,$rooms_floor,$rooms_active,$rooms_id="")
    {
        $this->rooms_number=$rooms_number;
        $this->rooms_type_id=$rooms_type;
        $this->rooms_view_id=$rooms_view;
        $this->rooms_floor_id=$rooms_floor;
        $this->rooms_active=$rooms_active;
        $this->rooms_id=$rooms_id;
    }
}
$rooms= new rooms("7891","2","3","3","1");
$rooms->add();