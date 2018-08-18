<?php
include('../includes/conn.inc.php');
include('../includes/functions.inc.php');
include('../includes/sessions.inc.php');
include('../includes/authorizeadmin.php');

if(isset($_POST['deleteT1']))
    {

        $pID = safeInt($_POST['pID']);
               if(validInt($_POST['pID']))
               {
              
                $sql = "DELETE FROM Tbl_Projects WHERE pID=:pID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindparam(':pID', $pID); 
                $stmt->execute();
                
                header("Location:AdminPanel.php");
               }
               else{
                   die("invalid ID");
               }

    } else 
    if(isset($_POST['deleteT2']))
        {

        $UserID = safeInt($_POST['UserID']);
               if(validInt($_POST['UserID']))
              {
                $sql = "DELETE FROM Tbl_User WHERE UserID=:UserID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindparam(':UserID', $UserID); 
                $stmt->execute();
                // $stmt = $pdo->prepare($sql);
               
                // $stmt->execute(array(':UserID' => $UserID));
                
                header("Location:AdminPanel.php");
              }

        }

?>
