<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Advanced Java Retrieval</title>
    <link rel="stylesheet"  href="retval.css" />
  </head>
  <body>
    <input type="button" value="Back to Homepage" onclick="window.location.href='homepage';"/><br><br>
    <input type="button" value="Add a Question" onclick="window.location.href='ajpadd';"/><br><br>

<?php

   include("session.php");

       $sql = "SELECT * FROM ajp order by id";
      $retval = mysqli_query( $db, $sql );


?>
<table>
  <caption>Advanced Java Question Database</caption>
  <thead>
  <tr>
    <th><label>Question ID</label></th>
    <th><label>Question</label></th>
    <th><label>Option A</label></th>
    <th><label>Option B</label></th>
    <th><label>Option C</label></th>
    <th><label>Option D</label></th>
    <th><label>Answer</label></th>
    <th><label>Delete</label></th>
    <th><label>Edit</label></th>
  </tr>
</thead>

<?php
      while($row = mysqli_fetch_assoc($retval))
      {
        $id = $row['id'];
?>

  <tr>
      <td> <label><?php echo "{$row['id']}" ?></label> </td>
        <td> <label><?php echo "{$row['ques']}" ?> </label></td>
          <td> <label><?php echo "{$row['opa']}" ?> </label></td>
            <td> <label><?php echo "{$row['opb']}" ?> </label></td>
              <td> <label><?php echo "{$row['opc']}" ?> </label></td>
                <td> <label><?php echo "{$row['opd']}" ?> </label></td>
                  <td> <h3><?php echo "{$row['ans']}" ?> </h3></td>
                  <?php

                      echo '<td><a href="ajpdelete.php?id=' . $row['id'] . '">Delete</a></td>';
                      echo "<td><a href='ajpupdate.php?id=".$row['id']."'>Edit</a></td>";

                  ?>

    </tr>
    <?php

     }




      mysqli_close($db);
?>
</body>
</html>
