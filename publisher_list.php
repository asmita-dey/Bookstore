<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM publisher ORDER BY publisherid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	$title = "List Of Publishers";
	require "./template/header3.php";
?>

<head>
<link rel="stylesheet" href="bootstrap/css/style.css">
	<style>
		.box-pub{
		  width: 100%;
		  border:3px black;
		  padding: 20px 10px 20px;
      	  text-align: left;
		  background-color: white;
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}
	</style>
</head>

<br>
<br>
<br>

<div class="box-pub">
	<p class="lead" style="font-size: 3.3rem;text-align: center;">LIST OF PUBLISHERS</p>
	<br>
	<ul style="font-size: 1.8rem;">
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT publisherid FROM books";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['publisherid'] == $row['publisherid']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge" style="align-items: center;font-size: 1.8rem;"><?php echo $count; ?></span>
		    <?php echo $row['publisher_name']; ?></a>
		</li>
	<?php } ?>
	</ul>
	<div class = "text-left">
		<p class="lead" style="font-size: 3.0rem;"><a href="publisher_add.php">Add new Publisher</a></p>
	</div>
</div>
<?php
	mysqli_close($conn);
?>
