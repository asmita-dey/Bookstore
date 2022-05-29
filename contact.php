<?php
session_start();
if(!$_SESSION['email'])
{
  header("Location: user_login.php");
}
  $title = "Contact";
  require_once "./template/header.php";
?>
    <div class="row">
        <div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<form class="form-horizontal" action = "Feedback.php" method="POST">
			  	<fieldset>
				    <legend>Contact Us!</legend>
				    <p class="lead">We'd love to hear from you! Please send us your feedbacks.</p>
				    <div class="form-group">
				      	<label for="inputName" class="col-lg-2 control-label">Name:</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-2 control-label">Email:</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="textArea" class="col-lg-2 control-label">Feedback:</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" placeholder="Feedback" name="feedback"></textarea>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="btn btn-default">Reset</button>
				        	<button type="submit" class="btn btn-primary">Submit</button>
				      	</div>
				    </div>
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
    </div>
<?php
  require_once "./template/footer3.php";
?>
