<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>Advanced Java</title>

	<link rel="stylesheet" type="text/css" href="quiz.css" />
</head>

<body>
<input type="button" value="Back" onclick="window.location.href='neohomepage';"/><br><br>
	<div id="page-wrap">

		<h2>Advanced Java-Multiple Choice Questions!</h2>

		<h1> For Each Question There will Only Be One Possible Answer</h1>

		<form action="resultajp" method="GET" id="quiz">

    <?php
    include("session.php");
			$q=1;
        $sql = "SELECT * FROM ajp ORDER BY rand() LIMIT 3";
       $retval = mysqli_query( $db, $sql );
 			if($retval)
      {
    ?>

    <table>



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
	<br>

	<h3><?php echo "$q.  "."<b>$ques</b><br><br>";?></h3>

  <div>
  <input type="radio"  id="opa[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opa;?>" required/>
    <label for="opa[<?php echo $id;?>]"><?php echo $opa;?></label>

  </div>

    <div>
    <input type="radio" id="opb[<?php echo $id;?>]"  name = "id[<?php echo $id;?>]" value= "<?php echo $opb;?>" required/>
		<label for="opb[<?php echo $id;?>]"><?php echo $opb;?></label>

  </div>
    <div>
    <input type="radio"  id="opc[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opc;?>" required/>
		<label for="opc[<?php echo $id;?>]"><?php echo $opc;?></label>

  </div>

    <div>
  <input type="radio"  id="opd[<?php echo $id;?>]" name = "id[<?php echo $id;?>]" value= "<?php echo $opd;?>" required/>
	<label for="opd[<?php echo $id;?>]"><?php echo $opd;?></label>

  </div>




</tr>
</div>

<?php
$q++;
}
?>

</table>
 <br>
 <input type ="submit" name="submit" value="Submit Quiz">

 </form>

<?php
}
 ?>

 </div>

 </body>

 </html>
