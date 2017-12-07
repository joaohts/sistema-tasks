<?php
 
require_once '_app/Config.inc.php';
 
if (!isLoggedIn())
{
    header('Location: index.php');
}