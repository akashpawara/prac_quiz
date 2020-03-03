<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Details</title>
      <link rel="stylesheet"  href="css/retval.css" />
  </head>
  <body>
    <input type="button" value="Back to Homepage" onclick="window.location.href='homepage';"/><br><br>

<?php

   include("session.php");

       $sql = "SELECT * FROM student";
      $retval = mysqli_query( $db, $sql );
?>
<div id="page-wrap">
<table>
  <caption>Student Details!!</caption>
  <thead>
  <tr>
    <th><label>Name</label></th>
    <th><label>Username</label></th>
    <th><label>Email</label></th>

  </tr>
</thead>

<?php
      while($row = mysqli_fetch_assoc($retval))
      {
?>
  <tr>
      <td> <label><?php echo "{$row['name']}" ?></label> </td>
      <td> <label><?php echo "{$row['username']}" ?> </label></td>
      <td> <h3><?php echo "{$row['email']}" ?> </h3></td>
    </tr>

</div>
    <?php

     }

     


      mysqli_close($db);
?>
</body>
</html>
