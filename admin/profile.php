<?php include "includes/admin_header.php";?>

<?php 
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    
    $select_user_profile_query = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array( $select_user_profile_query)){
        
                       $user_id = $row['user_id'];
                       $username = $row['username'];
                       $user_password = $row['user_password'];
                       $user_firstname = $row['user_firstname'];
                       $user_lastname = $row['user_lastname'];
                       $user_email = $row['user_email'];
                       
                        $user_role = $row['user_role'];
    }
    
}

?>
  
<?php 
 if(isset($_POST['edit_profile'])){
      
      global $connection;
                       
                        $username = $_POST['username'];
                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
//                        $user_image = $_FILES['image']['name'];
//                        $usert_image_temp = $_FILES['image']['tmp_name'];
                        $user_email = $_POST['user_email'];
                        $user_role = $_POST['user_role'];
                        $user_password = $_POST['user_password'];
                        

      
//                       move_uploaded_file($user_image_temp,"../images/$user_image");
                               
                        
      
                        $query = "UPDATE users SET ";
                        $query .= "username = '{$username}', ";
                        $query .= "user_lastname = '{$user_lastname}', ";
                        $query .= "user_email = '{$user_email}', ";
                        $query .= "user_role = '{$user_role}', ";
                        $query .= "user_password = '{$user_password}' ";
                        $query .= "WHERE username = '{$username}' ";
                        
                 $update_user = mysqli_query($connection, $query);
    
                  confirm($update_user);
                 header("Location: profile.php");
                                        
      
      
      
      
  
  }

               
?>
   
   
   
    <div id="wrapper">
       
        
    
        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        
                        

<form action="" method="post" enctype="multipart/form-data">

    
<div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" value="<?php echo $user_lastname ?>" class="form-control" name="user_lastname">
    </div>
    
<!--
     <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
-->
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
    </div>
     <div class="form-group">
        <label for="title">Email</label>
        <input type="text" value="<?php echo $user_email ?>" class="form-control" name="user_email">
    </div>
     <div class="form-group">
        <label for="title">Password</label>
         <input type="password" value="<?php echo $user_password ?>" class="form-control" name="user_password">
    </div>
    <div class="form-group">
       <select  name="user_role" id="">
         <option value="subscriber"><?php echo $user_role; ?></option>
         <?php
           if($user_role == 'admin'){
               echo "<option value='subscriber'>subcriber</option>";
           } else {
                echo "<option value='admin'>admin</option>";
           }
           
           ?>
         
        
           
          
       </select>
    </div>
     <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_profile" value="Update Profile">
    </div>
</form>


                     
                 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/admin_footer.php";?>
     
     
          
                           