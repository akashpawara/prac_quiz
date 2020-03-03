<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

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
       'window.alert("Admin Login Succesfull");'.
       'window.location.href="admin";'.
       '</script>';
         }
         if($row['access'] == "student")
         {
           echo '<script type="text/javascript">'.
       'window.alert("Student Login Succesfull");'.
       'window.location.href="student/neohomepage";'.
       '</script>';
         }

      }
      else
      {

            echo '<script type="text/javascript">'.
          'window.alert("Your Username or Password is invalid!");'.
          '</script>';

      }
   }
?>
<html>

   <head>

<input type="button" value="Back" onclick="window.location.href='http://localhost/prac-quiz/prac-quiz';"/><br><br>

      <title>Login Page</title>
<link rel="stylesheet" type="text/css" href="login.css" />
</head>
      <body>

        <div class="login">
  <div class="heading">
    <h2>Sign in</h2>
    <form action="#" method="post">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>,
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="float">Login</button>
       </form>
 		</div>
 </div>
 </body>
 </html>
