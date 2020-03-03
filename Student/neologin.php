<?php
   include("config.php");
   session_start();

  if(isset($_POST['logsubmit']))
  {
     $myusername = mysqli_real_escape_string($db,$_POST['username']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']);

     $sql = "SELECT * FROM student WHERE username = '$myusername' and password = '$mypassword'";
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result,MYSQL_ASSOC);


     $count = mysqli_num_rows($result);

     // If result matched $myusername and $mypassword, table row must be 1 row

     if($count == 1) {

        $_SESSION['login_user'] = $myusername;
        $_SESSION['ADMIN']=$row['access'];
        $_SESSION['access']=$row['access'];
        if($row['access'] == "admin")
        {
          echo '<script type="text/javascript">'.
      'window.location.href="neoadmin";'.
      '</script>';
        }
        if($row['access'] == "student")
        {
          echo '<script type="text/javascript">'.
      'window.location.href="neohomepage";'.
      '</script>';
        }

     }
     else
     {

           echo '<script type="text/javascript">'.
         'window.alert("Your Username or Password is invalid!");'.
         'window.location.href="neologin";'.
         '</script>';

     }
  }

  if(isset($_POST['signsubmit']))
  {

     $name = ($_POST['name']);
     $user = ($_POST['user']);
     $email = ($_POST['email']);
     $pass = ($_POST['pass']);
     $cpass = ($_POST['cpass']);
     $sql = "SELECT * FROM student WHERE username = '$user' and password = '$pass'";
     $result = mysqli_query($db,$sql);


     if(!$row = mysqli_fetch_array($result))
     {

          $query = "INSERT INTO student". "(id,name,email,username,password,access)". "VALUES(NULL,'$name','$email','$user','$pass','student')";
          $data = mysqli_query ($db,$query);
          if($data)
          {
            echo '<script type="text/javascript">'.
        'window.alert("Registration is Completed...");'.
        'window.location.href="neologin";'.
        '</script>';
          }

     }
     else
     {
       echo '<script type="text/javascript">'.
   'window.alert("SORRY...YOU ARE ALREADY REGISTERED USER...");'.
   'window.location.href="neologin";'.
   '</script>';
     }
}
else {

  ?>

  <!DOCTYPE html>
  <html >
  <head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


        <link rel="stylesheet" href="log.css">




  </head>

  <body>
    <input type="submit" onclick=window.location.href="http://localhost/Prac_quiz(old)/pracquiz.html" value="Back">

    <div class="form">

      <h1>Student's Login</h1>
        <ul class="tab-group">
          <li class="tab active"><a href="#login">Log In</a></li>
          <li class="tab"><a href="#signup">Sign Up</a></li>
        </ul>

        <div class="tab-content">


          <div id="login">

            <form action="" method="post">
              <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input type="text" name="username" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" required autocomplete="off"/>
            </div>
            <button type="Submit" name="logsubmit" class="button button-block"/>Log In</button>
            </form>
          </div>

          <div id="signup">
            <form action="" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <label>
                  Name<span class="req">*</span>
                </label>
                <input type="text" name="name" required autocomplete="off" />
              </div>
              <div class="field-wrap">
                <label>
                  Username<span class="req">*</span>
                </label>
                <input type="text" name="user" required autocomplete="off"/>
              </div>
            </div>
            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name="email" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" id="pass" name="pass" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Confirm Password<span class="req">*</span>
              </label>
              <input type="password" id="cpass" name="cpass" required autocomplete="off"/>
            </div>
            <button type="submit" name="signsubmit" class="button button-block"/>Sign Up</button>
            </form>
          </div>

        </div><!-- tab-content -->

  </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="log.js"></script>
      <script>
      $(function()
      {
       var pass = document.getElementById("pass");
       var cpass = document.getElementById("cpass");
       $(':password').change(function()
       {

         if(pass.value != cpass.value)
         {
           cpass.setCustomValidity("Password Didnt Matched");
         }
         else
         {
           cpass.setCustomValidity('');
         }
       }
       );
      }
      );
      </script>


  </body>
  </html>
<?php } ?>
