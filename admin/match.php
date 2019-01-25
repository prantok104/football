<?php 
include('dbcon.php');
$error = $same =  '';
if(isset($_POST['sche-btn'])){
    $date = $_POST['date'];
    $time = $_POST['time'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $getTime = substr($time,0,2);
    if($getTime>=12){
        $time = $time.' PM';
    }else{
        $time  = $time.' AM';
    }
    if(empty($date) || empty($time) || empty($team1) || empty($team2)){
        $error = 'Required';
    }else{
        if($team1 == $team2){
            $same = 'Team1 or Team2 is Different';
        }else{
            $team = $team1.' VS '.$team2;
            $date = $date.' '.$time;
            $result = $db->query("INSERT INTO schedule(team,sdate) VALUES('".$team."','".$date."')");
            if($result){
                $location = 'location:redirect.php?a=m';
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
                    <h2>News Post</h2>
                    <form action="" method="POST"  enctype="multipart/form-data">
                       <label for="da">Date Here</label>
                       <input type="date" name="date" id="da" placeholder="Date Here" class="form-control">
                       <p class="text-danger"><?php echo $error;?></p>
                       
                       <label for="ti">Time Here</label>
                       <input type="time" name="time" id="ta" placeholder="Time Here" class="form-control">
                        <p class="text-danger"><?php echo $error;?></p>
                        
                       <label for="team1">First Team Here</label>
                        <select name="team1" id="team1" class="form-control">
                            <option value="">Select the Team </option>
                            <?php
                                $result = $db->query("select * from team");
                                foreach($result as $key=>$value){
                                    echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                }
                            ?>
                       </select>
                        <p class="text-danger"><?php echo $error;?></p>
                        <p class="text-danger"><?php echo $same;?></p>
                       
                       
                       <label for="team2">Second Team Here</label>
                        <select name="team2" id="team2" class="form-control">
                            <option value="">Select the Team </option>
                            <?php
                                $result = $db->query("select * from team");
                                foreach($result as $key=>$value){
                                    echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                        <p class="text-danger"><?php echo $error;?></p>
                        <p class="text-danger"><?php echo $same;?></p>
                        <button type="submit" class="btn btn-primary" name="sche-btn"><i class="fa fa-rocket"></i> Click Here</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>