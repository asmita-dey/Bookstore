<?php
	$title = "Administration section";
	require_once "./template/header1.php";
?>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://images.pexels.com/photos/6483622/pexels-photo-6483622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
          class="img-responsive" alt="image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action = "admin_book.php" method = "POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <br><br><br><p class="lead fw-normal mb-0 me-3">Admin Login!</p>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter username" />
            <label class="form-label" for="form3Example3"></label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4"></label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign in</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<hr>

