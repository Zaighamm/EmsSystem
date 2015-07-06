<?php
session_start();
require("helpers.php");


if(isset($_GET['page'])) 
{
    $page = $_GET['page'];
}
else 
    $page = "home";


render("header");
render($page);
render("footer");
?>