<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Management Retrieval</title>
    <link rel="stylesheet"  href="retval.css" />
  </head>
  <body>
    <input type="button" value="Back to Admin Panel" onclick="window.location.href='admin';"/><br><br>
    <input type="button" value="Add a Question" onclick="window.location.href='manadd';"/><br><br>

<?php

   include("session.php");

       $sql = "SELECT * FROM man order by id";
      $retval = mysqli_query( $db, $sql );


?>
<table>
  <caption>Management Question Database</caption>
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

                      echo '<td><a href="mandelete.php?id=' . $row['id'] . '">Delete</a></td>';
                      echo "<td><a href='manupdate.php?id=".$row['id']."'>Edit</a></td>";

                  ?>

    </tr>
    <?php

     }




      mysqli_close($db);
?>
</body>
</html>
