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
<head>
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="search.css"> 


  <style>
	.button0{
    background-color: rgb(73, 160, 44);
    border: none;
    color: white;
    font-size: 1.8rem;
    text-align: center;
    padding: 7px 20px;
    border-radius: 4px;
	}
	.button0:hover{
    background-color: white;
    color: black;

	}
	.box-table{
		width: 100%;
		border:3px black;
		padding: 10px 10px 10px;
		margin-left: 13px;
		border-spacing: 30px;
		text-align: center;
		background-color: white;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		justify-content: justify;
	}
	tr{
		text-align: center;
	}
	td{
		text-align: center;
	}
	th{
		text-align: center;
		font-size: 2rem;
	}
	</style>
</head>
<br>
<br>
<body>
	<div class="box-table">
		<b><h3 class="lead" style="font-size:3rem;">ADD NEW PUBLISHER</h3></b>
		<br>
		<br>
    <form method="post" action="publisher_add.php" enctype="multipart/form-data">
		<table class="table">
			
			<tr>
				<th>Publisher Id:</th>
				<td><input type="text" class="col-lg-7"  name="pubid"></td>
			</tr>
			<tr>
				<th>Publisher Name:</th>
				<td><input class="col-lg-7" type="text" name="pubname" required></td>
			</tr>
			<tr>
				<td></td><td></td>
			</tr>
        </table>
		<input type="submit" name="add" value="Add new publisher" class="button" style="padding: 10px 12px 10px;font-size:1.5rem;">
		<input type="reset" value="Reset" class="button1" style="padding: 10px 15px 10px;font-size:1.5rem;">
	</form>
	<br/>
	<a href="publisher_list.php" class="button0" style="padding: 10px 14px 10px;font-size:1.6rem;">Cancel</a>
	</div>
</body>

<?php
	if(isset($conn)) {mysqli_close($conn);}
?>