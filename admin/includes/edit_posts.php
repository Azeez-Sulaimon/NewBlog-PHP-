<?php



    if (isset($_GET['p_id'])){
        
        $the_getpost_id = $_GET['p_id'];
        
        }
        
                     $query = "SELECT * FROM posts WHERE post_id= $the_getpost_id ";
                    $select_posts_by_id = mysqli_query($connection, $query);
                
                                
                        while($row = mysqli_fetch_assoc( $select_posts_by_id)){
                       $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                         $post_title = $row['post_title'];
                         $post_category = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tag = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                    
                        $post_content = $row['post_content'];
                        
        }

if(isset($_POST['update_post'])){
      
                        $post_author = $_POST['author'];       
                        $post_title = $_POST['post_title'];
                        $post_category_id = $_POST['post_category'];
                        $post_status = $_POST['post_status'];
                        $post_image = $_FILES['image']['name'];
                        $post_image_temp = $_FILES['image']['tmp_name'];
                        $post_tags = $_POST['post_tags'];
                        $post_content = $_POST['post_content'];
                        
    
                        move_uploaded_file($post_image_temp,"../images/$post_image");
    
                       if(empty($post_image)){
                           
                           $query = "SELECT * FROM posts WHERE post_id = $the_getpost_id ";
                           $select_image = mysqli_query($connection, $query);
                           
                        while($row = mysqli_fetch_array($select_image)){
                            
                            $post_image = $row['post_image'];
                        }
                           
                           
                       }
    
    
                        
                        $query = "UPDATE posts SET ";
                        $query .= "post_title = '{$post_title}', ";
                        $query .= "post_category_id = '{$post_category_id}', ";
                        $query .= "post_date = now(), ";
                        $query .= "post_author = '{$post_author}', ";
                        $query .= "post_status = '{$post_status}', ";
                        $query .= "post_tags = '{$post_tags}', ";
                        $query .= "post_content = '{$post_content}', ";
                        $query .= "post_image = '{$post_image}' ";
                        $query .= "WHERE post_id = ${the_getpost_id} ";
                        
                 $update_post = mysqli_query($connection, $query);
    
                  confirm($update_post);
                   echo "<p class='bg-success'>Post Updated: "."" . "Go to " ."<a href='../post.php?p_id={$post_id};'>View Post</a> Or <a href='edit_post.php';'> Edit More Posts</a</p> "; 
//                 header("Location: admin_posts.php");
                       
}

                            
?>
   
   

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title">
    </div>
   <div><label for="title">Post Category</label></div> 
    <div class="form-group">
       
       <select name="post_category" id="post_category">
           <?php 
           
                $query = "SELECT * FROM categories";
                      $select_categories = mysqli_query($connection, $query);
                      confirm($select_categories);
                    
                       while($row = mysqli_fetch_assoc( $select_categories)){
                       $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                           
                            echo "<option value='$cat_id'>$cat_title</option>";
                       }
                
           ?>
           
       </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author;?>" type="text" class="form-control" name="author">
    </div>
    <div>
        <label for="title">Post Status</label>
    </div>
    <div class="form-group">
     
    <select name="post_status" id="">
        <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
        <?php 
        
        if($post_status == "Published"){
            echo "<option>Published</option>";
        } else {
            echo "<option>Draft</option>";
        }
        
        ?>
        
    </select>
    </div>
     <div class="form-group">
       <label for="title">Post Image</label>
       <div>
       <img width="100" src="../images/<?php echo $post_image;?>" alt="image">
        </div>
        <input type="file" class="form-control" name="image" value="Upload File">
        
    </div>
     <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tag;?>" type="text" class="form-control" name="post_tags">
    </div>
     <div class="form-group">
        <label for="title">Post content</label>
        <textarea  class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content;?>
        </textarea>
    </div>
     <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
    </div>
</form>
