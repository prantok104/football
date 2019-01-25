<?php 
include('dbcon.php');
include('header.php');
$result = $db->query("SELECT * FROM news WHERE id = ANY (SELECT MAX(id) AS id FROM news)");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<div class="tem-news-area">
    <div class="row">
        <div class="col-md-8">
            <div class="last-image">
                <a href="single.php?id=<?php echo $row['id'];?>">
                    <img src="functions.php?imnid=<?php echo $row['id'];?>" alt="">
                    <h4><?php echo $row['title'];?></h4>
                    <p><?php echo substr($row['content'],0,50);?></p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
           <div class="another-news">
              <?php
               $ranresult = $db->query("SELECT * FROM  news ORDER BY RAND() LIMIT 1");
               $ranrow = $ranresult->fetch_array(MYSQLI_ASSOC);
               echo '
                    <a href="single.php?id='.$ranrow['id'].'">
                       <img src="functions.php?imnid='.$ranrow['id'].'" alt="">
                       <h4>'.$ranrow['title'].'</h4>
                       <p>'.substr($ranrow['content'],0,30).'</p>
                   </a>
               ';
               ?>
           </div> 
        </div>
    </div>
</div>
<section class="all-news-area">
    <div class="row">
       <?php
            $result = $db->query("SELECT * FROM news ORDER BY id DESC");
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