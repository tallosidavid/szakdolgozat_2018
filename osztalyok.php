<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
	$jelenlegioldal=$_SERVER['REQUEST_URI'];
	/*Kilistázás*/
			$Usql="SELECT * FROM felhasz INNER JOIN rank ON felhasz.rankID = rank.ID WHERE felhaszNev='".$_SESSION['felhasznalo']."'";
			$Ulekerdez = $kapcsolat->query($Usql);
			$Usor = $Ulekerdez->fetch_array();
				if($jogosultsag ==4){
				echo '<div >';
								$osql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id INNER JOIN tanulasiidoszak ON felhasz.tanevekID = tanulasiidoszak.id ORDER BY nev";
								
										echo '<h3 class="osztalyok">Osztálytársaid</h3>';
										
										$olekerdez= $kapcsolat->query($osql);
										while($osor=$olekerdez->fetch_array()){
										if($osor['osztalyID']==$Usor['osztalyID'] && $osor['evfolyamID']==$Usor['evfolyamID']&& $osor['tanevekID']==$Usor['tanevekID']){
										echo '<div class="container2">';
													echo "<a class='osztalytarsaklink' href='index.php?oldal=felhaszadatok&adat=".$osor['felhaszID']."'>".$osor['nev']."</a><br>";
										echo '</div';
										}
									}
								}
				
										
						/*Kilistázás*/
	?>
	<?php
	/*Osztálykép*/
		echo '<div>';
			$sql="SELECT * FROM osztalykep WHERE evfolyamID ='".$Usor['evfolyamID']."' AND osztalyID= '".$Usor['osztalyID']."' AND tanilasiidoszakID='".$Usor['tanevekID']."'";
			$osztkepes=mysqli_query($kapcsolat,$sql);
			if ($osztkepes) {
			echo "<div class='osztalykep'>";
							while ($kepsor=mysqli_fetch_array($osztkepes)) {
							$osztkepnev=$kepsor['kep'];
							echo "<img src='osztalykep/$osztkepnev' style='width: 650px; height:100%; margin:auto;'>";
							}
							}
				 
				$osztalysql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id WHERE felhaszID = '".$Usor['felhaszID']."'";
					$osztalylekerdez=$kapcsolat->query($osztalysql);
					while($osor = $osztalylekerdez->fetch_array())
					{
						echo "<div class=feltotl>";
					echo "<h3 '>".$osor['evfolyam'].".".$osor['osztaly']."</h3>";
					 
					}
		?>
		
		 
		<?php
		$felhaszid=$Usor['felhaszID'];
		if (!isset($_POST['feltolt'])) {
		echo"<form enctype='multipart/form-data' action='index.php?oldal=osztalyod' method='POST'>";
						
						echo"<input type='hidden' name='MAX_FILE_SIZE' value='3000000'>";
									echo"<label for='file'>Osztálykép változtatás!</label>	";
						echo"<input id='file' style='margin-left: 200px; padding-bottom:20px; padding-top:7px;'  type='file' name='file' required>";
						echo '<input type="submit"  class="btn btn-success" name="feltolt" value="Mentés">';
						echo "</div>";
						echo "</div>";
					}
					else{
					$feltoltve=false;
					$celmappa="osztalykep/";
					$idobelyeg=date('YmdGis');
					$file_name="felhasz_".$Usor['felhaszID']."_"."$idobelyeg.jpg";
					$tmp_dir=$_FILES['file']['tmp_name'];
						
					$engedelyezett=array(IMAGETYPE_PNG,IMAGETYPE_JPEG);
					$erzekelt=exif_imagetype($_FILES['file']['tmp_name']);
					$hiba=!in_array($erzekelt, $engedelyezett);
					if($hiba){
						echo "Rossz fájltípus! Csak <b>JPG és PNG</b> formátumot használhat!";
						echo "<br>".$_FILES['file']['type'];
					}
					else{
					move_uploaded_file($tmp_dir,$celmappa.$file_name);
					
					$feltoltve=true;
					}
					if ($feltoltve) {
					echo "Fájl feltöltve!";
					$beir ="UPDATE osztalykep SET kep ='$file_name' WHERE evfolyamID ='".$Usor['evfolyamID']."' AND osztalyID= '".$Usor['osztalyID']."' AND tanilasiidoszakID='".$Usor['tanevekID']."'";
 

					$keres=mysqli_query($kapcsolat,$beir);
					if ($keres) {
					echo "Az adatbázis frissitve";
					
					echo '<meta http-equiv=Refresh content="0;url=index.php?oldal=osztalyod">';
					}
					else{
					echo "Hiba az adatbázisba íráskor".mysqli_error($kapcsolat);
					}
					}
					}
			
			/*Osztálykép*/
								
			echo "</div>";
	 ?>
				

