<?php
    include('dbcon.php');
?>
   <html xmlns="h">
    <head>
        <title>Sports Live Score</title>
        <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
    <header class="header-area-start">
        <div class="container">
            <div class="row">
                <div class="header-area text-center">
                        <img src="img/logo.jpg" alt="">
                </div>
            </div>
        </div>
    </header>
    <nav class="main-menu text-center">
        <ul class="menu-area">
            <li><a href="index.php">home</a></li>
            <li><a href="news.php">News & evemts</a></li>
            <li><a href="photo.php">photo gallery</a></li>
            <li><a href="schedule.php">schedules</a></li>
        </ul>
    </nav>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="aside-area">
                        <div class="aside-nav">
                            <ul class="aside-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="news.php">News & Events</a></li>
                                <li><a href="cricket.php">Cricket</a></li>
                                <li><a href="bfootball.php">Bangladesh Football</a></li>
                                <li><a href="othersport.php">Others Sports</a></li>
                            </ul>
                        </div> <!--Aside Nav end-->
                        <div class="recent-post-here">
                           <h4>Match Schedule</h4>
                            <ul class="match-sche">
                                <?php
                                $result = $db->query('SELECT * FROM schedule ORDER BY id DESC LIMIT 3');
                                $count=1;
                                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                    echo '
                                    <li>
                                       <b>'.substr($row['sdate'],11,16).'</b> <br>
                                       <b>'.substr($row['sdate'],0,10).'</b> <br>
                                        <h5>'.$row['team'].'</h5>
                                    </li>
                                ';
                                }?>
                            </ul>
                        </div>
                        <div class="aside-photo">
                            <div class="row">
                               <?php
                                    for($i = 1 ; $i <= 6 ; $i++){
                                        $sql = $db->query("select max(id) as id from photo");
                                        $srow = $sql->fetch_array(MYSQLI_ASSOC);
                                        $rand = rand(3,$srow['id']);
                                        $result = $db->query("SELECT * FROM photo WHERE id ='".$rand."'");
                                        $row = $result->fetch_array(MYSQLI_ASSOC);
                                            echo '
                                                <div class="col-md-4">
                                                    <div class="single-photo">
                                                        <a href="singlephoto.php?id='.$row['id'].'"> <img src="functions.php?imid='.$row['id'].'" alt=""></a>
                                                    </div>
                                                </div>
                                            ';
                                    }
                                ?>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="tem-content">
                        
