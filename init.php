 <?php
    include 'connect.php';
    
 $tpl  = 'Dashbored/includes/templates/';   // templates path 
 $lang = 'Dashbored/includes/languages/';   // languages dairoctory 
 $func = 'Dashbored/includes/Functions/'; // functions dairctory 
 $css  = 'Dashbored/layout/css/';    // css path 
 $js   = 'Dashbored/layout/js/';     // js path 
 $img  = 'img/cars/';

 include $func.'function.php';
 include $lang.'english.php';
 
 include $tpl .'header.php'; 
 
 //  include the navbar with all pages except the one with no nav bar variable 
 if(!isset($nonavbar)){ include $tpl . 'navbar.php'; } 


 
 
 

 ?>