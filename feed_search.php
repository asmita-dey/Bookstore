<?php
	session_start();
	if(!$_SESSION['inputName'])
  	{
    header("Location: admin.php");
  	}
	$title = "Feedbacks";
	require_once "./template/header3.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

    $image = $_POST['search'];
	$query1 = "SELECT * FROM feedback WHERE name LIKE '%$image%' OR email LIKE '%$image%'";
	$result1 = mysqli_query($conn, $query1);

	if(!$result1){
		echo "Empty!";
		exit;
	}
?>
   <head>  
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css">
   <link rel="stylesheet" href="bootstrap/css/style.css"> 
   <style>
	.table{
		width: 100%;
		border:3px black;
		padding-right:50px;
		padding: 100px 100px 100px 100px;
		margin-left: 18px;
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
		font-size: 1.7rem;
	}
	
	</style>
</head>
   <br>
   <div class="search" style="width: 60%;padding:20px;font-size:1.8rem">
   <form action="feed_search.php" method = "POST">
   <input type="text" placeholder=" Search....."  name="search"/>
   <button>   
   <i class="fa fa-search"  style="font-size: 18px;"> </i>
   </button>   
   </form>   
   </div>
   <?php if(!mysqli_num_rows($result1)){
            echo '<br><p class = "lead text-warning">Result not Found!!!</div>';
            exit;}?>
	<table class="table" style="margin-top: 20px">
		<tr>
			<td></td>
		</tr>
		<tr>
			<th>Name</th>
            <th>Email</th>
			<th>Feedbacks</th>
		</tr>
		<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
		<tr>
			<td><?php echo $row1['name']; ?></td>
            <td><?php echo $row1['email']; ?></td>
			<td><?php echo $row1['feedback']; ?></td>
        </tr>
		<?php } ?>
		<tr>
			<td></td><td></td><td></td>
		</tr>
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>