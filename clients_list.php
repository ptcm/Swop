<?php
include 'inc/header.php';
include 'inc/functions.php';

if(isset($_POST['delete'])){
  if(delete_client(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING))){
    header('Location:clients_list.php?msg=Client+Deleted');
  }else{
    header('Location:clients_list.php?msg=Unable+to+delete+Client');
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
  <head>
    <link rel = "stylesheet" href = "css/styles.css">
  </head>
	<body class = "body">
		<table>
			<tr>
				<th>ID Number</th>
        <th>EC Number</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Mobile #</th>
				<th>Email</th>
				<th>Level Taught</th>
				<th>Date Created</th>
				<th>Status</th>
				<th>Date Matched</th>
				</tr>
			<?php
			foreach (get_clients_list() as $item){
				echo '<tr><td>'.$item['client_id'].'</td>'.
        '<td><a href="Account_manage.php?id='.$item['client_ec_no'].'">'.strtoupper($item['client_ec_no']).'</a></td>'.
				'<td>'.ucwords(strtolower($item['client_first_name'])).'</td>'.
				'<td>'.ucwords(strtolower($item['client_last_name'])).'</td>'.
				'<td>'.ucwords(strtolower($item['client_sex'])).'</td>'.
				'<td>'.$item['client_mobile_no'].'</td>'.
				'<td>'.$item['client_email'].'</td>'.
				'<td>'.ucwords(strtolower($item['client_level_taught'])).'</td>'.
				'<td>'.$item['client_date_created'].'</td>'.
				'<td>'.ucwords(strtolower($item['client_status'])).'</td>'.
				'<td>'.$item['client_date_matched'].'</td>';
        echo '<td><form method="post" action="clients_list.php" onsubmit="return confirm(\'Are you sure you want to delete this school?\')">';
        echo '<input type="hidden" value="'.$item['client_ec_no'].'" name="delete"/>';
        echo '<input type="submit" value="Delete"/>';
        echo '</form>';
        echo '</td></tr>';
			}
			
			?>
		</table>
	</body>
</html>

