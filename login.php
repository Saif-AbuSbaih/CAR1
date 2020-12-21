<?php 
    session_start();
    $nonavbar='';
    $pageTitle='login';
    
        if(isset($_SESSION['UserName'])) {
        header('location: index.php'); // redirect to main page 
        }
     include 'Dashbored/init.php';
     
     

        //check if user coming from HTTP post request 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 

            $username = $_POST['User'];
            $password = $_POST['pass'];
            $hasehedPass = sha1($password);

            // check if  user exist in database 
            
            $stmt = $con->prepare(" SELECT
                                            UserID, UserName, Password 
                                        FROM
                                             Users 
                                        WHERE
                                             UserName = ? 
                                         And 
                                            Password = ? 
                                        LIMIT 1");
            $stmt->execute(array($username, $hasehedPass));
            $row=$stmt->fetch();
            $count =$stmt->rowCount(); 
            // if count >0 this mean the user registerd
            if($count>0){
                $_SESSION['UserName']= $username; // register session name
                $_SESSION['ID']= $row['UserID']; // Register Session ID 
                header('location: index.php'); // redirect to dashbored page 
                exit();
            }
            
        }

        
        
?>
 

<form class="Login" action="<?php echo $_SERVER['PHP_SELEF'] ?>" method="POST" >
    <h4 class="text-center"> User Login </h4>
    <input Class="Form-control input-lg" type="text" name="User" placeholder="UserName" autocomplete="off" />
    <input Class="Form-control input-lg" type="password" name="pass" placeholder="password" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" type="submit" value="login" />
    </form>

<?php include 'Dashbored/'.$tpl.'footer.php'; ?> 

