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
//photo Delete
if(isset($_GET['pid'])){
    $result = $db->query("DELETE FROM photo WHERE id = '".$_GET['pid']."'");
    if($result){
        header('location:redirect.php?a=pd');
    }
}
//News  Delete
if(isset($_GET['nid'])){
    $result = $db->query("DELETE FROM news WHERE id = '".$_GET['nid']."'");
    if($result){
        header('location:redirect.php?a=nd');
    }
}
//Team  Delete
if(isset($_GET['tid'])){
    $result = $db->query("DELETE FROM team WHERE id = '".$_GET['tid']."'");
    if($result){
        $location = "location:redirect.php?a=".$_GET['a'];
        header($location);
    }
}