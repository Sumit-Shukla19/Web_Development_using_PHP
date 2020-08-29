<?php include"includes/header.php";?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include"includes/nav.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                           
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query="SELECT * FROM POST";
                        $select_all_post=mysqli_query($connection,$query);
                        $post_count=mysqli_num_rows($select_all_post);
                        echo  "<div class='huge'>$post_count</div>";
                        ?>
                 
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                         $query="SELECT * FROM comments";
                         $select_all_comment=mysqli_query($connection,$query);
                         $comment_count=mysqli_num_rows($select_all_comment);
                         echo  "<div class='huge'>$comment_count</div>";
                        
                        
                        ?>
                    
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                         $query="SELECT * FROM users";
                         $select_all_user=mysqli_query($connection,$query);
                         $user_count=mysqli_num_rows($select_all_user);
                         echo  "<div class='huge'>$user_count</div>";
                        
                        
                        ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="./users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                         $query="SELECT * FROM categories";
                         $select_all_category=mysqli_query($connection,$query);
                         $category_count=mysqli_num_rows($select_all_category);
                         echo  "<div class='huge'>$category_count</div>";
                        
                        
                        ?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="./categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
<?php
$query="SELECT * FROM post WHERE post_status='published'";
$select_all_pub_post=mysqli_query($connection,$query);
$post_pub_count=mysqli_num_rows($select_all_pub_post);

 $query="SELECT * FROM post WHERE post_status='draft'";
 $select_all_draft_post=mysqli_query($connection,$query);
 $post_draft_count=mysqli_num_rows($select_all_draft_post);

 $query="SELECT * FROM comments WHERE comment_status='Unapproved'";
 $select_all_unap_c=mysqli_query($connection,$query);
 $comment_unap_count=mysqli_num_rows($select_all_unap_c);

 $query="SELECT * FROM users WHERE user_role='subscriber'";
 $select_all_sub_u=mysqli_query($connection,$query);
 $user_sub_count=mysqli_num_rows($select_all_sub_u);






?>



            <div class=row>
            <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count',],
            <?php 
            $element_text=['All post', 'Active Post', 'Draft Posts', 'Comments', 'Unapprove Comments', 'Users', 'Subscribed User', 'Categories'];
            $element_count=[ $post_count, $post_pub_count,$post_draft_count, $comment_count, $comment_unap_count, $user_count,$user_sub_count, $category_count];
            for($i=0; $i < 8; $i++){
                echo "['{$element_text[$i]}'" . "," .  "'{$element_count[$i]}'],";
            }
            
            
            ?>

        //   ['Post', 1000],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


            </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/footer.php";?>