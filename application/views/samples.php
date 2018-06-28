
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

    <div> <!--Samples-->
        <h1 class="title">Samples</h1>
        <a href="<?php echo site_url(''); ?>"><button class="btn">Create sample</button></a>
        <a href="<?php echo site_url(''); ?>"><button class="btn">Update sample</button></a>
        <a href="<?php echo site_url(''); ?>"><button class="btn">Delete sample</button></a>
    </div>
    <div>
        <?php
        echo('<table class="tableSamples">');
        echo('<tr>');
        echo('<th>'.'#'.'</th>');
        echo('<th>'.'Sensor_id'.'</th>');
        echo('<th>'.'Datetime'.'</th>');
        echo('<th>'.'Value'.'</th>');
        echo('</tr>');

        //trasforma un array di array in una tabella
        foreach($data as $row) {
            //ogni elemento dell'array è un array a sua volta, per la precisione una riga della tabella
            echo('<tr>');
                echo('<td>'.'<b>'.' • '.'</b>'.'</td>');
                echo('<td>'.$row['sensor_id'].'</td>');
                echo('<td>'.$row['datetime'].'</td>');
                echo('<td>'.$row['value'].'</td>');
            echo('</tr>');
        }
        echo('</table>');
        ?>
    </div>
    <br>
    <a href="<?php echo site_url('app/readSensors'); ?>"><button class="btn">Sensors</button></a>

    <footer> <!--Footer-->
        <p></p>
    </footer>

<!--footer.php-->

