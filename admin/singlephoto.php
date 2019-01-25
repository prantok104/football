<?php 
include('dbcon.php');
include('header.php');
?>
<div class="row">
    <div class="news-area-start">
        <?php
            $result = $db->query('SELECT * FROM photo ORDER BY id DESC');
            $count=1;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo '
                    <div class="col-md-3">
                        <div class="single-photo-image">
                            <img src="functions.php?imid='.$row['id'].'" alt="">
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</div>
<?php include('footer.php');?>