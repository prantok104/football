<?php 
include('dbcon.php');
include('header.php');
?>
<div class="row">
    <div class="news-area-start">
        <div class="col-md-4">
            <div class="news-img">
              <?php
                if($_GET['a'] == 'n'){
                    echo '<h4>Football News</h4>';
                }elseif($_GET['a'] == 'r'){
                    echo '<h4>Football Report</h4>';
                }
                ?>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates itaque atque delectus inventore veritatis tenetur ex. Minus, quae iusto, adipisci tenetur praesentium perspiciatis voluptate dolores, illo odit fugit ipsum deleniti? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci veniam dicta pariatur placeat alias sint quaerat voluptas, exercitationem officiis labore voluptatum cupiditate sapiente architecto expedita reprehenderit cum vel necessitatibus quam.</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="news-post">
                <div class="news-title">
                    <?php
                        if($_GET['a'] == 'n'){
                            echo '<h2>All of the News here</h2>';
                        }elseif($_GET['a'] == 'r'){
                            echo '<h2>All of the reports here</h2>';
                        }
                    ?>
                    
                    <form action="" method="POST">
                       <input type="text" name="s" id="s" placeholder="Type here" class="form-control">
                    </form>
                    <table class="table table-responsive table-hover table-stripted">
                        <thead class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = $db->query('SELECT * FROM news ORDER BY id DESC');
                                $count=1;
                                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                    echo '
                                        <tr>
                                            <td>'.$count++.'</td>
                                            <td><img src="functions.php?imnid='.$row['id'].'" alt=""></td>
                                            <td>'.$row['title'].'</td>
                                            <td>'.substr($row['content'],0,30).'..</td>
                                            <td>
                                                <a href="editnews.php?neid='.$row['id'].'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                                                <a href="functions.php?nid='.$row['id'].'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>