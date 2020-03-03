
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="neostyle.css">


</head>

<body>
    <input type="submit" onclick=window.location.href="logout" value="Sign Out">
    <input type="submit" onclick=window.location.href="message" value="Messages">
  <div class="form">
    <?php
       include('session.php');
       if($_SESSION['access']!="admin")
       {
         header("location: neologin");
         $error = "Your Login Name or Password is invalid";
         echo $error;
       }
       else {


    ?>
    <h2><?php print "Welcome {$row['name']}"; ?></h1>
      <?php echo '<h3><a href="adminchange.php?id=' . $row['id'] . '">Change Password</a></h3>'; ?>

<h1> Admin Panel</h1>
      <ul class="tab-group">
        <li class="tab active"><a href="#CM">CM</a></li>
        <li class="tab"><a href="#CO">CO</a></li>
      </ul>

      <div class="tab-content">
        <div id="CM">






<button type="submit" class="button button-block" onclick="window.location.href='manretval';"/>View Management Questions</button><br>
<button type="submit" class="button button-block" onclick="window.location.href='ajpretval';"/>View Advanced Java Questions</button><br>






        </div>

        <div id="CO">


          <button type="submit" class="button button-block" onclick="window.location.href='manretval';"/>View Management Questions</button><br>
          <button type="submit" class="button button-block" onclick="window.location.href='ajpretval';"/>View Advanced Java Questions</button><br>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
<?php } ?>
