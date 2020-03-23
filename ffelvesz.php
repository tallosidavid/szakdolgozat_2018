<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Felhasználói adatok</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
   <body>
      <?php
      $jelenlegioldal=$_SERVER['REQUEST_URI'];
      if(!isset($_POST['kuld']))
      {
      ?>
      
      <div class="container">
         <h2 style="text-align: center;">Adatok rögzítése</h2>
         <form name="felvitel" method="POST" action="ffelvesz.php" class="form-horizontal">
            <div class="form-group" style="margin-left:300px;margin-top: 20px">
               <label class="control-label col-sm-2" for="fnev">Felhasználónév:</label>
               <div class="col-sm-4" >
                  <input type="text" class="form-control" id="fnev" name="fnev"
                  20   placeholder="Adja meg a felhasználónevét!" required>
               </div>
            </div>
            <div class="form-group" style="margin-left:300px;">
               <label class="control-label col-sm-2" for="pw">Jelszó:</label>
               <div class="col-sm-4">
                  <input type="password" class="form-control" id="pw" name="pw"
                  20   placeholder="Adja meg a jelszavát!" required>
               </div>
            </div>
            <div class="form-group" style="margin-left:300px;">
               <label class="control-label col-sm-2" for="nev">Név:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="nev" name="nev"
                  20   placeholder="Adja meg a nevét!" required>
               </div>
            </div>
            <div class="form-group" style="margin-left:300px;">
               <label class="control-label col-sm-2" for="szul_dat">Születési dátum:</label>
               <div class="col-sm-4">
                  <input type="date" class="form-control" id="szul_dat" name="szul_dat"
                  20   placeholder="Adja meg születési dátumját!" required>
               </div>
            </div> <div class="form-group" style="margin-left:300px;">
            <label class="control-label col-sm-2" for="lakcim">Lakcím:</label>
            <div class="col-sm-4">
               <input type="text" class="form-control" id="lakcim" name="lakcim"
               20   placeholder="Adja meg a lakcímet!" required>
            </div>
         </div> <div class="form-group" style="margin-left:300px;"> 
         <label class="control-label col-sm-2" for="telefonszam">Telefonszám:</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="telefonszam" name="telefonszam"
            20   placeholder="Adja meg a telefonszámát!" required>
         </div>
      </div>
      <form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
         <div class="form-group" style="margin-left:300px;">
            <label class="control-label col-sm-2" for="rank">Rank:</label>
            <div class="col-sm-3">
               
               <select class="form-control " id="rankID" name="rankID" required>
                  <option value="4">Diák</option>
                  <option value="3">Tanár</option>
                  <option value="2">Igazgató</option>
                  <option value="1">Admin</option>
               </select>
            </div>
         </div>
         <form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
            <div class="form-group" style="margin-left:300px;">
               <label class="control-label col-sm-2" for="evfolyam">Évfolyam:</label>
               <div class="col-sm-3">
                  
                  <select class="form-control" id="evfolyam" name="evfolyam" required>
                     <option value="1">Nem tanít/tanul sehol</option>
                     <option value="2">9</option>
                     <option value="3">10</option>
                     <option value="4">11</option>
                     <option value="5">12</option>
                  </select>
               </div>
            </div>
            <form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
               <div class="form-group" style="margin-left:300px;">
                  <label class="control-label col-sm-2" for="osztaly">Osztály:</label>
                  <div class="col-sm-3">
                     
                     <select class="form-control" id="osztaly" name="osztaly" required>
                        <option value="1">Nem tanít/tanul sehol</option>
                        <option value="2">A</option>
                        <option value="3">B</option>
                        <option value="4">C</option>
                        <option value="5">D</option>
                        <option value="6">E</option>
                     </select>
                  </div>
               </div> 
               <form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
               <div class="form-group" style="margin-left:300px;">
                  <label class="control-label col-sm-2" for="tanulasiidoszak">Tanulási időszak:</label>
                  <div class="col-sm-3">
                     
                     <select class="form-control" id="tanulasiidoszak" name="tanulasiidoszak" required>
                        <option value="1">Nem tanít/tanul sehol</option>
                        <option value="30">2018-2022</option>
                        <option value="29">2017-2021</option>
                        <option value="28">2016-2020</option>
                        <option value="27">2015-2019</option>
                        <option value="26">2014-2018</option>
                     </select>
                  </div>
               </div>
               
               <input type="submit" class="btn btn-primary col-sm-4" style="margin-left:350px;"     name="kuld" value="Rögzít">
           

         <?php
         }
         else
         {
         echo '<div class="alert alert-info" role="alert">
            Adat feldolgozás...
         </div>';
         $fnev=$_POST['fnev'];
         $pw=$_POST['pw'];
         $nev = $_POST['nev'];
         $szul_dat = $_POST['szul_dat'];
         $lakcim = $_POST['lakcim'];
         $telefonszam = $_POST['telefonszam'];
         $rankid=$_POST['rankID'];
         $evfolyam=$_POST['evfolyam'];
         $osztaly=$_POST['osztaly'];
         $tanulasiidoszak=$_POST['tanulasiidoszak'];
         
         require_once "kapcsolat.php";
         $sql = "INSERT INTO felhasz (felhaszNev,Jelszo,nev,szul_dat,lakcim,TelSzam,rankID,evfolyamID,osztalyID,tanevekID) VALUES ('$fnev','$pw','$nev','$szul_dat','$lakcim',$telefonszam,'$rankid','$evfolyam','$osztaly','$tanulasiidoszak')";
         $beszur = $kapcsolat->query($sql);
         if($beszur)
         {
            $sql="SELECT * FROM felhasz";
$lekerdez=$kapcsolat->query($sql);
while($sor = $lekerdez->fetch_array())  {
$ID=$sor['felhaszID'];
$nev=$sor['nev'];
}
$ksql="SELECT * FROM kepek";
$klekerdez=$kapcsolat->query($ksql);
while($ksor = $klekerdez->fetch_array()){
$kid=$ksor['felhaszid'];
$knev=$ksor['kepnev'];
}
if($ID!=$kid){
 $bsql="INSERT INTO kepek (kepnev, felhaszid) VALUES ('userpics.png', '$ID')";
 $kapcsolat->query($bsql);
}
         echo '<div class="alert alert-success" role="alert">
            Sikeres adat felvitel
         </div>';
         header('refresh: 2,url=index.php');
         }
         else
         {
         echo '<div class="alert alert-warning" role="alert">
            Sikertelen adat felvitel
         </div>';
         }
         }
         ?>
      </body>
   </html>