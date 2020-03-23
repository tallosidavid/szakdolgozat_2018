<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script>
			var maxAmount = 250;
			function textCounter(textField, showCountField) {
			if (textField.value.length > maxAmount) {
			textField.value = textField.value.substring(0, maxAmount);
				} else {
			showCountField.value = maxAmount - textField.value.length;
				}
				}
		</script>

		<script type="text/javascript" src="naptar.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>
		<div class="MAIN">
			<?php
			date_default_timezone_set('CET');
	/*Üdvözlés*/
			require_once("kapcsolat.php");
			$Usql="SELECT * FROM felhasz INNER JOIN rank ON felhasz.rankID = rank.ID WHERE felhaszNev='".$_SESSION['felhasznalo']."'";
			$Ulekerdez = $kapcsolat->query($Usql);
			$Usor = $Ulekerdez->fetch_array();
			echo '<h2 class="udvozles">Üdvözüljük '.$Usor['nev']. ' !</h2>';
			/*Üdvözlés*/
			?>
			
			
	<!--BEJEGYZÉS*/-->
			<div class="bejegyzesek">
				<h3 class="hirek">Hírek</h3>
				<?php
				
				$sql="SELECT * FROM bejegyzesek INNER JOIN felhasz ON bejegyzesek.ID = felhasz.felhaszID INNER JOIN kepek ON felhasz.felhaszID = kepek.felhaszid INNER JOIN rank ON felhasz.rankID = rank.ID WHERE bejegyzesek.ID = felhasz.felhaszID ORDER BY B_ID DESC";
				$lekerdez = $kapcsolat->query($sql);
				$kapcsolat->query($sql);
				while($sor = $lekerdez->fetch_array()){
				$kepsql="SELECT * FROM kepek WHERE felhaszid ='".$sor['felhaszID']."'";
				$kepker=$kapcsolat->query($kepsql);
				$ksor = $kepker->fetch_array();
				$nev=$sor['nev'];
				$kepnev=$ksor['kepnev'];
				$jogosultsag=$Usor['rankID'];
				$rank=$sor['rankNev'];
				$bejegyzes=$sor['bejegyzes'];
				$Bdatum=$sor['datum'];
				echo '<div class="container">';
									echo '<img src="kepek/'.$kepnev.'" style="width:90px">';
									echo '<p class="rank"><span class=nev>'.$nev.'</span>'.$rank.'</p>';
									echo '<p>'.$bejegyzes.'</p>';
									echo '<p class="datum">'.$Bdatum;
													echo "<br>";
													if($jogosultsag==1 ||$jogosultsag==2)echo "<a class ='torol' href='btorles.php?modid=".$sor['B_ID']."'>Törlés</a>";
									echo '</div>';
									/*BEJEGYZÉS*/
									}
					?>
				</div>
	<!--Új bejegyzés-->
				<?php
				if($jogosultsag==1 ||$jogosultsag==2 || $jogosultsag==3){
				if(!isset($_POST['elkuld']))
				{
				?>
				
				<div class="ujbejegyzes">
					<form name="felitel" method="POST" >
						<div class="col-sm-4 well">
							<label class="ujbejegyzesszoveg">Új bejegyzés írása:</label>
							<textarea class="textbox" name="UJbejegyzes" rows="6"  id="UJbejegyzes" placeholder="Új bejegyzés:" onKeyDown="textCounter(this.form.UJbejegyzes,this.form.countDisplay);" onKeyUp="textCounter(this.form.UJbejegyzes,this.form.countDisplay);"></textarea>
							<br>
							<input class="counter" readonly type="text" name="countDisplay" size="3" maxlength="3" value="250"> karakter maradt
						</form>
						<button class="btn btn-info" type="submit" name="elkuld">Rőgzítés</button>
					</form>
					
				</div>
				<?php
				
					}
				else
				{
				$ujbejegyzes=$_POST['UJbejegyzes'];
				$Unev=$Usor['nev'];
				$Uid=$Usor['felhaszID'];
				$Bsql="INSERT INTO bejegyzesek (ID,bejegyzes,datum) VALUES (".$Uid.",'".$ujbejegyzes."','".date('Y.m.d')."');";
				$beszuras=$kapcsolat->query($Bsql);
				if ($beszuras) {
				
				echo'<meta http-equiv=Refresh content="0;url=index.php">';
				}
				else{
				echo '<div class="alert alert-warning" role="alert">
									Sikertelen adat felvitel
				</div>';
				}
				}
				}
				?>
				<!--Új bejegyzés-->
			</div>
			<?php
	/*HIBA*/
			if(isset($_GET['hiba']))
				{
				echo "<div class= 'col-sm 8 col-sm-offset-0 text-center bg-danger'>HIBÁS ADATOK</div>";
				}
			/*HIBA*/
			?>
		</body>
		<div class="naptar">
		<script type="text/javascript">
			calendar();
			</script>
		</div>
			

</body>
</html>