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
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css">
   <br>
   <div class="search">
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
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>