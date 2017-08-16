<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/view.php';
?>
	<div id="content">
	<?php
        if(isset($_POST['addview'])){
            $view_name = $_POST['view_name'];
            if($view_name == NULL){
                echo "please insert the value of name";
            }elseif(is_numeric($view_name)){
                echo "the value of name must be Digits";
            }else{
                $view = new view($view_name);
                if($view->addview()){
                    echo '<div class="message">done</div>';  
                }else{
                    echo '<div class="message">error</div>';  
                }
            }
        }
    ?>
	   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label>Add View</label>
            <input type="text" class="form-control" name="view_name">
          </div>
          
          <button type="submit" class="btn btn-default" name="addview" value="addview">Submit</button>
        </form>
	</div>
<?php
require_once 'temp/footer.tpl';
?>