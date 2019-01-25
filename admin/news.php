<?php 
include('dbcon.php');
$error = $imger ='';
if(isset($_POST['news-btn'])){
    $imageName = $_FILES['photo']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['photo']['tmp_name']));
    $imageType = $_FILES['photo']['type'];
    $pname = $_POST['title'];
    $content = $_POST['content'];
    $choose = $_POST['choose'];
            if(empty($pname) || empty($content) || empty($choose)){
                $error = 'Somthing is Missing';
            } else{
            if(substr($imageType,0,5) == 'image'){
                $sql ="INSERT INTO `news`(`image`, `imagetype`, `title`, `content`, `choose`) VALUES ('$imageData','$imageType','$pname','$content','$choose')";
                $result = $db->query($sql);
                if($result){
                    $location = 'location:redirect.php?a=n';
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
                    <form action="" method="POST"  enctype="multipart/form-data">
                       <label for="image"> <img src="assets/img/news.jpg" alt="" >
                       Image</label>
                        <input type="file" name="photo" id="image">
                        <p class="text-danger"><?php echo $imger;?></p>
                        
                        <input type="text" name="title" placeholder="Title" autocomplete="off" class='form-control'>
                        <p class="text-danger"><?php echo $error;?></p>
                        
                        <select name="choose" id="choose" class="form-control" style="margin-bottom:15px">
                            <option value="1">Cricket</option>
                            <option value="2">Bangladesh Football</option>
                            <option value="3">others Sports</option>
                        </select>

                        <textarea name="content" id="" cols="30" rows="10" placeholder="Content" class="form-control"></textarea>
                        <p class="text-danger"><?php echo $error;?></p>
                        
                        <button type="submit" class="btn btn-primary" name="news-btn"><i class="fa fa-rocket"></i> Click Here</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>