<main class="form-signin">
  <form action="/PHPdocs/SNA_CLASS_WORK/_signup/signup.php" method="post">
    <img class="mb-4" src="https://academy.selfmade.ninja/assets/brand/logo-text-2.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in </h1>

   <!-- username field  -->
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name" name="username">
      <label for="floatingInput" >Username</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Password" name="password"> 
      <label for="floatingInput">Password</label>
    </div>
 
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

  </form>
</main>
<?PHP 

?> 