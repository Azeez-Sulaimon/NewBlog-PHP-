<?php

  if(isset($_POST['create_post'])){
      
      global $connection;
                        $post_title = $_POST['title'];
                        $post_author = $_POST['author'];
                        $post_category_id = $_POST['post_category'];
                        $post_status = $_POST['post_status'];
                        $post_image = $_FILES['image']['name'];
                        $post_image_temp = $_FILES['image']['tmp_name'];
                        $post_tags = $_POST['post_tags'];
                        $post_content = $_POST['post_content'];
                        $post_date = date('d-m-y');

      
                       move_uploaded_file($post_image_temp,"../images/$post_image");
      
      
                                
                         $query = "INSERT INTO posts (post_title, post_category_id, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                         $query .= "VALUE('{$post_title}',{$post_category_id},'{$post_author}', now(),'{$post_image}', '{$post_content}', '{$post_tags}','{$post_status}')";



                         $create_post_query = mysqli_query($connection, $query); 

                         confirm($create_post_query);

                        
                       
  
  }

                                
                             
      
?>

   
   

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
 <div> <label for="title">Post Category</label></div>
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
<!--
    <div class="form-group">
        <label for="title">Post Category</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
-->
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div>
        <label for="title">Post Status</label>
    </div>
     <div class="form-group">
       
       <select name="post_status" id="post_status">
       
         <option>Draft</option>
        <option>Published</option>
        
           
       </select>
    </div>
<!--
     <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
-->
     <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
     <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
     <div class="form-group">
        <label for="title">Post content</label>
         <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
    </div>
     <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>






                    