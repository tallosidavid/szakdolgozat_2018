<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Felhasználó adatainak módosítása</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <?php
    require_once "kapcsolat.php";
    if(isset($_GET['smodid']))
    {
    $modid = $_GET['smodid'];
    $sql = "SELECT * FROM felhasz WHERE felhaszID=$modid";
    $lekerdez = $kapcsolat->query($sql);
    $sor = $lekerdez->fetch_array();
    echo '<div class="container" >

      <center><h2>Adatok módosítása</h2> </center>
      <form name="felvitel" method="POST" action="smod.php" class="form-horizontal">
        <div class="form-group " style="margin-left:300px; margin-top:20px">
          <label class="control-label col-sm-2" for="nev">Név:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="nev" name="nev"
            value="'.$sor['nev'].'" required>
          </div>
        </div>
        <form name="felvitel" method="POST" action="smod.php" class="form-horizontal">
          <div class="form-group" style="margin-left:300px">
            <label class="control-label col-sm-2" for="szul_dat">Születési idő:</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="szul_dat" name="szul_dat"
              value="'.$sor['szul_dat'].'" required>
            </div>
          </div>
          <form name="felvitel" method="POST" action="smod.php" class="form-horizontal">
            <div class="form-group" style="margin-left:300px">
              <label class="control-label col-sm-2" for="lakcim">Lakcím:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="lakcim" name="lakcim"
                value="'.$sor['lakcim'].'" required>
              </div>
            </div>
            <form name="felvitel" method="POST" action="smod.php" class="form-horizontal">
              <div class="form-group" style="margin-left:300px">
                <label class="control-label col-sm-2" for="telszam">Telefonszám:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="telszam" name="telszam"
                  value="'.$sor['TelSzam'].'" required>
                </div>
              </div>
              
              <input type="hidden" name="id" value="'.$sor['felhaszID'].'">
              <input type="submit" style="margin-left:335px" class="btn btn-primary col-sm-4" name="smod" value="MÓDOSÍTOM">
              
            </form>
          </div>';
          
          }
          else
          
          {
          echo '<div class="alert alert-info" role="alert">
            Adat feldolgozás...
          </div>';
          $id = $_POST['id'];
          $nev = $_POST['nev'];
          $szul_dat = $_POST['szul_dat'];
          $lakcim = $_POST['lakcim'];
          $TelSzam = $_POST['telszam'];
          
          
          
          $sql = "UPDATE felhasz SET nev='$nev',szul_dat='$szul_dat',lakcim='$lakcim',TelSzam='$TelSzam' WHERE felhaszID=$id";
          $modosit = $kapcsolat->query($sql);
          if($modosit)
          {
          echo '<div class="alert alert-success" role="alert">
            Sikeres adat módosítás
          </div>';
          header('refresh: 2,url=index.php?oldal=sajatoldal');
          }
          else
          {
          echo "<br>Hiba a módosításkor!";
          }
          }
          
          
          ?>
        </body>
      </html>