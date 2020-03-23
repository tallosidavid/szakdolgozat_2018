
<?php
session_start();
$jelenlegioldal=$_SERVER['REQUEST_URI']; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Szakdolgozat</title>
        <meta charset="utf-8">
        	    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" href="kepek/logo_light.png" type="image/ico">
        
            </head>
<body style="margin-top: 60px;">

                <?php
                
                if(isset($_SESSION['felhasznalo'])) //már beléptett
                {
                    include("kapcsolat.php");
                    $sql="SELECT rankID FROM felhasz WHERE felhaszNev='".$_SESSION['felhasznalo']."'";
                    $lekerdez=$kapcsolat->query($sql);
                    $sor=$lekerdez->fetch_array();
                    $jogosultsag = $sor['rankID'];
                    require_once("menusor.php");
                    if (isset($_GET['oldal']))
                    $oldal=$_GET['oldal'];
                    else $oldal="kezdolap";
                    switch ($oldal) {
                    case "sajatoldal": require_once "szemelyesadatok.php"; break;
                    case "search":require_once "search.php";break;
                    case "vlista" : require_once "vlista.php"; break;
                    case "osztlisa" : require_once "osztlista.php"; break;
                    case "dnevlista" : require_once "dnevlista.php"; break;
                    case "tnevlista" : require_once "tnevlista.php"; break;
                    case "ffelvesz": require_once "ffelvesz.php"; break;
                    case "fmodosit": require_once "modosit.php"; break;
                    case "felhaszadatok":require_once "felhaszadatok.php"; break;
                    case "jfrissit":require_once "jfrissit.php"; break;
                    case "felhaszfrissit":require_once "felhaszfrissit.php"; break;
                    case "smod":require_once "smod.php"; break;
                    case "ftorles":require_once "ftorles.php"; break;
                    case "osztalyod":require_once "osztalyok.php"; break;
                   

                    
                    default:require_once "kezdolap.php"; break;
                }
                }
                else //beléptetés
                {
                    if(!isset($_POST['login'])) //Még nem nyomott gombot
                    {
                        require_once("loginform.php");
                    }
                    else // Megnyomta a gombot
                    {
                    require_once("kapcsolat.php");
                    //Jelszó ellenőrzés
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $fnevELL="SELECT felhaszNev FROM felhasz WHERE felhaszNev = '".$username."'";
                    $fnevlekerdezes=$kapcsolat->query($fnevELL);
                    $vanilyen=mysqli_num_rows($fnevlekerdezes);
                if($vanilyen==0)
                {
                //HIBA
                header('Location: index.php?hiba=1');
                }
                else{
                $PWell="SELECT LENGTH(Jelszo) AS hosszu FROM felhasz WHERE felhaszNev = '".$username."'";
                $pwlekerdez=$kapcsolat->query($PWell);
                while ($sor=$pwlekerdez->fetch_array()) {
                if ($sor['hosszu']<30) {
                $fiokelleneorzes="SELECT * FROM felhasz WHERE felhaszNev = '".$username."' AND Jelszo = '".$password."'";
                $fioklekeres=$kapcsolat->query($fiokelleneorzes);
                $letezofiok=mysqli_num_rows($fioklekeres);
                if($letezofiok==0){
                //HIBA
                header('Location: index.php?hiba=1');
                }
                else
                {
                require_once("jelszofrissites.php");
                }
                }
                if ($sor['hosszu']>30) {
                $hashPW=md5($password);
                $hashfiokellenorzes="SELECT * FROM felhasz WHERE felhaszNev = '".$username."' AND Jelszo = '".$hashPW."'";
                $hashfiokkeres=$kapcsolat->query($hashfiokellenorzes);
                $hashletezofiok=mysqli_num_rows($hashfiokkeres);
                if($hashletezofiok==0){
                //HIBA
                header('Location: index.php?hiba=1');
                }
                else
                {
                $_SESSION['felhasznalo']=$username;
                header('Location: index.php');
                }
                }
                }
                }
                }
                }
                //kilépés
                if(isset($_GET['logout'])){
                $_SESSION['felhasznalo'] = '';
                session_unset();
                session_destroy();
                echo'<meta http-equiv=Refresh content="0;url=index.php">';
                }

                ?>
            </div>
    </body>
    
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            