<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>w03 prove</title>
        <meta name="description" content="Week 3 prove assignment">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="checkout.php" method="post">
            <p><?php echo count($_POST["shopinglist"];) ?> item(s) are added to this cart.</p>
            <p> added items: <?php
                $list = $_POST["shopinglist"];
                $count = count($list);

                for ($i =0; $i<$count; $i++){
                    echo($shopinglist[$i])." ");
                }

                ?>
            <input type="submit" value="Checkout"/>
        </form>
    
        <script src="" async defer></script>
    </body>
</html>






