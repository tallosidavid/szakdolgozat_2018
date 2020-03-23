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
		$sql="SELECT * FROM felhasz";
					$lekerdez=$kapcsolat->query($sql);
					$sor=$lekerdez->fetch_array();
					$jogosultsag = $sor['rankID'];
		if($jogosultsag==1 || $jogosultsag==2){
						require_once "kapcsolat.php";
				if(isset($_GET['modid']))
				{
				$modid = $_GET['modid'];
				$sql = "SELECT * FROM felhasz INNER JOIN rank ON felhasz.rankID = rank.ID INNER JOIN evfolyam ON felhasz.evfolyamID=evfolyam.id INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id  WHERE felhaszID=$modid";
				$lekerdez = $kapcsolat->query($sql);
				$sor = $lekerdez->fetch_array();
				echo '<center><h2>Adatok módosítása</h2> <br></center>';
				echo '<div class="modosit">';
				echo '<div class="container">
					
					<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
						<div class="form-group" style="margin-left:300px">
							<label class="control-label col-sm-2" for="nev">Név:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nev" name="nev"
								value="'.$sor['nev'].'" required>
							</div>
						</div>
						<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
							<div class="form-group" style="margin-left:300px">
								<label class="control-label col-sm-2" for="szul_dat">Születési idő:</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" id="szul_dat" name="szul_dat"
									value="'.$sor['szul_dat'].'" required>
								</div>
							</div>
							<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
								<div class="form-group" style="margin-left:300px">
									<label class="control-label col-sm-2" for="lakcim">Lakcím:</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="lakcim" name="lakcim"
										value="'.$sor['lakcim'].'" required>
									</div>
								</div>
								<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
									<div class="form-group" style="margin-left:300px">
										<label class="control-label col-sm-2" for="telszam">Telefonszám:</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="telszam" name="telszam"
											value="'.$sor['TelSzam'].'" required>
										</div>
								
									</div>
									';
									?>
									<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
									<div class="form-group" style="margin-left:300px">
										<label class="control-label col-sm-2" for="rank">Rank:</label>
										<div class="col-sm-4">
											
										<select class="form-control" id="rankID" name="rankID">
											<option value="4" <?php if($sor['rankID']==4) echo ' selected';?>>Diák</option>
											<option value="3" <?php if($sor['rankID']==3) echo ' selected';?>>Tanár</option>
											<option value="2" <?php if($sor['rankID']==2) echo ' selected';?>>Igazgató</option>
											<option value="1" <?php if($sor['rankID']==1) echo ' selected';?>>Admin</option>
										</select>

										</div>
									</div>


									<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
									<div class="form-group" style="margin-left:300px">
										<label class="control-label col-sm-2" for="evfolyam">Évfolyam:</label>
										<div class="col-sm-4">
											
										<select class="form-control" id="evfolyam" name="evfolyam">
											<option value="1" <?php if($sor['evfolyamID']==1) echo ' selected';?>>Nem tanít/tanul sehol</option>
											<option value="2"  <?php if($sor['evfolyamID']==2) echo ' selected';?>>9</option>
											<option value="3"  <?php if($sor['evfolyamID']==3) echo ' selected';?>>10</option>
											<option value="4"  <?php if($sor['evfolyamID']==4) echo ' selected';?>>11</option>
											<option value="5"  <?php if($sor['evfolyamID']==5) echo ' selected';?>>12</option>
										</select>

										</div>
									</div>

									<form name="felvitel" method="POST" action="modosit.php" class="form-horizontal">
									<div class="form-group" style="margin-left:300px">
										<label class="control-label col-sm-2" for="osztaly">Osztály:</label>
										<div class="col-sm-4">
											
										<select class="form-control" id="osztaly" name="osztaly">
											<option value="1" <?php if($sor['osztalyID']==1) echo ' selected';?>>Nem tanít/tanul sehol</option>
											<option value="2" <?php if($sor['osztalyID']==2) echo ' selected';?>>A</option>
											<option value="3" <?php if($sor['osztalyID']==3) echo ' selected';?>>B</option>
											<option value="4" <?php if($sor['osztalyID']==4) echo ' selected';?>>C</option>
											<option value="5" <?php if($sor['osztalyID']==5) echo ' selected';?>>D</option>
											<option value="6" <?php if($sor['osztalyID']==6) echo ' selected';?>>E</option>
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
									<?php
									echo '
									<input type="hidden" name="id" value="'.$sor['felhaszID'].'">
									<input type="submit" class="btn btn-primary col-sm-4" name="modosit" style="margin-left:350px" value="MÓDOSÍTOM">
									
								</form>
							</div>
							</div>
							
							';
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
							$rankID= $_POST['rankID'];
							$evfolyam=$_POST['evfolyam'];
							$osztaly=$_POST['osztaly'];
							$tanulasiidoszak=$_POST['tanulasiidoszak'];
							
							$sql = "UPDATE felhasz SET nev='$nev',szul_dat='$szul_dat',lakcim='$lakcim',TelSzam='$TelSzam',rankID='$rankID',evfolyamID='$evfolyam',osztalyID='$osztaly', tanevekID= '$tanulasiidoszak' WHERE felhaszID=$id";
							$modosit = $kapcsolat->query($sql);
							if($modosit)
							{
							echo '<div class="alert alert-success" role="alert">
								Sikeres adat módosítás
							</div>';
							header('refresh: 2,url=index.php?oldal=osztlisa');
							}
							else
							{
							echo "<br>Hiba a módosításkor!";
							}
							}
							
					}
					
					?>
				</body>
			</html>