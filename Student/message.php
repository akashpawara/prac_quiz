<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Messages</title>
      <link rel="stylesheet"  href="retval.css" />
  </head>
  <body>
    <input type="button" value="Back to Admin Panel" onclick="window.location.href='neoadmin';"/><br><br>

<?php

   include("config.php");

       $sql = "SELECT * FROM message";
      $retval = mysqli_query( $db, $sql );
?>
<div id="page-wrap">
<table>
  <caption>Messages!!</caption>
  <thead>
  <tr>
    <th><label>Name</label></th>
    <th><label>Email</label></th>
    <th><label>Message</label></th>

  </tr>
</thead>

<?php
      while($row = mysqli_fetch_assoc($retval))
      {
?>
  <tr>
      <td> <label><?php echo "{$row['name']}" ?></label> </td>
      <td> <label><?php echo "{$row['email']}" ?> </label></td>
      <td> <h3><?php echo "{$row['msg']}" ?> </h3></td>
    </tr>
  
</div>
    <?php

     }

     echo '<script type="text/javascript">'.
 'window.alert("Fetched Data successfully");'.
 '</script>';;


      mysqli_close($db);
?>
</body>
</html>
