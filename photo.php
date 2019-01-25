<?php 
include('dbcon.php');
include('header.php');
?>
<section class="all-news-area">
    <div class="row">
       
        <?php
            $result = $db->query('SELECT * FROM photo ORDER BY id DESC');
            $count=1;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo '
                    <div class="col-md-4">
                        <div class="single-post-here">
                            <a href="singlephoto.php?id='.$row['id'].'">
                                <img src="functions.php?imid='.$row['id'].'" alt="" class="single-a-photo">
                            </a>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</section>
<?php include('footer.php');?>