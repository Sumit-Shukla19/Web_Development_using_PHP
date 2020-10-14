<table class="table table-bordered table-hover">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Author</th>
                 <th>comment</th>
                 <th>email</th>
                 <th>Status</th>
                 <th>In response to</th>
                 <th>Date</th>
                 <th>Approve</th>
                 <th>Unapprove</th>
                 <th>Delete</th>
             </tr>
         </thead>
         <tbody>
          <?php 
           $query= "SELECT * FROM comments" ;
           $select_comments = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_comments))
         {
       
        $comment_id= $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author= $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
       

        echo "<tr>";
        echo "<td>  $comment_id</td>"; 
        echo "<td> $comment_author</td>";
        echo "<td>  $comment_content</td>";
    //     $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
    //     $select_categories_id = mysqli_query($connection,$query);  

    //     while($row = mysqli_fetch_assoc($select_categories_id)) {
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row['cat_title'];
        
        
    //     echo "<td>$cat_title</td>";
    // }         



        // echo "<td>$post_category_id</td>";

        




        echo "<td>$comment_email</td>";
        echo "<td>   $comment_status</td>";
        $query="SELECT * FROM post WHERE post_id=$comment_post_id";
        $select_P_I=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_P_I)){
            $post_id=$row['post_id'];
            $post_title=$row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a>  </td>";
        }

       



        echo "<td>$comment_date</td>";
        echo "<td><a href ='comments.php?Approve=$comment_id'>Approve</a></td>";
        echo "<td><a href ='comments.php?Unapprove=$comment_id'>Unapprove</a></td>";
        // echo "<td><a href ='post.php?source=edit post&p_id='>Edit</a></td>";
        echo "<td><a href ='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";

         }
          ?> 
         </tbody>
     </table>
     <?php 
      if(isset($_GET['Approve'])){
        $the_comment_id=$_GET['Approve'];
        $query="UPDATE comments SET comment_status='Approved' WHERE comment_id=$the_comment_id ";
        $app_query=mysqli_query($connection,$query);
         header("location: comments.php");
    }
      if(isset($_GET['Unapprove'])){
        $the_comment_id=$_GET['Unapprove'];
        $query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$the_comment_id ";
        $unapp_query=mysqli_query($connection,$query);
         header("location: comments.php");
    }
     if(isset($_GET['delete'])){
            $the_comment_id=$_GET['delete'];
     $query="DELETE FROM comments WHERE comment_id={$the_comment_id} ";
     $del_query=mysqli_query($connection,$query);
     header("location: comments.php");
        }
     ?>
