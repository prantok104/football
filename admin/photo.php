<?php 
include('dbcon.php');
$imger = $suc ='';
if(isset($_POST['pto-btn'])){
    $imageName = $_FILES['photo']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['photo']['tmp_name']));
    $imageType = $_FILES['photo']['type'];
    if(substr($imageType,0,5) == 'image'){
        $sql ="INSERT INTO `photo`(`image`, `imagetype`) VALUES ('$imageData','$imageType')";
        $result = $db->query($sql);
        if($result){
            $suc = 'Insert Successfuly Completed';
            $location = 'location:redirect.php?a=p';
            header($location);
        }
    }else{
        $imger = 'Please use as image';
    }
}
include('header.php');

?>
<div class="row">
    <div class="news-area-start">
        <div class="col-md-6">
            <div class="news-img">
                <img src="assets/img/bg.jpg" alt="news-img">
            </div>
        </div>
        <div class="col-md-6">
            <div class="news-post">
                <div class="news-title">
                    <h2>Photo Post</h2>
                    <form action="" method="POST"  enctype="multipart/form-data">
                       <?php
                        $result = $db->query("SELECT * FROM photo WHERE id  = ANY (SELECT MAX(id) FROM photo)");
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        ?>
                        <label for="image" class="photo-img"> <img src="functions.php?imid=<?php echo $row['id'];?>" alt="" >
                            Image</label>
                        <input type="file" name="photo" id="image">
                        <p class="text-danger"><?php echo $imger;?></p>
                        <button type="submit" class="btn btn-primary" name="pto-btn"><i class="fa fa-rocket"></i> Click Here</button>
                        <p class="text-success"><?php echo $suc;?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>