
<?php
include('../includes/conn.inc.php');
include('../includes/sessions.inc.php');
include('../includes/functions.inc.php');
include('../includes/authorizeadmin.php');

if(isset($_POST['updateT1']))
{    
    $pID = safeInt($_POST['id']);
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

    if(empty($pname) || empty($pdescription) || empty($pdownload) || empty($pfilesize) || empty($preleased)) 
    {
        
        echo "<a href='javascript:self.history.back();'>Go Back</a>";
        die("One of the fields has been left empty");
    }        
  
        
        $sql = "UPDATE Tbl_Projects SET pName=:pName, pDescription=:pDescription, pDownload=:pDownload, pFilesize=:pFilesize, pReleased=:pReleased WHERE pID=:id";
        $stmt = $pdo->prepare($sql);
                
        $stmt->bindparam(':id', $pID);
        $stmt->bindparam(':pName', $pname);
        $stmt->bindparam(':pDescription', $pdescription);
        $stmt->bindparam(':pDownload', $pdownload);
        $stmt->bindparam(':pFilesize', $pfilesize);
        $stmt->bindparam(':pReleased', $preleased);
        $stmt->execute();
        
        header("Location: AdminPanel.php");
    
} 
else if(isset($_POST['updateT2']))
{    
        
        $Email = safeEmail($_POST['Email']);

        if(validEmail($_POST['Email']))
        {
            $UserID = safeInt($_POST['userid']);
            $Fullname = safeString($_POST['Fullname']);
            $Lastname = safeString($_POST['Lastname']);
            $Username = safeString($_POST['Username']);
        }
        else
        {
            echo "<a href='javascript:self.history.back();'>Go Back</a>";
            die("Invalid Email");
        }

        if(empty($Fullname) || empty($Lastname) || empty($Email) || empty($Username)) 
        {
            
            echo "<a href='javascript:self.history.back();'>Go Back</a>";
            die("One of the fields has been left empty");

        } 

        // $sql = "SELECT COUNT(Username) AS numU FROM Tbl_User  WHERE Username = :Username";

        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':Username', $Username);
        // $stmt->execute();
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
        // if($row['numU'] > 0)
        //     {
        //         echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
        //         die('That username already exists!');
        //     } 
        
        // $sql = "SELECT COUNT(email) AS numE FROM Tbl_User WHERE Email = :email";
        // $stmt = $pdo->prepare($sql);
                
        // $stmt->bindValue(':email', $email);
        // $stmt->execute();
                
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
        // if($row['numE'] > 0)
        // {
        //     echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
        //     die('That Email already exists!');
        // }

        $sql = "UPDATE Tbl_User SET Fullname=:Fullname, Lastname=:Lastname, Email=:Email, Username=:Username WHERE UserID=:userid";
        $stmt = $pdo->prepare($sql);
                
        $stmt->bindparam(':userid', $UserID);
        $stmt->bindparam(':Fullname', $Fullname);
        $stmt->bindparam(':Lastname', $Lastname);
        $stmt->bindparam(':Email', $Email);
        $stmt->bindparam(':Username', $Username);
        $stmt->execute();
        
        header("Location: AdminPanel.php");

}
?>
<!doctype html>
<html>
<head>

	<title>Edit CMS</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width : 600px)" href="../css/desktop.css">
</head>
<body>
	<header>
	<div class="container">
		<div class="burgerMenu">
				<div class="menuLabel">Menu</div>
				<div class="bars">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
			<h1 class="mobH1">BWP</h1>

	<nav>
		<ul>
			<li><h1>BWP</h1></li>
					<li><a href="../Home.php">Home</a></li>
					<li><a href="../WebGame.php">WebGame</a></li>
					<li><a href="../CV.php">CV</a></li>
					<li><a href="../Search.php">Search</a></li>
			        <li><a class="link" href="../logout.php" style="text-decoration:none">logout</a><li>
		</ul>
	</nav>
	</div>
	</header>


<div class="container">
	<div class="banner">
		<h2>Edit Data</h2>
	</div>
	<div class="content">
		<div class="main">
		<h2>Edit</h2>
		<p>Make sure you enter the correct stuff, otherwise you'll be told it wrongs and have to retype it again. validation checking</p>
					<div>	

     <?php
    if(isset($_POST['editT1']))
{
    
            
            $pID = safeInt($_POST['pID']);
            
            
            $sql = "SELECT * FROM Tbl_Projects WHERE pID=:pID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindparam(':pID', $pID);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $pname = safeString($row['pName']);
                $pdescription = safeString($row['pDescription']);
                $pdownload = safeString($row['pDownload']);
                $pfilesize = safeFloat($row['pFilesize']);
                $preleased = safeInt($row['pReleased']);
            }
    echo"<form name='editT1form' method='post' action='edit.php'>
        <table border='0'>
            <tr>
                <td>Project Name</td>
                <td><input type='text' name='pName' value='$pname'></td>
            </tr>
            <tr> 
                <td>Project Description</td>
                <td><input type='text' name='pDescription' value='$pdescription'></td>
            </tr>
            <tr> 
                <td>Project Download</td>
                <td><input type='text' name='pDownload' value='$pdownload'></td>
            </tr>
            <tr> 
                <td>Project Filesize</td>
                <td><input type='text' name='pFilesize' value='$pfilesize'></td>
            </tr>
             <tr> 
                <td>Project Released</td>
                <td><input type='text' name='pReleased' value='$preleased'></td>
            </tr>
            <tr>
                <td><input type='hidden' name='id' value='$pID'></td>
                <td><input type='submit' name='updateT1' value='Update'></td>
            </tr>
        </table>
    </form>";
}  else if(isset($_POST['editT2']))
{

            $UserID = safeInt($_POST['UserID']);
                
            
                $sql = "SELECT * FROM Tbl_User WHERE UserID=:UserID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindparam(':UserID', $UserID);
                $stmt->execute();
                
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $Fullname = safeString($row['Fullname']);
                    $Lastname = safeString($row['Lastname']);
                    $Email = safeEmail($row['Email']);
                    $Username = safeString($row['Username']);
                    
                }
            echo"<form action='edit.php' method='post' name='editT2form'>
                        <table border='0'>
                            <tr> 
                                <td>Fullname</td>
                                <td><input type='text' name='Fullname' value ='$Fullname'></td>
                            </tr>
                            <tr> 
                                <td>Lastname</td>
                                <td><input type='text' name='Lastname' value='$Lastname'></td>
                            </tr>
                            <tr> 
                                <td>Email</td>
                                <td><input type='email' name='Email' value='$Email'></td>
                            </tr>
                            <tr> 
                                <td>Username</td>
                                <td><input type='text' name='Username' value ='$Username'></td>
                            </tr>
                            <tr>
                                <td><input type='hidden' name='userid' value='$UserID'></td>
                                <td><input type='submit' name='updateT2' value='Update'></td>
                            </tr>
                        </table>
                    </form> ";
 }
        
    
    ?>
 </div>
		</div>
	</div>
	
	<footer>
		<p>&copy; Copyright 2017</p>
	</footer>
	
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
