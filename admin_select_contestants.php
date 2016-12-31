<?php
require_once( '../includes/connection.php');
if(isset($_POST['submit'])){//to run PHP script on submit
	if(!empty($_POST['contestant_ids_in'])){
		echo "<h5> In: </h5>";
		foreach($_POST['contestant_ids_in'] as $selected){
			$elminated_ceremony = $_POST['ceremony_num'];
			$query = "UPDATE `contestants` SET `eliminated` = $elminated_ceremony WHERE `contestants`.`contestant_id` = $selected " ;
			mysqli_query($dbc,$query) or die(mysqli_error($dbc));
		}
	}
	if(!empty($_POST['contestant_ids_out'])){
		echo "<h5> Out: </h5>";
		foreach($_POST['contestant_ids_out'] as $selected){
			$query = "UPDATE `contestants` SET `eliminated` = 0 WHERE `contestants`.`contestant_id` = $selected " ;
			mysqli_query($dbc,$query) or die(mysqli_error($dbc));
		}
	}
}


include('admin_calculate_score.php');

header('Location: admin.php');
exit();

?>
