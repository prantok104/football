<?php 
include('header.php');
$result = $db->query("SELECT * FROM news WHERE id = ANY (SELECT MAX(id) AS id FROM news)");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-md-8">
        <div class="latest-news">
            <a href="single.php?id=<?php echo $row['id'];?>">
                <img src="functions.php?imnid=<?php echo $row['id'];?>" alt="">
                <div class="post-title">
                    <div class="post-iopacity">
                        <h4><?php echo $row['title'];?></h4>
                        <p><?php echo substr($row['content'],0,50)?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="recent-news">
            <ul class="recent-post">
                <?php
                    for($i = 1 ; $i <= 4 ; $i++){
                        $sql = $db->query("select max(id) as id from news");
                        $srow = $sql->fetch_array(MYSQLI_ASSOC);
                        $rand = rand(3,$srow['id']);
                        $result = $db->query("SELECT * FROM news WHERE id ='".$rand."'");
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '
                            <li>
                                <a href="single.php?id='.$row['id'].'">
                                    <span class="wth-40">
                                        <img src="functions.php?imnid='.$row['id'].'" alt="">
                                    </span>
                                    <span class="wth-60">
                                        <b>'.substr($row['title'],0,20).'</b>
                                        <span>Details</span>
                                    </span>
                                </a>
                            </li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<section class="news-area-start">
    <div class="row">
       <?php
            $result = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT 12");
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo '
                     <div class="col-md-4">
                        <div class="single-post">
                                <img src="functions.php?imnid='.$row['id'].'" alt="">
                                <h5>'.$row['title'].'</h5>
                                <a href="single.php?id='.$row['id'].'">Read More</a>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</section>
<section class="image-area">
    <div class="row">
        <div class="image-area-start">
           <?php
                $result = $db->query("SELECT * FROM photo ORDER BY id DESC LIMIT 4");
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '
                    <a href="singlephoto.php?id='.$row['id'].'">
                        <div class="col-md-3">
                            <div class="single-image">
                                <img src="functions.php?imid='.$row['id'].'" alt="">
                            </div>
                        </div>
                    </a>
                    ';
                }
            ?>
        </div>
    </div>
</section>
<?php include('footer.php');?>