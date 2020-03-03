<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<input type="button" value="Back to quiz" onclick="window.location.href='quizman';"/><br><br>
<input type="button" value="Back to Homepage" onclick="window.location.href='neohomepage';"/><br><br>
	<title>Result</title>

	<link rel="stylesheet" type="text/css" href="quiz.css" />
</head>

<body>

	<div id="page-wrap">

		<h5>Result!!</h5>

<?php
include("session.php");
if(isset($_REQUEST['id']))
{
    $arr_id = $_REQUEST['id'];




	 $score=0;
	$x=0;
	$i=1;
	foreach($arr_id as $id=>$value)
	{

		$sql = "SELECT * FROM man Where id = '$id'";
	 $result = mysqli_query($db, $sql);
	 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	 $ans=$row["ans"];
	 $ques=$row["ques"];
	 ?>

 		<h4>	<label> Question no. </label> <?php echo "$i" ?> </h4>
    <h4>  <label>Question: </label><?php echo "$ques" ?> </h4>
		<h4>	<label>Selected Answer:</label> <?php echo "$value" ?> </h4>
		<h4>	<label>Correct Answer: </label> <?php echo "$ans" ?> </h4>
		<br>
		<?php

			 if($row['ans'] == $value)
 			{
 				$score++;
 			}
			$x++;
			$i++;
 	 }
	 ?>
	 	<h4><label>You answered </label> <?php echo "$score" ?> <label> out of </label> <?php echo "$x" ?> <label>questions correctly</label></h4>
		<?php
}
?>
</div>

</body>

</html>
