<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/type.php';
?>
	<div id="content">
	<?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $type_id = $_GET["id"];
        switch ($action){
            case 'delete':
               if(type::deletetype($type_id)){
                   echo "<div class='message'><h1>deleted type successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted type</h1></div>";
                }
                break;
            case 'edit':
               $fetch = type::retreivetypebyId($type_id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>type :</p>'
                    .'<input type="text" name="type_name" id="type" value="'.$fetch['type_name'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['type_id'].'"  />'
                    .'<input type="submit" name="updatetype" id="submit" value="update type" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>there is not exist type </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
    if(isset($_POST["updatetype"]))
    {
        $type = new type($_POST["type_name"], $_POST["id"]);       
        if($type->updatetype()){
        	echo "<div class='message'><h1>updated type successfully</h1></div>";
        }else{
            echo "<div class='message'><h1>error when updated type</h1></div>";
        }
    }
    ?>
	    <table class="table table-striped">
				<tr>
				  <td class="active">Type Id</td>
				  <td class="active">Type Name</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  type::retreiveAlltype();
                    if(is_array($data)){
                        foreach ($data as $type) {
                            echo '<tr>
            				  <td class="active">'.$type['type_id'].'</td>
            				  <td class="active">'.$type['type_name'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$type['type_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$type['type_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>