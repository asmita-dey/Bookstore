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
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css"> 
   <br><p class="lead"><a href="admin_add.php">Add new book</a></p>
   <div class="search">
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
	<table class="table" style="margin-top: 20px">
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
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>