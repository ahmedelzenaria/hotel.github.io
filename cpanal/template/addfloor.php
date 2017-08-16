<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/floor.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addfloor'])){
            $floor_number = $_POST['floor_number'];
            if($floor_number == NULL){
                echo "please insert the value of name";
            }elseif(!is_numeric($floor_number)){
                echo "the value of name must be numbers";
            }else{
                $floor = new floor($floor_number);
                if($floor->addfloor()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group" >
            <label >Floor Number</label>
            <input type="text" class="form-control" name="floor_number" >
          </div>
          
          
          <button type="submit" class="btn btn-default" name="addfloor" value="addfloor">Add</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>