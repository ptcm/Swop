
<?php 
$pageTitle = "Swop Match Handler | Home";
include("inc/header.php"); ?>

<!DOCTYPE = html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<title><?php echo $pageTitle ?></title>
	<link rel = "stylesheet" href = "css/style.css"> 
  </head>
	<div class="form">
		<h2>Please select a report below</h2>
		
		<table>
		<tr>
				<td colspan = 3><a href="clients_list.php" target = "_blank">Clients List</a></td>
			</tr>
			<tr>
				<td><a href="current_schools_list.php" target = "_blank">Current Schools List</a></td>
				<td><a href="preferred_provinces_list.php" target = "_blank">Preferred Provinces List</a></td>
				<td><a href="preferred_districts_list.php" target = "_blank">Preferred Districts List</a></td>
			</tr>
			<tr>
				<td><a href="preferred_towns_list.php" target = "_blank">Preferred Towns List</a></td>
				<td><a href="preferred_locations_list.php" target = "_blank">Preferred Locations List</a></td>
				<td><a href="preferred_schools_list.php" target = "_blank">Preferred Schools List</a></td>
			</tr>
		</table>
	</div>


<?php include("inc/footer.php"); ?>