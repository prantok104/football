<?php 
include('dbcon.php');

function getTheResult($table){
    include('dbcon.php');
    $result = $db->query("SELECT COUNT(id) AS id FROM $table");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo $row['id'];
}
include('header.php');
?>
<div class="row">
    <div class="col-md-4">
        <div class="sand-box">
            <h3>Total Number of News</h3>
            <p class="text-center text-success"><?php getTheResult('news');?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="sand-box">
            <h3>Total Number of Photos</h3>
            <p class="text-center text-success"><?php getTheResult('photo');?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="sand-box">
            <h3>Comingsoon Match</h3>
            <p class="text-center text-success">available</p>
        </div>
    </div>
</div>
<div class="ranking-schedule">
    <div class="row">
        <div class="col-md-6">
            <div class="match-schedule ranking">
                <h2>Match Schedule</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Team</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->query('SELECT * FROM schedule ORDER BY id DESC LIMIT 10');
                            $count=1;
                            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                // Current Time In Bnagladesh
//                                date_default_timezone_set('Asia/Dhaka');
//                                $times =  date("Y-m-d H:i:s").'<br>';
//                                $times = substr($times,11,13);
//                                $times = substr($times,0,5);
//                                $dates = date('Y-m-d');
//                                if($times>=12){
//                                    $times = $times.' PM';
//                                }else{
//                                    $times  = $times.' AM';
//                                }
//                                $sdate = $row['sdate'];
//                                $stime = $dates.' '.$times;
//                                echo $difresult = $db->query("SELECT DATEDIFF (second,$sdate , $stime) as sdate");

                                echo '
                                    <tr>
                                        <td>'.$count++.'</td>
                                        <td>'.$row['team'].'</td>
                                        <td>'.substr($row['sdate'],0,10).'</td>
                                        <td>'.substr($row['sdate'],11,16).'</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ranking">
                <h2>Footbal Team Ranking</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Team Name</th>
                            <th>Ranking</th>
                            <th>Voting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0</td>
                            <td>Real</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>