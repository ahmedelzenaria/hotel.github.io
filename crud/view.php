<?php
require_once 'databasemodel.php';
class view extends databasemodel
{
    protected $view_id;
    protected $view_name;
    protected $tablename ='view';
    protected $fieldnames=array('view_name');
    public function __construct($view_name,$view_id="")
    {
        $this->view_name=$view_name;
        $this->view_id=$view_id;
    }
}
$view= new view("beach view");
$view->add();