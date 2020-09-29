<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Wk 3, Grp 4</title>
        <meta name="description" content="Week 3 team assignment">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <p>Name: <?php echo $_POST["name"]; ?></p>
    <p>Email: <?php echo $_POST["email"]; ?></p>
    <p>Major: <?php echo $_POST["major"]; ?></p>
    <p>Comments: <?php echo $_POST["comments"]; ?></p>
    <p>Continent: <?php

        $continents = $_POST["continents"];
        $count = count($continents);
        $codenames = ['na', 'sa', 'eu', 'as', 'au', 'af','an'];
       
        for ($i = 0 ; $i<count($codenames); $i++){
            $map = array_map($codenames[$i],$continents[$i]);
            echo($map[$i]);
        }
        // foreach ($map as $m ){
        //     echo($m);
        // }
        for ($i = 0; $i < $count ; $i++){
            echo($continents[$i]." " );
            
        }

    ?>
        <script src="" async defer></script>
    </body>
</html>






