<html>
<body>
<?php
include('session.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
  $ques = $_POST['ques'];
  $opa = $_POST['opa'];
  $opb = $_POST['opb'];
  $opc = $_POST['opc'];
  $opd = $_POST['opd'];
  $ans = $_POST['ans'];
  $sql = "UPDATE man ". "SET ques = '$ques' , opa = '$opa' , opb = '$opb' , opc = '$opc' , opd = '$opd' , ans = '$ans' ".
   "WHERE id = $id" ;
   $retval = mysqli_query( $db, $sql );
if($retval)
{
header('location:manretval.php');
}
}
$sql1="select * from man where id='$id'" ;
 $result = mysqli_query( $db, $sql1 );
$row = mysqli_fetch_assoc($result)
?>
<form method="post" action="">
Question:<input type="text" name="ques" value="<?php echo $row['ques']; ?>" /><br />
Option A:<input type="text" name="opa" value="<?php echo $row['opa']; ?>" /><br />
Option B:<input type="text" name="opb" value="<?php echo $row['opb']; ?>" /><br />
Option C:<input type="text" name="opc" value="<?php echo $row['opc']; ?>" /><br />
Option D:<input type="text" name="opd" value="<?php echo $row['opd']; ?>" /><br />
Answer:<input type="text" name="ans" value="<?php echo $row['ans']; ?>" /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>
