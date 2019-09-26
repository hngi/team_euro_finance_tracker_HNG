<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To login Page
header("Location: index.php");
}
?>