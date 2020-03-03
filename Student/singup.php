<?php
  include("config.php");


  if(isset($_POST['submit']))
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
        'window.location.href="login";'.
        '</script>';
          }

     }
     else
     {
       echo '<script type="text/javascript">'.
   'window.alert("SORRY...YOU ARE ALREADY REGISTERED USER...");'.
   'window.location.href="singup";'.
   '</script>';
     }
}
else {



?>

<html>

   <head>
     <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
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
      <title>Sing up</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         table {
            font-weight:bold;
            font-size:15px;
         }

         .box {
            border:#664666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">
<input type="button" value="Back" onclick="window.location.href='login';"/><br><br>
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Registration Form</b></div>

            <div style = "margin:30px">
              <table border="0">
               <form action = "" id = "form" method = "post">
                 <tr>
                  <td>Name :</td><td><input type = "text" name = "name" class = "box" placeholder = "name" required /></td>
                </tr>
                <tr>
                  <td>Email :</td><td><input type = "email" name = "email" class = "box" placeholder = "email" title="(format: xxx@xxx.xxx)" required/></td>
                </tr>
                <tr>
                  <td>Username :</td><td><input type = "text" name = "user" class = "box" placeholder = "username" required/></td>
                </tr>
                <tr>
                  <td>Password :</td><td><input type = "password" name = "pass" id="pass" class = "box" placeholder = "password" required /></td>
                </tr>
                <tr>
                  <td>Confirm Password :</td><td><input type = "password" name = "cpass" id="cpass" class = "box" placeholder = "confirm password" required/></td>
                </tr>
                <tr>
                  <td><input type = "submit" value = " Sign Up " name = " submit"/></td>
                </tr>
                </form>
              </table>
                <?php
              }
               ?>

            </div>

         </div>

      </div>


   </body>
</html>
