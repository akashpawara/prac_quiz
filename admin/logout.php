<?php
   session_start();

   if(session_destroy()) {
     echo '<script type="text/javascript">'.
 'window.location.href="http://localhost/ipr/prac-quiz/student/login";'.
 '</script>';
   }
?>
