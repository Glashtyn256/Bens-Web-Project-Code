<?php
if(!isset($_SESSION['logged_in']))
{
    echo 'no aloowed BOI';
    // if(isset($_SERVER['HTTP_REFERER']))
    // {
    // header('Location: '.$_SERVER['HTTP_REFERER']);
    // }
    // else{
    //    header('Location: ../Home.php');
        header('Location: Home.php');
} 

?>