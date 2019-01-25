<?php 
include('dbcon.php');
$sngresult = $db->query("SELECT * FROM news WHERE id = '".$_GET['id']."'");
$sngrow = $sngresult->fetch_array(MYSQLI_ASSOC);
include('header.php');
?>
<section class="all-news-area">
    <div class="single-photo-gallary">
        <img src="functions.php?imnid=<?php echo $_GET['id'];?>" alt="" class="single-photo">
        <div class="single-news-content">
            <h4><?php echo $sngrow['title'];?></h4>
            <p><?php echo $sngrow['content'];?></p>
        </div>
    </div>
</section>
<?php include('footer.php');?>