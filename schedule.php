<?php include('header.php');?>
<section class="all-news-area">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="match-schedule">
               <h1 class="text-uppercase ">match Schedule</h1>
                <table class="table">
                    <thead class="bg-primary">
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
    </div>
</section>
<?php include('footer.php');?>