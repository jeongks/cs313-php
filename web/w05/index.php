<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>prove 5</title>

    </head>
    <body>
        <h1>TextGame building</h1>
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
        <p>Name   two_handed  min_damage  max_damage  weight  range  durability  rank  option</p>
        <?php
          try
          {
            $weapon = $_POST['weapons'];
            $user = 'postgres';
            $password = 'password';
            $db = new PDO('pgsql:host=localhost;dbname=mydb', $user, $password);
        
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }
          catch (PDOException $ex)
          {
            echo 'ERROR!: ' . $ex->getMessage();
            die();
          }

          $stmt = $db->prepare('SELECT * FROM Sword s INNER JOIN Weapon w ON s.weapon_id = w.id INNER JOIN Option o ON s.option_id = o.id WHERE weapons = :weapons');
          $stmt->bindValue(':weapons', $weapon, PDO::PARAM_STR);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($rows as $row)
          {
            echo '<p>' . $row['name'] . ' ' . $row['two_handed'] . ' ' . $row['min_damage'] . ' ' . $row['max_damage'].' '. $row['weight']. ' '.$row['range']. ' ' . $row['durability']. ' '.$row['rank']. ' ' . $row['value']  . '</p>';

          }

        ?>
        
    </body>
</html>