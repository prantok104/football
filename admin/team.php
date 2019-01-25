<?php 
include('dbcon.php');

$error ='';
if(isset($_POST['team-btn'])){
    $name = $_POST['team'];
    if(empty($name)){
        $error = 'Team Name Required';
    }else{
        $check = $db->query("SELECT *  FROM team WHERE name = '".$name."'");
        $row = $check->num_rows;
        if($row>0){
            $error = 'Already Exist';
        }else{
            $result = $db->query("INSERT INTO team(`name`) VALUES('".$name."')");
            if($result){
                $location = 'location:redirect.php?a=t';
                header($location);
            }
        }
    }
}

if(isset($_POST['team-up-btn'])){
    $name = $_POST['team'];
    if(empty($name)){
        $error = 'Team Name Required';
    }else{
        $check = $db->query("SELECT *  FROM team WHERE name = '".$name."'");
        $row = $check->num_rows;
        if($row>0){
            $error = 'Already Exist';
        }else{
            $result = $db->query("UPDATE team SET name= '".$name."' WHERE id = '".$_GET['tuid']."'");
            if($result){
                $location = 'location:redirect.php?a=tu&tuid='.$_GET['tuid'];
                header($location);
            }
        }
    }
}






include('header.php');
?>
<div class="row">
    <div class="news-area-start">
        <div class="col-md-6">
            <div class="news-img">
                <img src="assets/img/clock.jpg" alt="news-img">
            </div>
        </div>
        <div class="col-md-6">
            <div class="match-post">
                <div class="match-title">
                    <?php
                        if($_GET['a'] == 't'){
                            echo '<h2>Team Insert</h2>';
                        }elseif($_GET['a'] == 'tu'){
                            echo '<h2>Team Update</h2>';
                        }elseif($_GET['a'] == 'tv'){
                            echo '<h2>Team Views</h2>';
                        }
                    ?>
                    <?php
                        if($_GET['a'] == 't'){
                            echo '
                                <form action="" method="POST">
                                <label for="team">Team Name Here</label>
                                <input type="text" name="team" id="team" placeholder="Team Name" class="form-control">
                                <p class="text-danger">'.$error.'</p>
                                <button type="submit" class="btn btn-primary" name="team-btn"><i class="fa fa-rocket"></i> Click Here</button>
                                </form>';
                            }elseif($_GET['a'] == 'tu'){
                                if(isset($_GET['tuid'])){
                                    $result = $db->query("SELECT * FROM team WHERE id = '".$_GET['tuid']."'");
                                    $row = $result->fetch_array(MYSQLI_ASSOC);
                                }
                            
                            
                            
                            
                            
                                echo '
                                <form action="" method="POST">
                                <label for="team">Team Name Here</label>
                                <input type="text" name="team" id="team" placeholder="Team Name" class="form-control" value="'.$row['name'].'">
                                <p class="text-danger">'.$error.'</p>
                                <button type="submit" class="btn btn-primary" name="team-up-btn"><i class="fa fa-pencil"></i> Update</button>
                                </form>';
                            }elseif($_GET['a'] == 'tv'){
                                echo '
                                    <table class="table table-responsive table-hover table-striped">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Team Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';?>
                                            
                                        <?php
                                            $result = $db->query("SELECT * FROM team ORDER BY id DESC");
                                            $count = 1;
                                            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                                echo '
                                                 <tr>
                                                    <td>'.$count++.'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>
                                                        <a href="team.php?a=tu&tuid='.$row['id'].'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                                                        <a href="functions.php?a=tv&tid='.$row['id'].'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                                    </td>
                                                    </tr>
                                                    ';
                                            }
                                    echo '
                                        </tbody>
                                    </table>';

                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>