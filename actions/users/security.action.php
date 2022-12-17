<?php

session_start();

if(!isset($_SESSION["auth"])){
    $IS_CONNECTED_USER=false;
    header("location:login.php");

}else{
    $IS_CONNECTED_USER=true;
}