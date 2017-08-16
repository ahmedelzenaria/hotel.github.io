<?php
require_once 'temp/header.tpl';
require_once 'temp/navbar.tpl';
require_once '../../lib/rooms.php';
require_once '../../lib/type.php';
require_once '../../lib/view.php';
require_once '../../lib/floor.php';
?>
	<div id="content">
	    <table class="table table-striped">
				<tr>
				  <td class="active">Room Id</td>
				  <td class="success">Room number</td>
				  <td class="warning">Room Type</td>
				  <td class="success">Room View</td>
				  <td class="warning">Room Floor</td>
				  <td class="active">Active</td>
				  <td class="success">Edit</td>
				  <td class="warning">Delete</td>
				</tr>
				<?php
                    $data=  rooms::retreiveAllrooms();
                    if(is_array($data)){
                        foreach ($data as $rooms) {
                            $roomv = view::retreiveviewbyId($rooms['rooms_view_id']);
                            $roomt = type::retreivetypebyId($rooms['rooms_type_id']);
                            $roomf = floor::retreivefloorbyId($rooms['rooms_floor_id']);
                            echo '<tr>
            				  <td class="active">'.$rooms['rooms_id'].'</td>
            				  <td class="active">'.$rooms['rooms_number'].'</td>
            				  <td class="active">'.$roomt['type_name'].'</td>
            				  <td class="active">'.$roomv["view_name"].'</td>
            				  <td class="active">'.$roomf['floor_number'].'</td>
            				  <td class="active">'.$rooms['rooms_active'].'</td>
            				  <td class="success"><a href="?action=edit&id='.$rooms['rooms_id'].'">Edit</a></td>
            				  <td class="warning"><a  href="?action=delete&id='.$rooms['rooms_id'].'">Delete</a></td>
            				  
                    </tr>';
                        }
                    }
                 ?>
			</table>
	</div>
<?php
require_once 'temp/footer.tpl';
?>