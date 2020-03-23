



<?php
require_once("kapcsolat.php");
$jelenlegioldal=$_SERVER['REQUEST_URI'];

$sql="SELECT * FROM felhasz  WHERE felhaszNev = '".$_SESSION['felhasznalo']."'";
$jogosultsag = $sor['rankID'];
$lekerdez=$kapcsolat->query($sql);
while($sor = $lekerdez->fetch_array())
{
	
	$kepek="SELECT * FROM kepek WHERE felhaszid ='".$sor['felhaszID']."'";
		$keres=mysqli_query($kapcsolat,$kepek);
		if ($keres) {
			echo "<div class='col-sm-4'>";
							while ($ksor=mysqli_fetch_array($keres)) {
								$kepnev=$ksor['kepnev'];
								echo "<img src='kepek/$kepnev' class='myImg' style='display: block ;width: 300px;height: 300px;'>";



								echo "<div class='col-sm-7'>";
									echo "<h3 style='text-align:center'>".$sor['nev']."</h3>";
									echo "<div style='margin-left:80px'>";
										echo"<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal'>";
										echo'Kép feltöltése';
										echo"</button>";
									echo "</div>";
									echo "<hr>";
									echo "<div class='col-sm-4'>";
										echo "<h5 style='text-align:center'><b><a href='index.php?oldal=smod&smodid=".$sor['felhaszID']."'>Adatok módosítása </a></h5>";
									echo "</div>";
									echo "<div class='col-sm-4'>";
										echo "<h5 style='text-align:center'><a href='index.php?oldal=jfrissit&update=".$sor['felhaszID']."' > Jelszó változtatás</a></h5>";
									echo "</div>";
									echo "<div class='col-sm-4'>";
										echo "<h5 style='text-align:center'><a href='index.php?oldal=felhaszfrissit&update=".$sor['felhaszID']."' > Profil név változtatás</a></b></h5>";
									echo "</div>";
								echo "</div>";
								
			echo "</div>";
			
							}
					}
					echo "<div class='col-sm-8'>";
					echo "<table class='table table-hover' style='float:left;'>";
						echo "<tr>";
							echo "<td><h3>Születési dátum</h3></td>";
							echo "<td><h3>Lakcím</h3></td>";
							echo "<td><h3>Telefonszám</h3></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td><h4>".$sor['szul_dat']."</h4></td>";
							echo "<td><h4>".$sor['lakcim']."</h4></td>";
							echo "<td><h4>".$sor['TelSzam']."</h4></td>";
						echo "</tr>";
					echo "</table>";
					echo "<div>";
					$osztkep="SELECT * FROM osztalykep WHERE evfolyamID ='".$sor['evfolyamID']."' AND osztalyID= '".$sor['osztalyID']."' AND tanilasiidoszakID='".$sor['tanevekID']."'";
								$osztkepes=mysqli_query($kapcsolat,$osztkep);
							if ($osztkepes) {
										echo "<div class='col-sm-9'>";
								while ($kepsor=mysqli_fetch_array($osztkepes)) {
									$osztkepnev=$kepsor['kep'];
									echo "<img src='osztalykep/$osztkepnev'  style='width: 800px; height:100%;'";
											}
									}
									
					echo "</div>";
					if ($jogosultsag==4) {
						
					
					$osztalysql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id WHERE felhaszNev = '".$_SESSION['felhasznalo']."'";
					$osztalylekerdez=$kapcsolat->query($osztalysql);
					while($osor = $osztalylekerdez->fetch_array())
					{
					echo "<h3 style='text-align:center; margin-left:80px;'>".$osor['evfolyam'].".".$osor['osztaly']."</h3>";
					}
					}
					echo "</div>";
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Profilkép változtatás</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<?php
					$felhaszid=$sor['felhaszID'];
					if (!isset($_POST['feltolt'])) {
					echo"<form enctype='multipart/form-data' action='index.php?oldal=sajatoldal' method='POST'>";
								echo"<input type='hidden' name='MAX_FILE_SIZE' value='3000000'>";
										echo"<label for='file'>Válassza ki a fájlt!</label>	";
								echo"<input id='file' type='file' name='file' required>";
								
								
							
							}
							else{
							$feltoltve=false;
							$celmappa="kepek/";
							$idobelyeg=date('YmdGis');
							$file_name="felhasz_".$sor['felhaszID']."_"."$idobelyeg.jpg";
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
							$beir ="UPDATE kepek SET kepnev ='$file_name' WHERE felhaszid=$felhaszid ";
							$keres=mysqli_query($kapcsolat,$beir);
							if ($keres) {
							echo "Az adatbázis frissitve";
							
							 echo '<meta http-equiv=Refresh content="0;url=index.php?oldal=sajatoldal">';
							}
							else{
							echo "Hiba az adatbázisba íráskor".mysqli_error($kapcsolat);
							}
							}
							}
						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Mégsem</button>
						<input type="submit"  class="btn btn-success" name="feltolt" value="Mentés">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	}
	?>