<?php 
    session_start();
    
    if(isset($_SESSION['UserName'])) {
     
      $pageTitle='Dashbored';

      include'init.php';
       print_r($_SESSION);
       include $tpl . 'footer.php'; 
}else{

   header('location: index.php');
   exit();

} 