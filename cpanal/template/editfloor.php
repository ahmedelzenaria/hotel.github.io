<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/floor.php';
?>
	<div id="content">
	<?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $floor_id = $_GET["id"];
        switch ($action){
            case 'delete':
               if(floor::deletefloor($floor_id)){
                   echo "<div class='message'><h1>deleted floor successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted floor</h1></div>";
                }
                break;
            case 'edit':
               $fetch = floor::retreivefloorbyId($floor_id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>floornumber :</p>'
                    .'<input type="text" name="floor_number" id="floor" value="'.$fetch['floor_number'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['floor_id'].'"  />'
                    .'<input type="submit" name="updatefloor" id="submit" value="update floor" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>this type is not exist </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
if(isset($_POST["updatefloor"]))
{
    $floor = new floor($_POST["floor_number"], $_POST["id"]);       
    if($floor->updatefloor()){
    	echo "<div class='message'><h1>updated floor successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when updated floor</h1></div>";
    }
}
    ?>
	   <table class="table table-striped">
				<tr>
				    <td class="active">Floor Id</td>
				  <td class="active">Floor number</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  floor::retreiveAllfloors();
                    if(is_array($data)){
                        foreach ($data as $fetch) {
                            echo '<tr>
            				  <td class="active">'.$fetch['floor_id'].'</td>
            				  <td class="active">'.$fetch['floor_number'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$fetch['floor_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$fetch['floor_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>