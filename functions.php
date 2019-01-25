<?php
include('dbcon.php');
//Post Image Output
if(isset($_GET['imid'])){
    $id = $_GET['imid'];
    $sql = "SELECT * FROM photo WHERE id ='".$id."'";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $imageData = $row['image'];
        $imageType= $row['imagetype'];
    }
    header('content-type: image/"'.$imageType.'"');
    echo $imageData;
}
//Post Image Output for News
if(isset($_GET['imnid'])){
    $id = $_GET['imnid'];
    $sql = "SELECT * FROM news WHERE id ='".$id."'";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $imageData = $row['image'];
        $imageType= $row['imagetype'];
    }
    header('content-type: image/"'.$imageType.'"');
    echo $imageData;
}