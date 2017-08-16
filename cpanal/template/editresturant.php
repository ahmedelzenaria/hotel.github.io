<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/resturant.php';
require_once '../../lib/floor.php';
require_once '../../lib/type.php';
?>
	<div id="content">
	 <table class="table table-striped">
				<tr>
				  <td class="active">Resturant ID</td>
				  <td class="active">Resturant Name</td>
				  <td class="active">Resturant Location</td>
				  <td class="active">Food Type</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  resturant::retreiveAllresturant();
                    if(is_array($data)){
                        foreach ($data as $resturant) {
                            $resturantl=floor::retreivefloorbyId($resturant['resturant_location_id']);
                            echo '<tr>
            				  <td class="active">'.$resturant['resturant_id'].'</td>
            				  <td class="active">'.$resturant['resturant_name'].'</td>
            				  <td class="active">'.$resturantl['floor_number'].'</td>
            				  <td class="active">'.$resturant['resturant_food_type_id'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$resturant['resturant_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$resturant['resturant_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>