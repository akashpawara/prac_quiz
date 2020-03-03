<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select * from teacher where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:login");
   }
   $_SESSION['access']=$row['access'];
   if($row['access'] != "vesp123")
   {
       header("location:http://localhost/ipr/prac-quiz/teacher/login");
   }

?>
