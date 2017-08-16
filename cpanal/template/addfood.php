<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/food.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addfood'])){
            $food_type = $_POST['food_type'];
            if($food_type == NULL){
                echo "please insert the value of name";
            }elseif(is_numeric($food_type)){
                echo "the value of name must be Digits";
            }else{
                $food = new food($food_type);
                if($food->addfood()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label >Food Type</label>
            <input type="text" class="form-control" name="food_type">
          </div>
          
          
          <button type="submit" class="btn btn-default" name="addfood" value="addfood">Add</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>