<?php
session_start();
function logout()
{
  session_destroy();  
  header("Location: ".$_SESSION['url']);
}

logout();
?>