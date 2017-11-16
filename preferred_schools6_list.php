<?php
include 'inc/header.php';
include 'inc/functions.php';

if(isset($_POST['delete'])){
  if(delete_pref_school(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING))){
    header('Location:preferred_schools_list.php?msg=Preferred+School+Deleted');
  }else{
    header('Location:preferred_schools_list.php?msg=Unable+to+delete+school');
    exit;
  }
}

if(isset($_GET['msg'])){
  $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

if(isset($error_message)){
  echo '<p>'.$error_message.'</p>';
}
?>
<html>
	<body>

    <table class="table table-bordered table-warning table-hover">
			<tr>

				<th>Record Id</th>
				<th>EC Number</th>
				<th>School Name</th>
				</tr>
			<?php
			foreach (get_pref_schools6_list() as $item){
				echo '<tr><td>'.$item['mps6_id'].'</td>'.
				'<td>'.strtoupper($item['mps6_client_ec_no']).'</td>'.
				'<td>'.ucwords(strtolower($item['school_name'])).'</td>';
        echo '<td><form method="post" action="preferred_schools6_list.php" onsubmit="return confirm(\'Are you sure you want to delete this school?\')">';
        echo '<input type="hidden" value="'.$item['mps6_id'].'" name="delete"/>';
        echo '<input type="submit" class="btn btn-danger" value="Delete"/>';
        echo '</form>';
        echo '</td></tr>';
			}
			
			?>
		</table>
	</body>
</html>

