<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/type.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addtype'])){
            $type_name = $_POST['type_name'];
            if($type_name == NULL){
                echo "please insert the value of name";
            }elseif(is_numeric($type_name)){
                echo "the value of name must be Digits";
            }else{
                $type = new type($type_name);
                if($type->addtype()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label>Type Name</label>
            <input type="text" class="form-control" name="type_name">
          </div>
          
          
          <button type="submit" class="btn btn-default" name="addtype" value="addtype">Submit</button>
       </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>