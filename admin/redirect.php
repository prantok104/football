<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirect</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="redirect-body">
    <?php
    if($_GET['a'] == 'n'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=news.php");
    }
    else if($_GET['a'] == 'p'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=photo.php");
    }
    else if($_GET['a'] == 'pd'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=photoview.php");
    }else if($_GET['a'] == 'nd'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=view.php?a=n");
    }else if($_GET['a'] == 'ne'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        $location = "Refresh:2; url=editnews.php?neid=".$_GET['neid'];
        header($location);
    }else if($_GET['a'] == 't'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=team.php?a=t");
    }else if($_GET['a'] == 'tu'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        $location = "Refresh:2; url=team.php?a=tu&tuid=".$_GET['tuid'];
        header($location);
    }else if($_GET['a'] == 'tv'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        $location = "Refresh:2; url=team.php?a=tv";
        header($location);
    }else if($_GET['a'] == 'm'){
        echo '
          <center>
               <img src="assets/img/redirect.gif" alt="">
           </center>
        ';
        header("Refresh:2; url=match.php");
    }
    
    ?>
</body>
</html>