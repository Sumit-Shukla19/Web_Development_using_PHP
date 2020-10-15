<?php
if(isset($_POST['checkBoxArray'])){
    
        foreach($_POST['checkBoxArray'] as $checkBoxid){

               $bulk_options=$_POST['bulk_options'];
                switch($bulk_options){
                    case 'published':
                    $query="UPDATE post SET post_status='{$bulk_options}' WHERE post_id={$checkBoxid}";
                    $update=mysqli_query($connection,$query);
                    confirmquery($update);
                    break;
                    case 'draft':
                        $query="UPDATE post SET post_status='{$bulk_options}' WHERE post_id={$checkBoxid}";
                        $update=mysqli_query($connection,$query);
                        confirmquery($update);
                        break;
                        case 'delete':
                            $query="DELETE FROM post WHERE post_id={$checkBoxid}";
                            $update=mysqli_query($connection,$query);
                            confirmquery($update);
                            break;
                            case 'clone':
            $query = "SELECT * FROM post WHERE post_id = '{$checkBoxid}' ";
            $select_post_query = mysqli_query($connection, $query);


          
            while ($row = mysqli_fetch_array($select_post_query)) {
            $post_title         = $row['post_title'];
            $post_category_id   = $row['post_category_id'];
            $post_date          = $row['post_date']; 
            $post_author        = $row['post_author'];
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'] ; 
            $post_tags          = $row['post_tags']; 
            $post_content       = $row['post_content'];

          }

                 
      $query = "INSERT INTO post(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 

                $copy_query = mysqli_query($connection, $query);   

               if(!$copy_query ) {

                die("QUERY FAILED" . mysqli_error($connection));
               }   
                 
                 break;
                }
        }
        
    
    
}


?>
<form action="" method='post'>
<table class="table table-bordered table-hover">
<div id="bulkOptionContainer" class="col-xs-4">
<select class="form-control" id="" name="bulk_options">
    <option value="">Select options</option>
    <option value="published">published</option>
    <option value="draft">draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
</select>


</div>
<div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="post.php?source=add post">Add New</a>
</div>

         <thead>
             <tr>
                 <th><input type="checkbox" id="selectAllBoxes" ></th>
                 <th>Id</th>
                 <th>Author</th>
                 <th>Title</th>
                 <th>Category</th>
                 <th>Status</th>
                 <th>Image</th>
                 <th>Tags</th>
                 <th>Comments</th>
                 <th>Date</th>
                 <th>View post</th>
                 <th>Edit</th>
                 <th>Delete</th>


             </tr>
         </thead>
         <tbody>
             
          <?php 
           $query= "SELECT * FROM post ORDER BY post_id DESC" ;
           $select_post = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_post))
         {
       
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
        ?>
        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id;?>'></td>
        <?php
        echo "<td> $post_id </td>";
        echo "<td> $post_author</td>";
        echo "<td> $post_title</td>";
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        
        
        echo "<td>$cat_title</td>";
    }         



        // echo "<td>$post_category_id</td>";

        




        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
        echo "<td> $post_tags</td>";
        echo "<td>$post_comment</td>";
        echo "<td>$post_date</td>";
        echo "<td><a href ='../post.php?p_id=$post_id'>View post</a></td>";
        echo "<td><a href ='post.php?source=edit post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete'); \" href ='post.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";

         }
          ?> 
         </tbody>
     </table>
     
</form>
     <?php 
     if(isset($_GET['delete'])){
            $the_post_id=$_GET['delete'];
     $query="DELETE FROM post WHERE post_id={$the_post_id} ";
     $del_query=mysqli_query($connection,$query);
     header("location: post.php");
        }
     ?>