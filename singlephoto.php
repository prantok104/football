<?php 
include('dbcon.php');
$result = $db->query("SELECT * FROM photo WHERE id = '".$_GET['id']."'");
$row = $result->fetch_array(MYSQLI_ASSOC);
include('header.php');
?>
<section class="all-news-area">
    <div class="single-photo-gallary">
        <img src="functions.php?imid=<?php echo $_GET['id'];?>" alt="" class="single-photo">
    </div>
</section>
<?php include('footer.php');?>