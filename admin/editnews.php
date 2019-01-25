<?php 
include('dbcon.php');
$error = $imger ='';
if(isset($_POST['up-btn'])){
    $imageName = $_FILES['photo']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['photo']['tmp_name']));
    $imageType = $_FILES['photo']['type'];
    $pname = $_POST['title'];
    $content = $_POST['content'];
    if(empty($pname) || empty($content)){
        $error = 'Somthing is Missing';
    } else{
        if(substr($imageType,0,5) == 'image'){
            $id = $_GET['neid'];
            $sql ="UPDATE news SET image = '".$imageData."', imagetype = '".$imageType."', title = '".$pname."', content = '".$content."' WHERE id = '".$id."'";
            $result = $db->query($sql);
            if($result){
                $location = 'location:redirect.php?a=ne&neid='.$_GET['neid'];
                header($location);
            }
        }else{
            $imger = 'Please use as image';
        }
    }
}
include('header.php');

?>
<div class="row">
    <div class="news-area-start">
        <div class="col-md-6">
            <div class="news-img">
                <img src="assets/img/news.jpg" alt="news-img">
            </div>
        </div>
        <div class="col-md-6">
            <div class="news-post">
                <div class="news-title">
                    <h2>News Post</h2>
                    
                    <?php
                        $result = $db->query("SELECT * FROM news WHERE id = '".$_GET['neid']."'");
                        $count=1;
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                    ?>
                    
                    <form action="" method="POST"  enctype="multipart/form-data">
                        <label for="image" class="img-label"> <img src="functions.php?imnid=<?php echo $row['id'];?>"   class='photo-img' alt="" >
                            Image</label>
                        <input type="file" name="photo" id="image">
                        <p class="text-danger"><?php echo $imger;?></p>

                        <input type="text" name="title" placeholder="Title" autocomplete="off" class='form-control' value="<?php echo $row['title'];?>">
                        <p class="text-danger"><?php echo $error;?></p>

                        <textarea name="content" id="" cols="10" rows="5" placeholder="Content" class="form-control"><?php echo $row['content'];?></textarea>
                        <p class="text-danger"><?php echo $error;?></p>

                        <button type="submit" class="btn btn-primary" name="up-btn"><i class="fa fa-rocket"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>