<main class="form-signin">
  <form action="" method="POST">
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
    <?php

		if ($alert_form == 1) {
			include 'elems/alert.php';
			}
			
	?>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="login">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <!--<label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>-->
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
