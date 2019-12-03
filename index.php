<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<h1>Weather forecast app</h1>

<form action="" method="post">
    City <input type="text" name="input" id="input"><br>
</form> 

<?php

if (isset($_POST["input"])) { ?>

    <h2>The Weather forecast for <?php echo $_POST["input"] ?></h2>
    <div id="parent">

<?php
    $forecast = "http://api.openweathermap.org/data/2.5/forecast?q=" . $_POST["input"] . "&units=metric&APPID=c2fff92c5a7f07260586d677cc8a10eb";
        $json = file_get_contents($forecast);
        $jsondata = json_decode($json);
        $list = $jsondata->list;

    for( $i = 0; $i < count($list); $i+=8){ ?>
    <div class="card">
    <?php
    $date = $list[$i]->dt;
    $temp = $list[$i]->main->temp;
    $wind = $list[$i]->wind->speed;
    $weather = $list[$i]->weather[0]->description;
    ?>
    <p style="font-weight: bold">Date: <?php echo(date("d-m",$date)); ?></p> 
    <p>Temp: <?php echo($temp); ?>°C</p>  
    <p>Wind: <?php echo($wind); ?> km/h</p> 
    <p><?php echo($weather); ?></p>  
    </div>
<?php } }?>
</div>
</body>
</html>