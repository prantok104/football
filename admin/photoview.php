<?php 
include('dbcon.php');


include('header.php');
?>
<div class="row">
    <div class="news-area-start">
        <div class="col-md-4">
            <div class="news-img">
               <h4>Photo Here</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates itaque atque delectus inventore veritatis tenetur ex. Minus, quae iusto, adipisci tenetur praesentium perspiciatis voluptate dolores, illo odit fugit ipsum deleniti? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci veniam dicta pariatur placeat alias sint quaerat voluptas, exercitationem officiis labore voluptatum cupiditate sapiente architecto expedita reprehenderit cum vel necessitatibus quam.</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="news-post">
                <div class="news-title">
                    <h2>All of the Photos here</h2>
                    <table class="table table-responsive table-hover table-stripted">
                        <thead class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>ImageType</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $result = $db->query('SELECT * FROM photo ORDER BY id DESC');
                            $count=1;
                            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                echo '
                                    <tr>
                                        <td>'.$count++.'</td>
                                        <td><img src="functions.php?imid='.$row['id'].'" alt=""></td>
                                        <td>'.$row['imagetype'].'</td>
                                        <td>
                                            <a href="functions.php?pid='.$row['id'].'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>
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