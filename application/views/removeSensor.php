
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 20/06/2018-->
<!--Time: 17:10-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Rimuovo un sensore-->
        <h1 class="title">Remove sensor</h1>
        <form action="<?php echo site_url('app/deleteSensor'); ?>" method="post">
            <?php
                echo "<select name=\"selectSensor\">";
                foreach($data as $row) {
                    echo "<option value=\"".$row['id']."\">".$row['code']."  -  ".$row['location']."  -  ".$row['active']."</option>";
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
