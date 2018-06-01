
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 29/05/2018-->
<!--Time: 12:39-->

<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

	<title>Login</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="stylesheet" href="../resources/css/style.css">-->
</head>

<body>
    <div> <!--FORM LOGIN-->
        <form action="home.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    <div> <!--LOGIN FREE-->
        <br>
        <a href="home.php"><button>Login free</button></a>
    </div>
</body>
</html>