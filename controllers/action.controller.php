<?php
$action = '';
if (!isset($_GET["action"])) return  include("./views/404.php");
if (empty($_GET["action"])) return  include("./views/404.php");

$action = $_GET["action"];
