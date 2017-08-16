<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/rooms.php';
require_once '../../lib/floor.php';
require_once '../../lib/type.php';
require_once '../../lib/view.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addrooms'])){
            $rooms_number = $_POST['rooms_number'];
            $type_id = $_POST['type_id'];
            $view_id = $_POST['view_id'];
            $floor_id = $_POST['floor_id'];
            $active = $_POST["optradio"];
            if($rooms_number == NULL){
                echo "please insert the value of name";
            }elseif(!is_numeric($rooms_number)){
                echo "the value of name must be numbers";
            }else{
                $rooms = new rooms($rooms_number,$type_id,$view_id,$floor_id,$active);
                if($rooms->addrooms()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label for="email">Room Number :</label>
            <input type="text" class="form-control"  name="rooms_number">
          </div>
          <div class="form-group">
              <label for="sel1">Room Type :</label>
              <select class="form-control" id="sel1" name="type_id">
                <?php 
                   $data = type::retreiveAlltype();
                   if(is_array($data)){
                       foreach ($data as $fetch):
                           echo '<option value="'.$fetch['type_id'].'">'.$fetch['type_name'].'</option>';
                            endforeach;
                       }else{
                          echo '<option value=""> no found result</option>';
                            }
               ?>
              </select>
            </div> 
            <div class="form-group">
              <label for="sel1">Room View :</label>
              <select class="form-control" id="sel1" name="view_id">
                <?php 
                   $data = view::retreiveAllview();
                   if(is_array($data)){
                       foreach ($data as $fetch):
                           echo '<option value="'.$fetch['view_id'].'">'.$fetch['view_name'].'</option>';
                            endforeach;
                       }else{
                          echo '<option value=""> no found result</option>';
                            }
               ?>
              </select>
            </div> 
            <div class="form-group">
              <label for="sel1">Room Floor :</label>
              <select class="form-control" id="sel1" name=floor_id>
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
              <label for="sel1">Active :</label>
              <br/><label class="radio-inline"><input checked type="radio" value="1" name="optradio">YES</label>
              <label class="radio-inline"><input type="radio" value="0"  name="optradio">NO</label>
             </div>
          <button type="submit" class="btn btn-default" name="addrooms" value="addrooms">Submit</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>