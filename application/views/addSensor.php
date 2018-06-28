
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 19/06/2018-->
<!--Time: 17:02-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--header.php-->

    <header> <!--Header-->
        <h1></h1>
    </header>

    <div class="login"> <!--Aggiungo un sensore-->
        <h1 class="title">Add sensor</h1>
        <form action="<?php echo site_url('app/createSensor'); ?>" method="post">
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
