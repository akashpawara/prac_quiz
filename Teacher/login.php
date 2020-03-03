<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM teacher WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQL_ASSOC);


      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         $_SESSION['access']=$row['access'];
         if($row['access'] == "vesp123")
         {
           echo '<script type="text/javascript">'.
       'window.alert("Teachers Login Succesfull");'.
       'window.location.href="homepage";'.
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

<input type="button" value="Back" onclick="window.location.href='http://localhost/prac-quiz/Quiz';"/><br><br>

      <title>Teacher's Login</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         table {
            font-weight:bold;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Teacher's Login</b></div>

            <div style = "margin:30px">
              <table border="0">
               <form action = "" method = "post" name= "form">
                <tr>
                  <td>Username :</td><td><input type = "text" id = "username" name = "username" class = "box" placeholder = "username" required/></td>
                </tr>
                <tr>
                  <td>Password :</td><td><input type = "password" id="password" name = "password" class = "box" placeholder = "********" required/></td>
                </tr>
                <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                <tr>
                  <td><input type = "submit" value = " Login "/> </td>
                  <td><input type = "button" value = " Signup " onclick="window.location.href='singup';"/></td>
                </tr>
               </form>
             </table>


            </div>

         </div>

      </div>

   </body>
</html>
