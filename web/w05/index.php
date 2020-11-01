<?php

  try{
    $dbUrl = getenv('DATABASE_URL');
    
    $dbOpts = parse_url($dbUrl);
    
    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $ex){
    echo 'Error!: ' . $ex->getMessage();
    die();
  }  
  function dbconnect() {
    $db = NULL;
    try{
        $dbUrl = getenv('DATABASE_URL');
        
        $dbOpts = parse_url($dbUrl);
        
        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');
        
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex){
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    return $db;
  }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>prove 5</title>
        <link ref="stylesheet" href="css/style.css" type="text/css"/>

    </head>
    <body>
        
        <h1>TextGame building</h1>
        <div class="makeWeapon">
          <h3>Make Weapon</h3>
          <form id="weaponSelection" method="POST">
            <label for="weapons">Weapon Type</label>
            <select name="weapons" id="weapons">
                <option value="swords">Sword</option>
                <option value="axe">Axe</option>
                <option value="mace">Mace</option>
                <option value="dagger">Dagger</option>
                <option value="polearm">Polearm</option>
                <option value="spear">Spear</option>
                <option value="bow">Bow</option>
                <option value="wand">Wand</option>
                <option value="staff">Staff</option>
            </select>
            <br/>
            <label for="rank">Weapon Rank</label>
            <select name="rank" id="rank">
              <option value="normal">Normal</option>
              <option value="exceptional">Exceptional</option>
              <option value="elite">Elite</option>
              <option value="rare">Rare</option>
              <option value="legend">Legend</option>
              <option value="myth">Myth</option>
            </select>
            <br/>
            <label for="tier">Weapon Tier</label>
            <input type=number name="tier" id="tier" min="0" max="15">
            <br/>
            <label for="prefix1">Weapon Prefix1</label>
            <select name="prefix1" id="prefix1">
              <option value="maxdamage">Maximum Damage</option>
              <option value="mindamage">Minimum Damage</option>
              <option value="damage">Damage Increage</option>
            </select>
            <br/>
            <select name="prefix2" id="prefix2">
              <option value="attackspeed">Attack Speed</option>
              <option value="hitrate">Hit Rate</option>
              <option value="skill">Attack Skill</option>
            </select>

            <input type="submit" name="submit" id="makeWeapon" value="makeWeapon"/>
            <input type="hidden" name="action" value="makeWeapon"/>
          </form>
          <?php
              
              if(isset($message)){
                echo $message;
              }
              
            ?>
        </div>
        <?php
          $weaponType = $_POST['weapons'];
          $weaponRank = $_POST['rank'];

          $db = dbconnect();

          $sql= 
          
        ?>
        
        <div class="weaponInfo">
          <h3 id="getWeaponInfo">Get Weapon Information</h3>
          <form method="post" action="index.php">
              <label for="weapons">Weapons</label>
              <select name="weapons" id="weapons">
                  <option value="swords">Sword</option>
                  <option value="axe">Axe</option>
                  <option value="mace">Mace</option>
                  <option value="dagger">Dagger</option>
                  <option value="polearm">Polearm</option>
                  <option value="spear">Spear</option>
                  <option value="bow">Bow</option>
                  <option value="wand">Wand</option>
                  <option value="staff">Staff</option>
              </select>
              <input type="submit" value="get information"/> 
          </form>
          
        </div>
        <?php  
          // I have to deleted all code to start new. I cannot find the error.I need to build new.

      ?>
        
    </body>
</html>
      
          
            
  
        
    