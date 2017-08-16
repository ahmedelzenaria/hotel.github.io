<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/food.php';
?>
	<div id="content">
		<?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $food_id = $_GET["id"];
        switch ($action){
            case 'delete':
               if(food::deletefood($food_id)){
                   echo "<div class='message'><h1>deleted food successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted food</h1></div>";
                }
                break;
            case 'edit':
               $fetch = food::retreivefoodbyId($food_id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>food type :</p>'
                    .'<input type="text" name="food_type" id="food" value="'.$fetch['food_type'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['food_id'].'"  />'
                    .'<input type="submit" name="updatefood" id="submit" value="update food" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>there is not exist type </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
if(isset($_POST["updatefood"]))
{
    $food = new food($_POST["food_type"], $_POST["id"]);       
    if($food->updatefood()){
    	echo "<div class='message'><h1>updated food successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when updated food</h1></div>";
    }
}
    ?>
	   <table class="table table-striped">
				<tr>
				  <td class="active">Food Id</td>
				  <td class="active">Food Type</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  food::retreiveAllfood();
                    if(is_array($data)){
                        foreach ($data as $food) {
                            echo '<tr>
            				  <td class="active">'.$food['food_id'].'</td>
            				  <td class="active">'.$food['food_type'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$food['food_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$food['food_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>