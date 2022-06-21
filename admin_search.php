<?php
	session_start();
    $title = "List Book";
	require_once "./template/header3.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

    $image = $_POST['search'];
	$query1 = "SELECT * FROM books WHERE book_title LIKE '%$image%' OR book_author LIKE '%$image%'";;
	$result1 = mysqli_query($conn, $query1);

	if(!$result1){
        echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
?>
<head>
	<link rel="stylesheet" href="bootstrap/css/style.css">
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css"> 
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

	<br><p class="lead"><a href="admin_add.php">Add new book</a></p>
   <div class="search" style="width: 60%;padding:20px;font-size:1.8rem">
   <form action="admin_search.php" method = "POST">
   <input type="text" placeholder=" Search....."  name="search"/>
   <button>   
   <i class="fa fa-search"  style="font-size: 18px;"> </i>
   </button>   
   </form>   
   </div>

   <?php if(!mysqli_num_rows($result1)){
            echo '<br><p class = "lead text-warning">Result not Found!!!</div>';
            exit;}?>

	<table class="table" style="margin-top: 40px">
		<tr>
			<td></td>
		</tr>
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
		<tr>
			<td><?php echo $row1['book_isbn']; ?></td>
			<td><?php echo $row1['book_title']; ?></td>
			<td><?php echo $row1['book_author']; ?></td>
			<td><img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row1['book_image']; ?>"/></td>
			<td><?php echo $row1['book_descr']; ?></td>
			<td><?php echo $row1['book_price']; ?></td>
			<td><?php echo getPubName($conn, $row1['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row1['book_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row1['book_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
		<tr>
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		</tr>
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>