<?php
include('session.php');
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];

$sql = "DELETE FROM ajp WHERE id='$id' ";

 $result = mysqli_query( $db, $sql );

header("Location: ajpretval.php");
}
else {
  echo "ERROR!";
}


?>
