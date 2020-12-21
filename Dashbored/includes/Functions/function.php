<?php 

  

    function getTitle(){

        global$pageTitle;

        if(isset($pageTitle)){

            echo $pageTitle; 
        } else{

            echo 'Default';
        }
    }
  
    // the below -> . <- is for style if u delted the style will get error
  
  /*
  ** HomeRedirect function(redirct the user to home page if any things gone rong )
  ** $errorMsg = echo the error massege 
  ** $seconds = the time before redirecting
  */

  function HomeRedirect($errorMsg='you can not browse this page directly',$seconds=3){
      echo '<div class="alert alert-danger"> '.$errorMsg.' </div> ';
      echo '<div class="alert alert-info">You will redirect to home page after '.$seconds .' seconds</div> ';
      header("refresh:$seconds;url=index.php");
      exit();

    }
   
