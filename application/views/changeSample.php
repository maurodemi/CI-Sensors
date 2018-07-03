
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 02/07/2018-->
<!--Time: 15:29-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Aggiorno un campione-->
        <h1 class="title">Update sample</h1>
        <form action="<?php echo site_url('app/updateSample/'); ?>" method="post">
            <label for="">Seleziona il campione da modificare:</label>
            <br>
            <?php
                echo "<select name=\"selectSample\">";
                foreach($data as $row) {
                    echo "<option value=\"".$row['id']."\">".$row['sensor_id']."  -  ".$row['datetime']."  -  ".$row['value']."</option>";
                }
                echo "</select>";
            ?>
            <br>
            <label for="">Inserisci i nuovi dati del campione selezionato:</label>
            <table>
                <tr>
                    <td><label for="code">Sensor_id:</label></td>
                    <td>
                    <?php
                        $idold=0;
                        echo "<select name=\"selectSensor_id\">";
                        foreach($s_id as $id) {
                            if($id['id']!=$idold) {
                                echo "<option value=\"" . $id['sensor_id'] . "\">" . $id['sensor_id'] . "</option>";
                            }
                            $idold=$id['id'];
                        }
                        echo "</select>";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="datetime">Datetime:</label></td>
                    <td><input type="datetime-local" name="datetime" required> </input></td>
                </tr>
                <tr>
                    <td><label for="number">Value:</label></td>
                    <td><input type="number" name="number" step="0.1" required> <br></td>
                </tr>
            </table>
            <input class="btn" type="submit" value="Conferma">
        </form>
        <br>
        <a href="<?php echo site_url('app/readSensors'); ?>"><button class="btn">Sensors</button></a>
    </div>

    <footer> <!--Footer-->
        <p></p>
    </footer>

<!--footer.php-->
