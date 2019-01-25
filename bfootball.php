<?php 
include('dbcon.php');
include('header.php');
$result = $db->query("SELECT * FROM news WHERE id = ANY (SELECT MAX(id) AS id FROM news)");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<section class="all-news-area">
    <div class="row">
       <?php
            $result = $db->query("SELECT * FROM news where choose = 2 ORDER BY id DESC");
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo '
                     <div class="col-md-4">
                        <div class="last-image single-post-here">
                            <a href="single.php?id='.$row['id'].'">
                                <img src="functions.php?imnid='.$row['id'].'" alt="">
                                <h4>'.$row['title'].'</h4>
                                <p>'.substr($row['content'],0,30).'</p>
                            </a>
                        </div>
                    </div>
                ';
            }
        ?>                    
    </div>
</section>
<?php include('footer.php');?>