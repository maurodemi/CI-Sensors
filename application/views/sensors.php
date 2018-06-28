
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 19/06/2018-->
<!--Time: 15:03-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
        <a href="<?php echo site_url('welcome/logout'); ?>"><button class="btnLogout">Logout</button></a>
    </header>

    <div> <!--Sensors-->
        <h1 class="title">Sensors</h1>
        <a href="<?php echo site_url('app/addSensor'); ?>"><button class="btn">Create sensor</button></a>
        <a href="<?php echo site_url('app/changeSensor'); ?>"><button class="btn">Update sensor</button></a>
        <a href="<?php echo site_url('app/removeSensor'); ?>"><button class="btn">Delete sensor</button></a>
    </div>
    <div class="active">
        <?php
            echo('<table class="tableSensors">');
                echo('<tr>');
                echo('<th>'.'#'.'</th>');
                echo('<th>'.'Code'.'</th>');
                echo('<th>'.'Location'.'</th>');
                echo('<th>'.'Active'.'</th>');
                echo('<th>'.'Samples'.'</th>');
                echo('<th>'.'Status'.'</th>');
                echo('</tr>');

                //trasforma un array di array in una tabella
                foreach($data as $row) {
                    //ogni elemento dell'array è un array a sua volta, per la precisione una riga della tabella
                    if($row['active']==1) {
                        echo('<tr>');
                            echo('<td>'.'<b>'.' • '.'</b>'.'</td>');
                            echo('<td>'.$row['code'].'</td>');
                            echo('<td>'.$row['location'].'</td>');
                            echo('<td>'.$row['active'].'</td>');
                            echo('<td>');
                            echo anchor('app/readSamples','Samples',array('name'=>'abc'));
                            echo('</td>');
                            echo('<td>'.'<img src="../../resources/img/v.jpg">'.'</td>');
                        echo('</tr>');
                    }
                }
            echo('</table>');
        ?>
    </div>

    <div class="disactive">
        <?php
            echo('<table class="tableSensors">');
                echo('<tr>');
                echo('<th>'.'#'.'</th>');
                echo('<th>'.'Code'.'</th>');
                echo('<th>'.'Location'.'</th>');
                echo('<th>'.'Active'.'</th>');
                echo('<th>'.'Samples'.'</th>');
                echo('<th>'.'Status'.'</th>');
                echo('</tr>');

                //trasforma un array di array in una tabella
                foreach($data as $row) {
                    //ogni elemento dell'array è un array a sua volta, per la precisione una riga della tabella
                    if($row['active']==0) {
                        echo('<tr>');
                            echo('<td>'.'<b>'.' • '.'</b>'.'</td>');
                            echo('<td>'.$row['code'].'</td>');
                            echo('<td>'.$row['location'].'</td>');
                            echo('<td>'.$row['active'].'</td>');
                            echo('<td>');
                            echo anchor('app/readSamples','Samples');
                            echo('</td>');
                            echo('<td>'.'<img src="../../resources/img/x.jpg">'.'</td>');
                        echo('</tr>');
                    }
                }
            echo('</table>');
        ?>
    </div>

    <footer> <!--Footer-->
        <p></p>
    </footer>

<!--footer.php-->

