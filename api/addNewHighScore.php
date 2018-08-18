<?php
//ini_set('display_errors', 1);
header('Content-Type: application/json');
require('../includes/conn.inc.php');
require('../includes/functions.inc.php');  
$playerScore = safeInt($_POST['playerScore']);
$playerName = safeString($_POST['playerName']);

$stmt = $pdo->prepare("SELECT ID FROM highscores WHERE gamePlayer = :gamePlayer");
$stmt->bindParam(':gamePlayer', $playerEmail, PDO::PARAM_STR);
$stmt->execute();

$total = $stmt->rowCount();



if($total == 1)
{ 
$obj = $stmt->fetchObject(); 
$playerID = $obj->ID; 

$stmt = $pdo->prepare("UPDATE highscores SET gameScore = :playerScore WHERE ID = :playerID");

$stmt->bindParam(':playerScore', $playerScore, PDO::PARAM_INT); 
$stmt->bindParam(':playerID', $playerID, PDO::PARAM_INT); 
$stmt->execute(); 
} else
{
    $stmt = $pdo->prepare("INSERT INTO highscores(gameScore, gamePlayer) VALUES (:gameScore, :gamePlayer)");

    $stmt->bindParam(':gameScore', $playerScore, PDO::PARAM_INT); 
    $stmt->bindParam(':gamePlayer', $playerName, PDO::PARAM_STR); 
    $stmt->execute(); 
}

$sql = "SELECT gameScore, gamePlayer FROM highscores ORDER BY gameScore DESC"; 

$stmt = $pdo->query($sql); 
$returnAr = array(); 

while ($row =$stmt->fetchObject()) { 
    array_push($returnAr, array('dbPlayer'=>$row->gamePlayer, 'dbScore'=>$row->gameScore)); 
    } 

echo json_encode($returnAr);
?>