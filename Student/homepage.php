<?php
   include('session.php');
    if($_SESSION['access']!= "student")
   {
     header("location: login");
     $error = "Your Login Name or Password is invalid";
     echo $error;
   }
   else {

   print "Welcome {$row['name']}";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
    <div id="page-wrap">

  		<h1>Multiple Choice Question Practice Session</h1>
      <h2><a href = "logout.php">Logout</a></h2><br><br>

      <input name="Managment" type="button" value="Managment" onclick="window.location.href='quizman';"/><br><br>
      <input name="Advanced Java" type="button" value="Advanced Java" onclick="window.location.href='quizajp';"/><br><br>
    </div>
  </body>
</html>
<?php } ?>
