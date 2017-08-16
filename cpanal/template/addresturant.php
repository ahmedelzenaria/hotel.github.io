<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/resturant.php';
require_once '../../lib/floor.php';
require_once '../../lib/food.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addresturant'])){
            $resturant_name = $_POST['resturant_name'];
            $floor_id = $_POST['floor_id'];
            $food_id = $_POST['food_id'];
            if($resturant_name == NULL){
                echo "please insert the value of name";
            }elseif(is_numeric($resturant_name)){
                echo "the value of name must be Digits";
            }else{
                $resturant = new resturant($resturant_name,$floor_id,$food_id);
                if($resturant->addresturant()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label >Resturant name</label>
            <input type="text" class="form-control" name="resturant_name">
          </div>
          <div class="form-group">
              <label for="sel1">Resturant locatin:</label>
              <select class="form-control" id="sel1" name="floor_id">
                <?php 
                   $data = floor::retreiveAllfloors();
                   if(is_array($data)){
                       foreach ($data as $fetch):
                           echo '<option value="'.$fetch['floor_id'].'">'.$fetch['floor_number'].'</option>';
                            endforeach;
                       }else{
                          echo '<option value=""> no found result</option>';
                            }
               ?>
              </select>
            </div>
            <div class="form-group">
              <label for="sel1">Food Type</label>
              <select class="form-control" id="sel1" name="food_id">
                 <?php 
                   $data = food::retreiveAllfood();
                   if(is_array($data)){
                       foreach ($data as $fetch):
                           echo '<option value="'.$fetch['food_id'].'">'.$fetch['food_type'].'</option>';
                            endforeach;
                       }else{
                          echo '<option value=""> no found result</option>';
                            }
               ?>
              </select>
            </div>       
          <button type="submit" class="btn btn-default" name="addresturant" value="addresturant">Submit</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>