<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/reception.php';
?>
	<div id="content"> 
	<?php
        if(isset($_POST['addreception'])){
            $reception_name = $_POST['reception_name'];
            $reception_password = $_POST['reception_password'];
            if($reception_name == NULL){
                echo "please insert the value of name";
            }elseif(is_numeric($reception_name)){
                echo "the value of name must be Digits";
            }else{
                $reception = new reception($reception_name,$reception_password);
                if($reception->addreception()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label >Receptionist Name</label>
            <input type="text" class="form-control" name="reception_name">
          </div>
          <div class="form-group">
            <label >Password:</label>
            <input type="password" class="form-control"  name="reception_password">
          </div>
          
          <button type="submit" class="btn btn-default" name="addreception" value="addreception">Submit</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>