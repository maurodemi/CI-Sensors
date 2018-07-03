
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 29/06/2018-->
<!--Time: 15:15-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Rimuovo un campione-->
        <h1 class="title">Remove sample</h1>
        <form action="<?php echo site_url('app/deleteSample/'); ?>" method="post">
            <?php
                echo "<select name=\"selectSample\">";
                foreach($data as $row) {
                    echo "<option value=\"".$row['id']."\">".$row['sensor_id']."  ,  ".$row['datetime']."  ,  ".$row['value']."</option>";
                }
                echo "</select>";
                echo "<br>";
                echo "<input class='btn' type='submit' value='Conferma'>";
            ?>
        </form>
        <br>
        <a href="<?php echo site_url('app/readSensors'); ?>"><button class="btn">Sensors</button></a>
    </div>

    <footer> <!--Footer-->
        <p></p>
    </footer>

<!--footer.php-->
