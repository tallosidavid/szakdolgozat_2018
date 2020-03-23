<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
  <div class="col-sm-4 col-sm-offset-4 text-center" style="display: block;">
    <h2>Kérjük változtasson jelszót!</h2>
  </div>
  <div class="card card-container col-sm-4 col-sm-offset-4 text-center" style="display: block;">
    <form name="jelszofrissites" class="form-signin" method="POST" action="jelszofrissites.php">
      <input type="text" name="PWusername" class="form-control"
      placeholder="Felhasználónév" required autofocus>
      <br>
      <input type="password" name="oldpassword" class="form-control"
      placeholder="Régi Jelszó" required>
      <br>
      <input type="password" name="newpassword" class="form-control"
      placeholder="Új jelszó" required>
      <br>
      <input type="password" name="passwordagain" class="form-control"
      placeholder="Jelszó még egyszer" required>
      <br>
      <button class="btn btn-primary btn-block btn-signin" type="submit"
      name="update" value="Frissit">Jelszó frissítése</button>
    </form>
  </div>
  </div>
  
  <?php
  
  if(isset($_GET['hiba']))
  {
  echo '<div class="hiba" role="alert">HIBÁS ADATOK</div>';
  }
  
  if (isset($_POST['update'])) {
  $username=$_POST['PWusername'];
  $OPW=$_POST['oldpassword'];
  $NPW=$_POST['newpassword'];
  $APW=$_POST['passwordagain'];
  require_once("kapcsolat.php");
  
  $sql="SELECT * FROM felhasz WHERE (felhaszNev = '".$username."' AND Jelszo = '".$OPW."')";
  $lekerdez= $kapcsolat->query($sql);
  $mennyi=mysqli_num_rows($lekerdez);
  if($mennyi==0){
  header('Location: index.php?hiba=1');
  }
  else
  {
  if ($NPW==$APW) {
  require_once("kapcsolat.php");
  
  $PWsql="UPDATE felhasz SET Jelszo='".md5($NPW)."' WHERE Jelszo = '".$OPW."'";
  $frissites=$kapcsolat->query($PWsql);
 
 
   if($frissites)
  {
  
  echo'<div class="alert alert-success" role="alert">  Sikeres módosítás </div>';
 header('refresh: 1,url=index.php');

  }
  else
  {
 
  echo'<div class="alert alert-danger" role="alert">  Sikertelen módosítás  </div>';
  
  }
   }
   else{
    header('Location: index.php?hiba=1');
   }
  }
  }
  
  ?>
</div>