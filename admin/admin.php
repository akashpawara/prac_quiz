
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/home.css">


</head>

<body>
    <input type="submit" onclick=window.location.href="logout" value="Sign Out">
    <input type="submit" onclick=window.location.href="message" value="Messages">
  <div class="form">
    <?php
       include('session.php');
       if($_SESSION['access']!="admin")
       {
         header("location:http://localhost/ipr/prac-quiz/student/login");
         $error = "Your Login Name or Password is invalid";
         echo $error;
       }
       else {


    ?>
    <h2><?php print "Welcome {$row['name']}"; ?></h1>
      <?php echo '<h3><a href="adminchange.php?id=' . $row['id'] . '">Change Password</a></h3>'; ?>

<h1> Admin Panel</h1>
      <ul class="tab-group">
          <li class="tab active"><a href="#first">CM 1st Year</a></li>
            <li class="tab"><a href="#second">CM 2nd Year</a></li>
        <li class="tab "><a href="#third">CM 3rd Year</a></li>


      </ul>

      <div class="tab-content">




        <div id="first">


          <button type="submit" class="button button-block" onclick="window.location.href='cmf/cmfretval';"/>View Computer Fundamental Questions</button><br>

        </div>

        <div id="second">


          <button type="submit" class="button button-block" onclick="window.location.href='est/estretval';"/>View Environmental studies Questions</button><br>


        </div>

        <div id="third">






<button type="submit" class="button button-block" onclick="window.location.href='man/manretval';"/>View Management Questions</button><br>
<button type="submit" class="button button-block" onclick="window.location.href='ajp/ajpretval';"/>View Advanced Java Questions</button><br>






        </div>



      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php } ?>
