
<div class="container">
  <div class="col-sm-4 col-sm-offset-4 text-center">
    <h2>Kérjük változtasson Felhasználónevet!</h2>
  </div>
  <div class="card card-container col-sm-4 col-sm-offset-4 text-center">
    <form name="felhaszfrissit" class="form-signin" method="POST" action="index.php?oldal=felhaszfrissit">
      <input type="text" name="PWusername" class="form-control"
      placeholder="Felhasználónév" required autofocus>
      <br><input type="text" name="usernameNEW" class="form-control"
      placeholder="Új Felhasználónév" required autofocus>
      <br>
      <input type="password" name="newpassword" class="form-control"
      placeholder="jelszó" required>
      <br>
      <input type="password" name="passwordagain" class="form-control"
      placeholder="Jelszó mégegyszer" required>
      <br>
      <button class="btn btn-primary btn-block btn-signin" type="submit"
      name="update" value="Frissit">Felhasználónév frissítése</button>
    </form>
  </div>
  </div>
  <?php
  
  if(isset($_GET['hiba']))
  {
  echo "<div class='col-sm-6 col-sm-offset-3 text-center bg-danger'>HIBÁS ADATOK</div>";
  }
  
  
  if (isset($_POST['update'])) {
    
  $oldusername=$_POST['PWusername'];
  $newusername=$_POST['usernameNEW'];
  $NPW=$_POST['newpassword'];
  $APW=$_POST['passwordagain'];
  require_once("kapcsolat.php");
  
  $sql="SELECT * FROM felhasz WHERE (felhaszNev = '".$oldusername."' AND Jelszo= '".md5($NPW)."');";
  $lekerdez= $kapcsolat->query($sql);
  $mennyi=mysqli_num_rows($lekerdez);
  if($mennyi==0){
   echo "<br>Hibás adatok!";
  }
  else
  {
    $vanilyen="SELECT felhaszNev FROM felhasz WHERE felhaszNev = '".$newusername."'";
    $vanlek=$kapcsolat->query($vanilyen);
    $vsor = $vanlek->fetch_array();
    if($vsor['felhaszNev'] != ""){
      echo '<div class="alert alert-danger" role="alert">  Ez a felhasználónév már foglalt  </div>';
    }

else{

  if ($NPW==$APW) {
  require_once("kapcsolat.php");
  
  $PWsql="UPDATE felhasz SET felhaszNev = '".$newusername."' WHERE (felhaszNev= '".$oldusername."')";
  $frissites=$kapcsolat->query($PWsql);
  if($frissites)
  {
  echo '<div class="alert alert-success" role="alert">
    Sikeres adat módosítás
  </div>';
  $_SESSION['felhasznalo']=$newusername;
  $_SESSION['ujfelhasznalo']=$oldusername;
  header('refresh: 2,url=index.php?oldal=sajatoldal');

  }
  else
  {
  echo '<div class="alert alert-danger" role="alert">  Sikertelen módosítás  </div>';
  }
  }
  
  }
  }
  }
  ?>
</div>