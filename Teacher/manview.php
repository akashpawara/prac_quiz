<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Management Retrieval</title>
    <link rel="stylesheet"  href="retval.css" />
  </head>
  <body>
    <input type="button" value="Back to Homepage" onclick="window.location.href='homepage';"/><br><br>
    <?php

       include("session.php");

       $sql = "SELECT * FROM man order by id";
      $retval = mysqli_query( $db, $sql );


      $per_page = 1;

      $total_results = mysqli_num_rows($retval);

$total_pages = ceil($total_results / $per_page);
if (isset($_GET['page']) && is_numeric($_GET['page']))

{

$show_page = $_GET['page'];
if ($show_page > 0 && $show_page <= $total_pages)

{

$start = ($show_page -1) * $per_page;

$end = $start + $per_page;

}

else
{

  $start = 0;

$end = $per_page;

}

}

else

{
  $start = 0;

  $end = $per_page;

  }
  echo "<p><a href='manretval.php'>View All</a> | <b>View Page:</b> ";

  for ($i = 1; $i <= $total_pages; $i++)

  {

  echo "<a href='view-paginated.php?page=$i'>$i</a> ";

  }

  echo "</p>";

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
    </tr>
  </thead>
<?php
for ($i = $start; $i < $end; $i++)

{
  if ($i == $total_results) { break; }
 ?>
 <tr>
     <td> <label><?php echo mysqli_free_result($retval); ?></label> </td>
       <td> <label><?php echo mysqli_free_result($retval, $i,'ques'); ?> </label></td>
         <td> <label><?php echo mysqli_free_result($retval, $i,'opa'); ?> </label></td>
           <td> <label><?php echo mysqli_free_result($retval, $i,'opb'); ?> </label></td>
             <td> <label><?php echo mysqli_free_result($retval, $i,'opc'); ?> </label></td>
               <td> <label><?php echo mysqli_free_result($retval, $i,'opd');?> </label></td>
                 <td> <h3><?php echo mysqli_free_result($retval, $i,'ans'); ?> </h3></td>
                 <?php

                     echo '<td><a href="mandelete.php?id=' . $row['id'] . '">Delete</a></td>';
                     echo "<td><a href='manupdate.php?id=".$row['id']."'>Edit</a></td>";

                 ?>

   </tr>
<?php
}
  mysqli_close($db);
 ?>
</table>
</body>

</html>
