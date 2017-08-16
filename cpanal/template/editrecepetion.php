<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/reception.php';
?>
	<div id="content">
	<?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $reception_id = $_GET["id"];
        switch ($action){
            case 'delete':
               if(reception::deletereception($reception_id)){
                   echo "<div class='message'><h1>deleted receptionist successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted receptionist</h1></div>";
                }
                break;
            case 'edit':
               $fetch = reception::retreivereceptionbyId($reception_id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>reception name :</p>'
                    .'<input type="text" name="reception_name" id="reception" value="'.$fetch['reception_name'].'" />'
                    .'<p>reception password :</p>'
                    .'<input type="text" name="reception_password" id="receptionpassword" value="'.$fetch['reception_password'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['reception_id'].'"  />'
                    .'<input type="submit" name="updatereception" id="submit" value="update reception" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>there is not exist type </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
    if(isset($_POST["updatereception"]))
    {
        $reception = new reception($_POST["reception_name"],$_POST["reception_password"], $_POST["id"]);       
        if($reception->updatereception()){
        	echo "<div class='message'><h1>updated reception successfully</h1></div>";
        }else{
            echo "<div class='message'><h1>error when updated reception</h1></div>";
        }
    }
    ?>
	    <table class="table table-striped">
				<tr>
				  <td class="active">Recepetion Id</td>
				  <td class="active">Recepetion Name</td>
				  <td class="success">Reception Password</td>
				  <td class="warning">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  reception::retreiveAllreception();
                    if(is_array($data)){
                        foreach ($data as $reception) {
                            echo '<tr>
            				  <td class="active">'.$reception['reception_id'].'</td>
            				  <td class="active">'.$reception['reception_name'].'</td>
            				  <td class="active">'.$reception['reception_password'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$reception['reception_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$reception['reception_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>