<html>

   <head>
     <input type="button" value="Back" onclick="window.location.href='ajpretval';"/><br><br>
     <input type="button" value="Back to Admin Panel" onclick="window.location.href='http://localhost/ipr/prac-quiz/admin/admin';"/><br><br>
      <title>Update a Record in MySQL Database</title>
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


            $ques = $_POST['ques'];
            $opa = $_POST['opa'];
            $opb = $_POST['opb'];
            $opc = $_POST['opc'];
            $opd = $_POST['opd'];
            $ans = $_POST['ans'];


              $sql = "UPDATE ajp ". "SET ques = '$ques' , opa = '$opa' , opb = '$opb' , opc = '$opc' , opd = '$opd' , ans = '$ans' ".
               "WHERE id = $id" ;

               $retval = mysqli_query( $db, $sql );

               if($retval )
               {
                 header('location:ajpretval.php');
               }


         }
         $sql1="select * from ajp where id='$id'" ;
          $result = mysqli_query( $db, $sql1 );
         $row = mysqli_fetch_assoc($result)
            ?>
               <form method = "post" action = "">
                  <table width = "400" border =" 0" cellspacing = "1"
                     cellpadding = "2">
                     <h3>Please make sure that Answer matches anyone of the options!!</h3>

                     <tr>
                        <td width = "100"><label>Question:</label></td>
                        <td><input name = "ques" type = "text" value="<?php echo $row['ques']; ?>"
                            required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option A:</label></td>
                        <td><input name = "opa" type = "text" value="<?php echo $row['opa']; ?>"
                           required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option B:</label></td>
                        <td><input name = "opb" type = "text" value="<?php echo $row['opb']; ?>"
                            required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option C:</label></td>
                        <td><input name = "opc" type = "text" value="<?php echo $row['opc']; ?>"
                           required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Option D:</label></td>
                        <td><input name = "opd" type = "text" value="<?php echo $row['opd']; ?>"
                           required></td>
                     </tr>

                     <tr>
                        <td width = "100"><label>Answer:</label></td>
                        <td><input name = "ans" type = "text" value="<?php echo $row['ans']; ?>"
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
                               value = "Update">
                        </td>
                     </tr>

                  </table>
               </form>
             </div>
            <?php
         }
      ?>

   </body>
</html>
