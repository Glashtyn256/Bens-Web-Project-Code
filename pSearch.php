<?php 
    include('includes/conn.inc.php');
    include('includes/functions.inc.php');
    

     if(isset($_REQUEST['term']))
     {
        
        $term = safeString($_REQUEST['term']). '%';
         $sql = "SELECT * FROM Tbl_Projects WHERE pName LIKE :term OR pReleased LIKE :term ORDER BY pName" ;
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':term', $term);
       
         $stmt->execute();
       
         if($stmt->rowCount() > 0)
         {
            echo"<table width='100%' border=0>
                <tr bgcolor='#CCCCCC'>
                <td>Project Name</td>
                 <td>Project Description</td>
                 <td>Project Download</td>
                <td>Filesize (GB)</td>
                <td>Released</td>
                </tr>";
             while($row = $stmt->fetch())
             {
                echo "<tr>";
                echo "<td>".$row['pName']."</td>";
                echo "<td>".$row['pDescription']."</td>";
                echo "<td>".$row['pDownload']."</td>";
                echo "<td>".$row['pFilesize']."</td>";
                echo "<td>".$row['pReleased']."</td>";
                echo"</tr>";
             }
         } 
         else
         {
             echo "<p>No matches found</p>";
         }
         echo"</table>";
     }  
?>