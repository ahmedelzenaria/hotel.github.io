<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/view.php';
?>
	<div id="content">
	<?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $view_id = $_GET["id"];
        switch ($action){
            case 'delete':
               if(view::deleteview($view_id)){
                   echo "<div class='message'><h1>deleted view successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted view</h1></div>";
                }
                break;
            case 'edit':
               $fetch = view::retreiveviewbyId($view_id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>view :</p>'
                    .'<input type="text" name="view_name" id="type" value="'.$fetch['view_name'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['view_id'].'"  />'
                    .'<input type="submit" name="updateview" id="submit" value="update view" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>there is not exist view </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
    if(isset($_POST["updateview"]))
    {
        $view = new view($_POST["view_name"], $_POST["id"]);       
        if($view->updateview()){
        	echo "<div class='message'><h1>updated type successfully</h1></div>";
        }else{
            echo "<div class='message'><h1>error when updated type</h1></div>";
        }
    }
    ?>
	    <table class="table table-striped">
				<tr>
				  <td class="active">Veiw Id</td>
				  <td class="active">Veiw Name</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  view::retreiveAllview();
                    if(is_array($data)){
                        foreach ($data as $view) {
                            echo '<tr>
            				  <td class="active">'.$view['view_id'].'</td>
            				  <td class="active">'.$view['view_name'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$view['view_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$view['view_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>