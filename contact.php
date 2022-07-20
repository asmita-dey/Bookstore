<?php
session_start();
  $title = "Contact";
  require_once "./template/header.php";
?>
 <head><link rel="stylesheet" href="bootstrap/css/style.css"></head>
    <div class="row">
        <div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<form class="form-horizontal" action = "Feedback.php" method="POST">
				<br>
			  	<fieldset>
				    <legend><b>Contact Us!</b></legend>
					
				    <p class="lead">We'd love to hear from you! Please send us your feedbacks/queries.</p>
					<br>
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
				      	<label for="textArea" class="col-lg-2 control-label">Feedback/Query:</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" placeholder="Feedback" name="feedback"></textarea>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="button1" style="font-size: 1.7rem;margin-left:40px; padding:8.5px 19px;">Reset</button>
				        	<button type="submit" class="button" style="font-size: 1.7rem;padding:8px 16px;">&nbsp;Submit</button>
							
				      	</div>

				    </div>
					
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
    </div>
	<br>
	<br>
	
<?php
  require_once "./template/footer3.php";
?>
