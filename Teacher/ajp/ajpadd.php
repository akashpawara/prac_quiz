<html>

   <head>
     <input type="button" value="Back" onclick="window.location.href='ajpretval';"/><br><br>
     <input type="button" value="Back to Homepage" onclick="window.location.href='http://localhost/ipr/prac-quiz/teacher/homepage';"/><br><br>

      <title>Add a Record in MySQL Database</title>
              <link rel="stylesheet"  href="css/form.css" />
   </head>

   <body>
     <div id="page-wrap">
      <?php
      include("session.php");
         if(isset($_POST['add'])) {


            $ques = $_POST['ques'];
            $opa = $_POST['opa'];
            $opb = $_POST['opb'];
            $opc = $_POST['opc'];
            $opd = $_POST['opd'];
            $ans = $_POST['ans'];

            $sql = "SELECT * FROM ajp WHERE ques = '$ques' ";
            $check = mysqli_query($db,$sql);

            if(!$row = mysqli_fetch_array($check))
            {


              $sql = "INSERT INTO ajp". "(id,ques,opa,opb,opc,opd,ans)". "VALUES(NULL,'$ques','$opa','$opb','$opc','$opd','$ans')"; ;

               $result = mysqli_query( $db, $sql );

               if( $result )
               {
                 header('location:ajpretval.php');
               }
             }
             else {
               echo '<script type="text/javascript">'.
           'window.alert("Sorry this question already exist in our world :( ");'.
           'window.location.href="ajpretval.php";'.
           '</script>';
             }

         }

            ?>
               <form method = "post" action = "">
                  <table width = "400" border =" 0" cellspacing = "1"
                     cellpadding = "2">
                     <h3>Please Check Whether the Answer field matches atleast one of the Option field!!</h3>

                     <tr>
                        <td width = "100"><label>Question:</label></td>
                        <td><input name = "ques" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option A:</label></td>
                        <td><input name = "opa" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option B:</label></td>
                        <td><input name = "opb" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option C:</label></td>
                        <td><input name = "opc" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option D:</label></td>
                        <td><input name = "opd" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Answer:</label></td>
                        <td><input name = "ans" type = "text"
                           id = "id" required></td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit"
                              id = "add" value = "add">
                        </td>
                     </tr>

                  </table>
               </form>
             </div>
    

   </body>
</html>
