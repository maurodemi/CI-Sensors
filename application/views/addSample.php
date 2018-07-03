
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 29/06/2018-->
<!--Time: 09:11-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Aggiungo un campione-->
        <h1 class="title">Add sample</h1>
        <form action="<?php echo site_url('app/createSample/'.$id.'/'.$code); ?>" method="post">
            <table>
                <tr>
                    <label for="">Add sample to the sensor: </label>
                    <?php echo($code); ?>
                    <br><br>
                </tr>
                <tr>
                    <td><label for="datetime">Datetime:</label></td>
<!--                    <td><input type="text" name="datetime" placeholder="" required> <br></td>-->
                    <td><input type="datetime-local" name="datetime" required> </input></td>
<!--                    <td><time datetime=""></time></td>-->
                </tr>
                <tr>
                    <td><label for="number">Value:</label></td>
<!--                    <td><input type="text" name="value" placeholder="" required> <br></td>-->
                    <td><input type="number" name="number" step="0.1" required> <br></td>

                </tr>
                <tr>
                    <td><input class="btn" type="submit" value="Conferma"></td>
                </tr>
            </table>
        </form>
        <br>
        <a href="<?php echo site_url('app/readSensors'); ?>"><button class="btn">Sensors</button></a>
    </div>

    <footer> <!--Footer-->
        <p></p>
    </footer>

<!--footer.php-->
