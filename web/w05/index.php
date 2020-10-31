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
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>prove 5</title>
        <link ref="stylesheet" href="w05/css/style.css"/>

    </head>
    <body>
        
        <h1>TextGame building</h1>
        <div class="makeWeapon">
          <h3>Make Weapon</h3>
          <form id="weaponSelection" method="POST">
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
            <input type="submit" name="submit" id="selectWeapon" value="select weapon"/> 
            <input type="hidden" name="action" value="select-weapon"/>
          </form>
        </div>
          <?php
            
            // $action = filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING);
            // if ($action == NULL){
            //   $action = filter_input(INPUT_GET, 'action',FILTER_SANITIZE_STRING);
            // }
            // switch($action){
            //   case 'select-weapon':
            //     $selectedWeapon = filter_input(INPUT_POST, 'submit');
            //     if(empty($selectedWeapon)){
            //       $message = '<p>Please select weapon from the list</p>';
            //       exit;
            //     } 
            //     $weapon_info = '<form method="POST">';
            //     $weapon_info .= '<label for="weaponName">Weapon Name</label>'
            //     $weapon_info .= '<input type="text" name="weaponName" id="weaponName">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="min_damage">Minimum Damage</label>'
            //     $weapon_info .= '<input type="number" name="min_damage" id="min_damage">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="max_damage">Maximum Damage</label>'
            //     $weapon_info .= '<input type="number" name="max_damage" id="max_damage">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="weight">Weapon Weight</label>'
            //     $weapon_info .= '<input type="number" name="weight" id="weight">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="range">Weapon Attack range</label>'
            //     $weapon_info .= '<input type="number" name="range" id="range">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="durability">Weapon Durability</label>'
            //     $weapon_info .= '<input type="number" name="durability" id="durability">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="rank">Weapon Rank</label>'
            //     $weapon_info .= '<input type="number" name="rank" id="rank">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<label for="character_id">character_id</label>'
            //     $weapon_info .= '<input type="number" name="character_id" id="character_id">'
            //     $weapon_info .= '<br/>'
            //     $weapon_info .= '<input type="submit" name="submit" value="set weapon">'
            //     $weapon_info .= '<input type="hidden" name="action" value="setWeapon">'
            //   break;
            //   case "setWeapon":
            //     $weaponName = filter_input(INPUT_POST, 'weaponName');
            //     $min_damage = filter_input(INPUT_POST, 'min_damage');
            //     $max_damage = filter_input(INPUT_POST, 'max_damage');
            //     $weight = filter_input(INPUT_POST, 'weight');
            //     $range = filter_input(INPUT_POST, 'range');
            //     $durability = filter_input(INPUT_POST, 'durability');
            //     $character_id = filter_input(INPUT_POST, 'character_id');
                
            //     if(empty(weaponName) || empty(min_damage) || empty(max_damage) ||empty(weight) ||empty(range) || empty(durability) || empty(character_id)){
            //       $message ='<p>Please enter weapon information.</p>';
            //       include 'index.php';
            //       exit;
            //     }

            //     $sql = 'INSERT INTO weapon (name, min_damage, max_damage, weight, range, durability, rank, character_id) VALUE (:name, :min_damage,:max_damagen,:weight,:range,:durability,:rank,:character_id)';

            //     $stmt = $db -> prepare($sql);
            //     $stmt -> bindValue(':name',$weaponName,PDO::PARAM_STR);
            //     $stmt -> bindValue(':min_damage',$min_damage,PDO::PARAM_STR);
            //     $stmt -> bindValue(':max_damage',$max_damage,PDO::PARAM_STR);
            //     $stmt -> bindValue(':weight',$weight,PDO::PARAM_STR);
            //     $stmt -> bindValue(':range',$range,PDO::PARAM_STR);
            //     $stmt -> bindValue(':durability',$durabiilty,PDO::PARAM_STR);
            //     $stmt -> bindValue(':rank',$rank,PDO::PARAM_STR);
            //     $stmt -> bindValue(':chracter_id',$character_id,PDO::PARAM_STR);
                
            //     $stmt -> execute();

            //     $statement = $db ->query('SELECT * FROM weapon');
            //     while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            //     {
            //         $weaponname = $row['name'];
            //         $mindamage = $row['min_damage'];
            //         $maxdamage = $row['max-damage'];
            //         $weaponweight = $row['weight'];
            //         $weaponrange = $row['range'];
            //         $weapondurability = $row['durability'];
            //         $weaponrank = $row['rank'];
            //         $characterid = $row['character_id'];

            //         $weaponlist = "<tr>";
            //         $weaponlist .= "<td>$weaponname<td>";
            //         $weaponlist .= "<td>$mindamage<td>";
            //         $weaponlist .= "<td>$maxdamage<td>";
            //         $weaponlist .= "<td>$weaponweight<td>";
            //         $weaponlist .= "<td>$weaponrange<td>";
            //         $weaponlist .= "<td>$weapondurability<td>";
            //         $weaponlist .= "<td>$weaponrank<td>";
            //         $weaponlist .= "<td>$characterid<td>";
            //         $weaponlist .= "</tr>";
                    
            //     }
        
        

        

            // }
              
            
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
          <table class="weaponInfoTable">
          <tr class="tableHead">
            <th>Name</th>
            <th>two_handed</th>
            <th>min_damage</th>
            <th>max_damage</th>
            <th>weight</th>
            <th>range</th>
            <th>durability</th>
            <th>rank</th>
            <th>option</th>
          </tr>
          <?php
            //need to have function to create <td>


            // echo $weaponlist;
          ?>
          <table>
        </div>
        <?php
          // try
          // {
          //   $weapon = $_POST['weapons'];
          //   $user = 'postgres';
          //   $password = 'password';
          //   $db = new PDO('pgsql:host=localhost;dbname=mydb', $user, $password);
        
          //   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // }
          // catch (PDOException $ex)
          // {
          //   echo 'ERROR!: ' . $ex->getMessage();
          //   die();
          // }

          // $stmt = $db->prepare('SELECT * FROM Sword s INNER JOIN Weapon w ON s.weapon_id = w.id INNER JOIN Option o ON s.option_id = o.id WHERE weapons = :weapons');
          // $stmt->bindValue(':weapons', $weapon, PDO::PARAM_STR);
          // $stmt->execute();
          // $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // foreach ($rows as $row)
          // {
          //   echo '<p>' . $row['name'] . ' ' . $row['two_handed'] . ' ' . $row['min_damage'] . ' ' . $row['max_damage'].' '. $row['weight']. ' '.$row['range']. ' ' . $row['durability']. ' '.$row['rank']. ' ' . $row['value']  . '</p>';

          // }

        ?>
        
    </body>
</html>