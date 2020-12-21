 <?php
    include 'connect.php';
    
 $tpl  = 'includes/templates/';   // templates path 
 $lang = 'includes/languages/';   // languages dairoctory 
 $func = 'includes/Functions/'; // functions dairctory 
 $css  = 'layout/css/';    // css path 
 $js   = 'layout/js/';     // js path 
 

 include $func.'function.php';
 include $lang.'english.php';
 
 include $tpl .'header.php'; 
 
 //  include the navbar with all pages except the one with no nav bar variable 
 if(!isset($nonavbar)){ include $tpl . 'navbar.php'; } 


 
 
 

 ?>