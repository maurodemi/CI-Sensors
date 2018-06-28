
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 25/06/2018-->
<!--Time: 11:28-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Aggiorno un sensore-->
        <h1 class="title">Update sensor</h1>
        <form action="<?php echo site_url('app/updateSensor'); ?>" method="post">
            <label for="">Seleziona il sensore da modificare:</label>
            <br>
            <?php
                echo "<select name=\"selectSensor\">";
                foreach($data as $row) {
                    echo "<option value=\"".$row['id']."\">".$row['code']."  -  ".$row['location']."  -  ".$row['active']."</option>";
                }
                echo "</select>";
            ?>
            <br>
            <label for="">Inserisci i nuovi dati del sensore selezionato:</label>
            <table>
                <tr>
                    <td><label for="code">Code:</label></td>
                    <td><input type="text" name="code" placeholder="" required> <br></td>
                </tr>
                <tr>
                    <td><label for="location">Location:</label></td>
                    <td><input type="text" name="location" placeholder="" required> <br></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <label for="status">Active:</label>
                        <input type="radio" name="status" value="active" checked>
                        <br>
                        <label for="status">Disactive:</label>
                        <input type="radio" name="status" value="disactive">
                    </td>
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
