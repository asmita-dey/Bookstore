<?php
	session_start();
	$title = "Add new publisher";
	require "./template/header3.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$pubid = trim($_POST['pubid']);
		$pubid = mysqli_real_escape_string($conn, $pubid);
		
		$pubname = trim($_POST['pubname']);
		$pubname = mysqli_real_escape_string($conn, $pubname);

        $findPub = "SELECT * FROM publisher WHERE publisher_name = '$pubname'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(`publisherid`,`publisher_name`) VALUES ('$pubid','$pubname')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
        }
        $query = "INSERT INTO publisher VALUES ('" . $pubid . "', '" . $pubname . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: publisher_list.php");
		}
    }
?>
    <form method="post" action="publisher_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Publisher Id:</th>
				<td><input type="text" name="pubid"></td>
			</tr>
			<tr>
				<th>Publisher Name:</th>
				<td><input type="text" name="pubname" required></td>
			</tr>
        </table>
		<input type="submit" name="add" value="Add new publisher" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>