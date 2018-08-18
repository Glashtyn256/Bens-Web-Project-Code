<?php
if(!isset($_SESSION['Adminlogged_in'])){
    // echo 'no aloowed BOI';
    // if(isset($_SERVER['HTTP_REFERER']))
    // {
    // header('Location: '.$_SERVER['HTTP_REFERER']);
    // }
    // else{
      
    // }
    header('Location: ../Home.php');
} 
// else{
//     header('Location: ../Home.php');
// }
?>