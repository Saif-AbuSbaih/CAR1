<?php 
 
    // Catigores => {MAnge | edit | update | add | insert  | delete | stats }
    //

    
    $do= isset($_GET['do']) ? $_GET['do'] : 'Mange';
    // if the page is main page 
    if($do == 'Mange'){

        echo 'Welcom you are mange catogrie page  ';
        echo '<a href="?do=Insert">add new catogrie +</a>';

    }elseif($do == 'Add'){
        echo 'Welcom you are Add catogrie page  ';

    }elseif($do == 'Insert'){
        echo 'Welcom you are Insert catogrie page  ';

    }else{
        
        echo 'error there\'s no page with this name';
        
    }
