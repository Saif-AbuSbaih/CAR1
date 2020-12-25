<?php 
     session_start();
     $pageTitle = 'Members';
    
     if(isset($_SESSION['UserName'])) {
        include'init.php';

      $do=isset($_GET['do'])? $_GET['do']:'Mange';
      // start mange page 
      if($do == 'Mange'){  //mange page 
         // select the data 
      $stmt=$con->prepare("SELECT * FROM users WHERE GroupID != 1");
        // exeute the statment 
      $stmt->execute();
         // Assign to variable 
      $rows=$stmt->fetchALL();
      ?>
         <h1 class="text-center">Mange Member</h1>
         <div class="container"> </div>
         <div class="table-responsive">
            <table class="table text-center main-table " border=2px>
                  <tr>
                     <td> #ID</td>
                     <td> UserName</td>
                     <td> Email</td>
                     <td> FullName</td>
                     <td> Register date</td>
                     <td> Control</td>
                  </tr>
                  <?php 
                  foreach($rows as $row){
                     echo '<tr>';
                        echo'<td>'. $row['UserID']    .'</td>';
                        echo'<td>'. $row['UserName']  .'</td>';
                        echo'<td>'. $row['Email']     .'</td>';
                        echo'<td>'. $row['FullName']  .'</td>';
                        echo'<td>'.'</td>';
                        echo'<td> <a href="?do=Edit&userid='.$row['UserID'].'" class=" btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                  <a href="?do=Delete&userid='.$row['UserID'].'" class="btn btn-danger confirm "><i class="fa fa-close"></i>  Delete</a>
                              </td>';
                     echo'</tr>';
                  }
                  ?>
               </table>
            </div>
       <a href="?do=Add" class="btn btn-primary fa fa-plus"> Add New member </a>
       </div>
         <?php
      //===================ADD=================ADD==============ADD==========================================   
      }elseif($do == 'Add'){

         // Add page      
         $dataAddMember =  '

                  <h1 class="text-center">Add member</h1>
                     <div class="container"> </div>
                     <form class="form-horizontal" action="?do=insert" method="POST">
                        <!-- start username filed -->
                        <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">User Name</label>
                           <div class="col-sm-10 col-md-3">
                           <input type="text" name="username"  class="form-control" autocomplete="off" required="required"  placeholder="UserName"/>
                        </div>
                     </div>
                        <!-- end username filed -->  
                  <!-- start Password filed -->
                  <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-10 col-md-3">
                           <input type="password" name="password"  class="password form-control" autocomplete="new-password" required="required" placeholder="Strong Password Required "/>
                           <i class="show-pass fa fa-eye "></i> 
                        </div>
                     </div>
                        <!-- end Password filed -->  
                     <!-- start Email filed -->
                     <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-10 col-md-3">
                           <input type="Email" name="email"  class="form-control" required="required" placeholder="Enter A valid Email"/>
                        </div>
                     </div>
                        <!-- end Email filed -->
                     <!-- start FullName filed -->
                     <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Full Name</label>
                           <div class="col-sm-10 col-md-3">
                           <input type="text" name="fullName"  class="form-control" required="required" placeholder="The name Appers in your profile" />
                        </div>
                     </div>
                        <!-- end FullName filed -->  
                     <!-- start submit filed -->
                     <div class="form-group form-group-lg">
                           <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit" vlaue="Save" class="btn btn-primary btn-lg"/>
                        </div>
                     </div>
                        <!-- end submit filed -->             
        
              ';

                  echo $dataAddMember;
      //=======================INSERT==================INSERT==============================================            
      }elseif( $do == 'insert'){
         // insert page 
         
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo"<h1 class='text-center'> Insert  member</h1>";
            echo "<div class='continer'>";
            // get variables from the form 
            $user    = $_POST['username'];
            $email   = $_POST['email'];
            $full    = $_POST['fullName'];
            $pass    = $_POST['password'];
            
            $hasdpass=sha1($pass);

           // validate the form 
            $formErrors = array();
           
            if(empty($user))
               $formErrors[] = 'UserName can\'t be empty ';
            if(empty($pass))
               $formErrors[] = 'password can\'t be empty ';
            if(empty($email))
               $formErrors[] = 'Email can\'t be empty ';
            if(empty($full))
               $formErrors[] = 'FullName can\'t be empty ';
            foreach($formErrors as $errors){
               echo "<div class='alert alert-danger'>";
               echo $errors . '<br/>';
               echo "</div>";
            }
            if(empty($formErrors)){
           // insert into dataBase 
             $stmt=$con->prepare(
                                    "INSERT INTO
                                          users(UserName, Password, Email, FullName) 
                                       VALUES(:zuser, :zpass, :zemail, :zname) ");
           $stmt->execute(array(

                 'zuser'   => $user,
                 'zpass'   => $hasdpass,
                 'zemail'  => $email,
                 'zname'   => $full
                 
               ));
   
            echo "<div class='alert alert-success'>". $stmt->rowCount() . " record Inserted </div>";
            echo "</div>";
            }
         }else{
            $errorMsg = 'Bad idea';
            HomeRedirect($errorMsg,5);
   
         }
         
         
      //===============================EDIT===================EDIT=============================================
      }elseif($do == 'Edit'){  // edit page 
         $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;
         $stmt = $con->prepare(" SELECT * FROM Users WHERE UserID = ? LIMIT 1");
         $stmt->execute(array($userid));
         $row=$stmt->fetch();
         $count =$stmt->rowCount(); 
        // print_r($row);
           if($stmt->rowCount() > 0){ 
              $data =  '

                  <h1 class="text-center">Edit member</h1>
                     <div class="container"> </div>
                     <form class="form-horizontal" action="?do=update" method="POST">
                        <input type="hidden" name="userid" value="preuserid" />
                        <!-- start username filed -->
                        <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">User Name</label>
                           <div class="col-sm-10 col-md-2">
                           <input type="text" name="username" value="preUsername" class="form-control" autocomplete="off" required="required" " />
                        </div>
                     </div>
                        <!-- end username filed -->  
                  <!-- start Password filed -->
                  <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-10 col-md-2">
                           <input type="hidden" name="oldpassword" value="prePassword" />
                           <input type="password" name="password"  class="form-control" autocomplete="new-password"/>
                        </div>
                     </div>
                        <!-- end Password filed -->  
                     <!-- start Email filed -->
                     <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-10 col-md-2">
                           <input type="Email" name="email" value="preEmail" class="form-control" required="required" />
                        </div>
                     </div>
                        <!-- end Email filed -->
                     <!-- start FullName filed -->
                     <div class="form-group form-group-lg">
                           <label class="col-sm-2 control-label">Full Name</label>
                           <div class="col-sm-10 col-md-2">
                           <input type="text" name="fullName" value="preFullName" class="form-control" required="required" />
                        </div>
                     </div>
                        <!-- end FullName filed -->  
                     <!-- start submit filed -->
                     <div class="form-group form-group-lg">
                           <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit" vlaue="Save" class="btn btn-primary btn-lg"/>
                        </div>
                     </div>
                        <!-- end submit filed -->             
        
              ';
             // str_replace($data,'sss','preUsername');
             $data =  str_replace("preUsername",$row['UserName'],$data);
             $data =  str_replace("preEmail",$row['Email'],$data);
             $data =  str_replace("preFullName",$row['FullName'],$data);
             $data =  str_replace("prePassword",$row['Password'],$data);
             $data =  str_replace("preuserid",$userid,$data);
               
            

              echo $data;
                  }else{
                     echo 'there is no such user ';
                  }
       //  ==============UPDATE=========================UPDATE==============UPDATE=============================================
      }elseif($do == update){
               
               if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  echo'<h1 class="text-center">update member</h1>';
                  echo '<div class="continer">';

                  // get variables from the form

                  $id      = $_POST['userid'];
                  $user    = $_POST['username'];
                  $email   = $_POST['email'];
                  $full    = $_POST['fullName'];
                  $pass    = '';
                  // to update the password with the old one if there is no new one 
                  $pass = empty($_POST['password']) ? $_POST['oldpassword'] : sha1($_POST['password']);
                  // validate the form 
                  $formErrors = array();
               
                  if(empty($user))
                     $formErrors[] = 'UserName can\'t be empty ';
                  if(empty($email))
                     $formErrors[] = 'Email can\'t be empty ';
                  if(empty($full))
                     $formErrors[] = 'FullName can\'t be empty ';
                  foreach($formErrors as $errors){
                     echo "<div class='alert alert-danger'>";
                     echo $errors . '<br/>';
                     echo "</div>";
                  }
                     
                  
                  if(empty($formErrors)){
               //  update the dataBase 
                  $stmt= $con->prepare(
                                          "UPDATE 
                                                users 
                                          SET 
                                                UserName = ?, Email = ?, FullName = ?, Password = ?
                                          WHERE 
                                                UserID = ?");
                  $stmt->execute(array($user, $email, $full, $pass, $id));

                  echo "<div class='alert alert-success'>". $stmt->rowCount() . " record Update </div>";
                  echo "</div>";
               }
               }else{
                  echo 'Bad idea';

               }
              

   
       
            }elseif($do == Delete){
       //  ==============DELETE=========================DELETE==============DELETE=============================================

               $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;
               $stmt = $con->prepare(" SELECT * FROM Users WHERE UserID = ? LIMIT 1");
               $stmt->execute(array($userid));
               $count =$stmt->rowCount(); 
              // print_r($row);
                 if($stmt->rowCount() > 0){ 
                  $stmt=$con->prepare("DELETE FROM users WHERE UserID = :zuser");
                  $stmt->bindParam(":zuser", $userid);
                  $stmt->execute();
                  echo "<div class='alert alert-success'>". $stmt->rowCount() . " record Deleted </div>";
                 }else{
                    echo 'There is no such user';
                 }
                 header('location: members.php');
                 exit();
            }     
        include $tpl . 'footer.php'; 
}else{
 
    header('location: index.php');
    exit();
 
}