<!DOCTYPE html>
<html lang="en-us">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>w03 prove</title>
        <meta name="description" content="Week 3 prove assignment">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <main>
            <h2><a href="cart.php">go to shopping cart</a></h2>

            <form action="cart.php" method="post">
                <div>
                    <input type="checkbox" name="shopinglist[]" id="gamming_keyboard"/>
                    <label for="gamming_keyboard">Gamming Keyboard</label>
                    <input type="checkbox" name="shopinglist[]" id="gamming_mouse"/>
                    <label for="gamming_mouse">Gamming Mouse</label>
                    <input type="checkbox" name="shopinglist[]" id="gamming_laptop"/>
                    <label for="gamming_laptop">Gamming Laptop</label>
                    <input type="checkbox" name="shopinglist[]" id="gamming_desktop"/>
                    <label for="gamming_desktop">Gamming Desktop</label>
                    <input type="checkbox" name="shopinglist[]" id="gamming_monitor"/>
                    <label for="gamming_monitor">Gamming Monitor</label>
                   
                </div>  
                <input type="submit" value="Add to Shopping cart">
        
        </main>
       
    </body>
</html>