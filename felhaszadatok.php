<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Felhasználó adatai</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
	</head>
	<div class="container-fluid">
		<body>
			
					<?php
					require_once("kapcsolat.php");
					if(isset($_GET['adat']))
						{
						$adatok = $_GET['adat'];
						$sql = "SELECT * FROM felhasz INNER JOIN evfolyam ON felhasz.evfolyamID=evfolyam.id INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id  WHERE felhaszID=$adatok";
						$lekerdez = $kapcsolat->query($sql);
						
						
							echo "<div class='col-sm-12'>";
									echo "<div class='col-sm-4' >";
										while($sor = $lekerdez->fetch_array()){
											$kepek="SELECT * FROM kepek WHERE felhaszid ='".$sor['felhaszID']."'";
											$keres=mysqli_query($kapcsolat,$kepek);
										if ($keres) {
												
													while ($ksor=mysqli_fetch_array($keres))
													{
														$kepnev=$ksor['kepnev'];
														echo "<img src='kepek/$kepnev' id='myImg'style='display:block;margin:auto; width: 300px; height: 300px;'>";
														echo "<div id='myModal' class='modal'>";																
														echo "<span class='close'>&times;</span>";
														echo "<img class='modal-content' id='img01'>";
														echo "<div id='caption'></div>";
														echo "</div>";
														echo "<h3 style='text-align:center;'>".$sor['nev']."</h3>";
														?>
<script type="text/javascript">
			
			
			var modal = document.getElementById('myModal');
			// Get the image and insert it inside the modal - use its "alt" text as a caption
			var img = document.getElementById('myImg');
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");
			img.onclick = function(){
			modal.style.display = "block";
			modalImg.src = this.src;
			captionText.innerHTML = this.alt;
			}
			// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close")[0];
					// When the user clicks on <span> (x), close the modal
							span.onclick = function() {
							modal.style.display = "none";
							}				
		</script>
														<?php
														}
												}
												
											echo "</div>";
											echo "<div>";
										$osztkep="SELECT * FROM osztalykep WHERE evfolyamID ='".$sor['evfolyamID']."' AND osztalyID= '".$sor['osztalyID']."' AND tanilasiidoszakID='".$sor['tanevekID']."'";
								$osztkepes=mysqli_query($kapcsolat,$osztkep);
								if ($osztkepes) {
								echo "<div class='col-sm-8' >";
											while ($kepsor=mysqli_fetch_array($osztkepes)) {
											$osztkepnev=$kepsor['kep'];
											echo "<img src='osztalykep/$osztkepnev' style='display:block; margin:auto; width:1000px; height:100%'";
											}
											}
							echo "</div>";

						
						
					
					$osztalysql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id WHERE felhaszID = '".$adatok."'";
					$osztalylekerdez=$kapcsolat->query($osztalysql);
					while($osor = $osztalylekerdez->fetch_array())
					{
						if($sor['rankID'] == 4) echo "<h3 style='text-align:center'>".$osor['evfolyam'].".".$osor['osztaly']."</h3>";
					
					}


					echo "</div>";
					echo "</div>";
				echo "</div>";
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
					
				}
				}
				?>
			</div>