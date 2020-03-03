<html>

<head>
	<meta charset="UTF-8">
	<title>Advanced Java</title>

	<link rel="stylesheet"  href="quiz.css" />
</head>

<body>



<form action="resultajp" method="GET">
<table>
<?php
include("session.php");
  $q=1;
    $sql = "SELECT * FROM ajp ORDER BY rand() LIMIT 2";
   $retval = mysqli_query( $db, $sql );
  if($retval)
  {
?>



<td><b> For Each Question There will Only Be One Possible Answer</b> </td>


<?php
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
$id = $row["id"];
$ques = $row["ques"];
$opa = $row["opa"];
$opb = $row["opb"];
$opc = $row["opc"];
$opd = $row["opd"];
$ans = $row["ans"];
?>

<div class="container">
	<tr>
	<tr>
	<td>
	<br>
	<br>
	<h2><?php echo "$q "."<b>$ques</b><br><br>";?></h2>

  <ul>
  <li>
  1.<input type="radio"  id="opa[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opa;?>" required/>
    <label for="opa[<?php echo $id;?>]"><?php echo $opa;?></label>
    <div class="check"></div>
  </li>

  <li>
    2.<input type="radio" id="opb[<?php echo $id;?>]"  name = "id[<?php echo $id;?>]" value= "<?php echo $opb;?>" required/>
		<label for="opb[<?php echo $id;?>]"><?php echo $opb;?></label>
    <div class="check"></div><div class="inside"></div></div>
  </li>

  <li>
    3.<input type="radio"  id="opc[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opc;?>" required/>
		<label for="opc[<?php echo $id;?>]"><?php echo $opc;?></label>
    <div class="check"></div><div class="inside"></div></div>
  </li>

  <li>
  4.<input type="radio"  id="opd[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opd;?>" required/>
	<label for="opd[<?php echo $id;?>]"><?php echo $opd;?></label>
    <div class="check"></div><div class="inside"></div></div>
  </li>

</ul>
<br>
<td>
<td>
<td>
<td>
</td>
</tr>
</div>

<?php
$q++;
}
?>
</table>

 <br>
 <input type ="submit" name="submit" value="Submit Quiz" >

</form>

<?php
}
 ?>


 </body>

 </html>
