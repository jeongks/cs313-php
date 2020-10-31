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
            <input type="hidden" name="action" value="selectWeapon"/>
          </form>
        </div>
         
           
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
        
        
    </body>
</html>