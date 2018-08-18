<?php
//ini_set('display_errors', 1);
include('../includes/conn.inc.php');
include('../includes/sessions.inc.php');
include('../includes/functions.inc.php');
include('../includes/authorizeadmin.php');
?>


					
 <?php
 
if(isset($_POST['t1Submit'])) 
{

    $pname = safeString($_POST['pName']);
    $pdescription = safeString($_POST['pDescription']);
    $pdownload = safeString($_POST['pDownload']);
    $pfilesize = safeFloat($_POST['pFilesize']);
    $preleased = safeInt($_POST['pReleased']);
   
    if(!validFloat($_POST['pFilesize']))
    {
        echo "<a href='javascript:self.history.back();'>Go Back</a>";
        die("Float not valid");
    }

    if(empty($pname) || empty($pdescription) || empty($pdownload) || empty($pfilesize) || empty($preleased)) {
        
        echo "<a href='javascript:self.history.back();'>Go Back</a>";
        die("One of the fields has been left empty");
    } 
    else
    { 
              
        $sql = "INSERT INTO Tbl_Projects(pName, pDescription, pDownload, pFilesize, pReleased) VALUES(:pName, :pDescription, :pDownload, :pFilesize, :pReleased)";
        $stmt = $pdo->prepare($sql);
                
        $stmt->bindparam(':pName', $pname);
        $stmt->bindparam(':pDescription', $pdescription);
        $stmt->bindparam(':pDownload', $pdownload);
        $stmt->bindparam(':pFilesize', $pfilesize);
        $stmt->bindparam(':pReleased', $preleased);
        $stmt->execute();
        
        header("Location:AdminPanel.php");
       
    }
    echo "<a href='javascript:self.history.back();'>Go Back</a>";
    die("ERROR SOMETHING WENT HORRIBLY WRONG GO BACK ABORT ABORT");
 
} 
else if (isset($_POST['t2Submit'])) 
{    

        $Email = safeEmail($_POST['Email']);

        if(validEmail($_POST['Email']))
        {
            $Fullname = safeString($_POST['Fullname']);
            $Lastname = safeString($_POST['Lastname']);
            $Username = safeString($_POST['Username']);
            $Password = safeString($_POST['Password']);
        }
        else
        {
            echo "<a href='javascript:self.history.back();'>Go Back</a>";
            die("Invalid Email");
        }

        if(empty($Fullname) || empty($Lastname) || empty($Email) || empty($Username) || empty($Password)) 
        {
            
            echo "<a href='javascript:self.history.back();'>Go Back</a>";
            die("One of the fields has been left empty");

        } 
        $sql = "SELECT COUNT(Username) AS numU FROM Tbl_User  WHERE Username = :Username";
        $stmt = $pdo->prepare($sql);
            
            
        $stmt->bindValue(':Username', $Username);
        $stmt->execute();
            
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
        if($row['numU'] > 0)
            {
                echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
                die('That username already exists!');
            } 
        
        $sql = "SELECT COUNT(email) AS numE FROM Tbl_User WHERE Email = :email";
        $stmt = $pdo->prepare($sql);
                
        $stmt->bindValue(':email', $email);
        $stmt->execute();
                
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
        if($row['numE'] > 0)
        {
            echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
            die('That Email already exists!');
        }
            
        $passwordHash = password_hash($Password, PASSWORD_BCRYPT, array("cost" => 12));

        $sql = "INSERT INTO Tbl_User(Fullname, Lastname, Email, Username, Password) VALUES(:Fullname, :Lastname, :Email, :Username, :Password)";
        $stmt = $pdo->prepare($sql);
                
        $stmt->bindparam(':Fullname', $Fullname);
        $stmt->bindparam(':Lastname', $Lastname);
        $stmt->bindparam(':Email', $Email);
        $stmt->bindparam(':Username', $Username);
        $stmt->bindparam(':Password', $passwordHash);
        $stmt->execute();

      

         header("Location:AdminPanel.php");
        
    
}
?>	
       