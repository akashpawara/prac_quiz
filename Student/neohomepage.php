
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student's Homepage</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="neostyle.css">


</head>

<body>
  <input type="submit" onclick=window.location.href="logout" value="Sign Out">


  <div class="form">
    <?php
       include('session.php');
        if($_SESSION['access']!= "student")
       {
         header("location: login");
         $error = "Your Login Name or Password is invalid";
         echo $error;
       }
       else {



    ?>
<h2><?php print "Welcome {$row['name']}"; ?> </h2>
<?php echo '<h3><a href="change.php?id=' . $row['id'] . '">Change Password</a></h3>'; ?>

<h1> Practice Quiz session!! </h1>
      <ul class="tab-group">
        <li class="tab active"><a href="#cm">CM</a></li>
        <li class="tab"><a href="#co">CO</a></li>

      </ul>

      <div class="tab-content">
        <div id="cm">






<button type="submit" class="button button-block" onclick="window.location.href='quizman';"/>Management</button><br>
<button type="submit" class="button button-block" onclick="window.location.href='quizajp';"/>Advanced Java</button>






        </div>

        <div id="co">

          <button type="submit" class="button button-block" onclick="window.location.href='quizman';"/>Management</button><br>
          <button type="submit" class="button button-block" onclick="window.location.href='quizajp';"/>Advanced Java</button>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
<?php } ?>
