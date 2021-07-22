<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials Philippines Record</title>
    <link rel="stylesheet" href="public/css/login-style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  </head>

  <body>
    <div class="login-section">
      <div class="logo">
        <img class="logoimage" src="public/img/phbarangay-logo.png" alt="logo" />
      </div>

      <div class="text">
        <h1>PUNONG BARANGAY PHILIPPINES RECORD</h1>
      </div>

      
 <!-- error -->
 <?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>


      <form  method="post" class="login" action="login_function.php">

        <div class="textbox">
          <img src="public/img/icons/user-24.png" alt="" />
          <input type="text" placeholder="Username"  name="username" required/>
        </div>

        <div class="textbox">
          <img src="public/img/icons/password-24.png" alt="" />
          <input type="password" id= "pass" placeholder="Password" name="password" required/>
          <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>

        <button class="loginbtn">Login</button>
      </form>
    </div>
  </body>
</html>

<script type="text/javascript">
      const togglePassword = document.querySelector('#togglePassword');
      const pass = document.querySelector('#pass');

      togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = pass.getAttribute('type') === 'pass' ? 'text' : 'pass';
    pass.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

    </script>

