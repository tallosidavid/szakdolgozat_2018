<!DOCTYPE html>
<head>
    <title>Keresés eredménye</title>
</head>
<body>
    <?php
    require_once("kapcsolat.php");
    require_once("menusor.php");
    $query = $_POST['query'];
    $min_length = 3;
    
    if(strlen($query) >= $min_length){
    
    $query = htmlspecialchars($query);
    $keres="SELECT * FROM felhasz
    WHERE (`nev` LIKE '%".$query."%')";
    
    $kereses=$kapcsolat->query($keres);
    $vanilyen=mysqli_num_rows($kereses);
    echo "<div class='container-fluid'>";
       
    if($vanilyen > 0){
    
    while($results = $kereses->fetch_array()){
     echo "<div class='col-md-3'>";
    $kepek="SELECT * FROM kepek WHERE felhaszid ='".$results['felhaszID']."'";
    $kkeres=mysqli_query($kapcsolat,$kepek);
    if ($kkeres) {
         
    while ($ksor=mysqli_fetch_array($kkeres)) {
    $kepnev=$ksor['kepnev'];
   
            echo "<a href='index.php?oldal=felhaszadatok&adat=".$results['felhaszID']."'><img src='kepek/$kepnev' class='media-object img-circle' style='display: block ;
            margin-left: auto;
            margin-right: auto;
            width: 300px;
            height: 300px;'>";
            }
            }
            
            echo "<h3 class='text-center';>".$results['nev']."</h3>";
        echo "</div>";
        }
        
        }
        
        else{
            echo' <div class="alert alert-danger">';
        echo '<strong>Nincs ilyen felfasználó!</strong>';
        echo'</div>';
        }
        
        }
        else{
           echo' <div class="alert alert-danger">';
 echo' <strong>A minimum karakter hossz: '.$min_length.'</strong>';
echo'</div>';
       
        }
    echo "</div>";
    ?>
</body>
</html>