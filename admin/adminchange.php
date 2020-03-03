<html>

   <head>
     <input type="button" value="Back" onclick="window.location.href='admin';"/><br><br>

      <title>Change Password</title>
        <link rel="stylesheet"  href="css/form.css" />

   </head>

   <body>
     <div id="page-wrap">
      <?php

      include("session.php");
      if(isset($_GET['id']))
      {


      $id=$_GET['id'];
         if(isset($_POST['update']))
          {
            $sql1="select password from student where id='$id'" ;
             $result = mysqli_query( $db, $sql1 );
            $row1 = mysqli_fetch_assoc($result);

            $curpass = $row1['password'];
            $opass = $_POST['opass'];
            $cpass = $_POST['cpass'];
            $pass = $_POST['pass'];
            if($curpass == $opass)
            {
            $sql = "UPDATE student ". "SET password = '$pass' ".
             "WHERE id = $id" ;

             $retval = mysqli_query( $db, $sql );

             if($retval )
             {
               echo '<script type="text/javascript">'.
             'window.alert("Your privacy has been reasured by us :) ");'.
             'window.location.href="admin";'.
             '</script>';
             }
           }
           else {
             echo '<script type="text/javascript">'.
           'window.alert("Your Current Password was invalid :( ");'.
           'window.location.href="admin";'.
           '</script>';
           }
           }

         ?>


         <form method = "post" action = "">
            <table width = "400" border =" 0" cellspacing = "1"
               cellpadding = "2">
               <h3>Change your Password!!</h3>

               <tr>
                  <td width = "100"><label>Current Passsword:</label></td>
                  <td><input name = "opass" type = "password" id="opass"
                      required></td>
               </tr>

               <tr>
                  <td width = "100"><label>New Password:</label></td>
                  <td><input name = "pass" type = "password" id="pass"
                     required></td>
               </tr>

               <tr>
                  <td width = "100"><label>Confirm Password:</label></td>
                  <td><input name = "cpass" type = "password" id="cpass"
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
                         value = "Chnage">
                  </td>
               </tr>

            </table>
         </form>
       </div>
      <?php
   }
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/log.js"></script>
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
