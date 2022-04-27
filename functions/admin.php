<?php
	if(($_SESSION['admin']) && $_SESSION['admin']){
		header("Location: admin_page.php");
	}
?>