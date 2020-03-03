<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<input type="button" value="Back to quiz" onclick="window.location.href='quizcmf';"/><br><br>
<input type="button" value="Back to Homepage" onclick="window.location.href='http://localhost/ipr/prac-quiz/student/homepage';"/><br><br>
	<title>Result</title>

	<link rel="stylesheet" type="text/css" href="css/quiz.css" />
</head>

<body>

	<div id="page-wrap">

		<h5>Computer Fundamental Result!!</h5>

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

		$sql = "SELECT * FROM cmf Where id = '$id'";
	 $result = mysqli_query($db, $sql);
	 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


			 if($row['ans'] == $value)
 			{
 				$score++;
 			}
			$x++;

 	 }
	 ?>
	 	<h4><label>You answered </label><h7> <?php echo "$score" ?> </h7><label> out of </label> <h7><?php echo "$x" ?></h7> <label>questions correctly!!</label></h4><br>
		<?php
		foreach($arr_id as $id=>$value)
		{
			$sql = "SELECT * FROM cmf Where id = '$id'";
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
			$i++;
		}
}
?>
</div>

</body>

</html>
