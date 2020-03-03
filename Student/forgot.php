<html>

   <head>
     <input type="button" value="Back" onclick="window.location.href='login.php';"/><br><br>

      <title>Forgot Password</title>
        <link rel="stylesheet"  href="css/form.css" />

   </head>

   <body>
     <div id="page-wrap">
      <?php

      include("config.php");
         if(isset($_POST['update']))
          {
             $username = mysqli_real_escape_string($db,$_POST['username']);
             $sql = "SELECT * FROM student WHERE username = '$username' ";
             $result = mysqli_query($db,$sql);
             $row = mysqli_fetch_assoc($result);

                $count = mysqli_num_rows($result);
             if($count == 1)
             {
               ini_set('sendmail_from','akashpawara29@gmail.com');
               $password = $row['password'];
               $to = $row['email'];
               $subject = "Your Recovered Password";

               $message = "Please use this password to login " . $password;
               $headers = "From : akashpawara29@gmail.com";
               $retval = mail ($to,$subject,$message,$headers);

            if( $retval == true ) {
               echo "Message sent successfully...";
            }else {
               echo "Message could not be sent...";
            }
	           }
             else
             {
		             echo "User name does not exist in database";
	           }
          }
      ?>

               <form method = "post" action = "#">
                  <table width = "400" border =" 0" cellspacing = "1"
                     cellpadding = "2">
                     <h3>Forgot your Password!!</h3>

                     <tr>
                        <td width = "100"><label>Your username:</label></td>
                        <td><input name = "username" type = "text" id="opass"
                            required></td>
                     </tr>
       <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit"
                               value = "Forgot">
                        </td>
                     </tr>

                  </table>
               </form>
       </div>
      </body>
      </html>
