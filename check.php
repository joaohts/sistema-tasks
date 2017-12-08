<?php
  
if (!isLoggedIn())
{
    header('Location: index.php');
}