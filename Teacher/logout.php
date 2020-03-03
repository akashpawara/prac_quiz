<?php
   session_start();

   if(session_destroy()) {
     echo '<script type="text/javascript">'.

 'window.location.href="neologin";'.
 '</script>';
   }
?>
