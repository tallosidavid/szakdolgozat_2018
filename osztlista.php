<?php

if($jogosultsag==1 ||$jogosultsag==2){
$sql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id INNER JOIN tanulasiidoszak ON felhasz.tanevekID = tanulasiidoszak.id ORDER BY evfolyamID,osztalyID";
$lekerdez=$kapcsolat->query($sql);
echo "<table class='table table-hover'>";
	echo "<tr>";
			echo "<td>Név</td>";
			echo "<td>Születési dátum</td>";
			echo "<td>Lakcím</td>";
			echo "<td>Telefonszám</td>";
			echo "<td>Osztály</td>";
			echo "<td>Tanulási időszak</td>";
			
		while($sor = $lekerdez->fetch_array())
		{
			if($sor['evfolyamID'] > 1 && $sor['rankID'] > 3){
			echo "<tr>";
				echo "<td>".$sor['nev']."</td>";
				echo "<td>".$sor['szul_dat']."</td>";
				echo "<td>".$sor['lakcim']."</td>";
				echo "<td>".$sor['TelSzam']."</td>";
				echo "<td>".$sor['evfolyam'].".".$sor['osztaly']."</td>";
				echo "<td>".$sor['idoszak']."</td>";  
				echo "<td><a href='index.php?oldal=fmodosit&modid=".$sor['felhaszID']."'>Módosít</a></td>"; 
				echo "<td><a href='index.php?oldal=ftorles&modid=".$sor['felhaszID']."'>Törlés</a></td>";
			echo "</tr>";
		}
		}
	echo "</table>";
	}
	if($jogosultsag==3){
	$sql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id  INNER JOIN tanulasiidoszak ON felhasz.tanevekID = tanulasiidoszak.id ORDER BY evfolyamID,osztalyID";
	$lekerdez=$kapcsolat->query($sql);
	echo "<table class='table table-hover'>";
		echo "<tr>";
				echo "<td>Név</td>";
				echo "<td>Születési dátum</td>";
				echo "<td>Lakcím</td>";
				echo "<td>Telefonszám</td>";
				echo "<td>Osztály</td>";
				echo "<td>Tanulási időszak</td>";
				
			while($sor = $lekerdez->fetch_array())
			{
				if($sor['evfolyamID'] > 1 && $sor['rankID'] > 3){
				echo "<tr>";
					echo "<td>".$sor['nev']."</td>";
					echo "<td>".$sor['szul_dat']."</td>";
					echo "<td>".$sor['lakcim']."</td>";
					echo "<td>".$sor['TelSzam']."</td>";
					echo "<td>".$sor['evfolyam'].".".$sor['osztaly']."</td>";
					echo "<td>".$sor['idoszak']."</td>";  
				echo "</tr>";
			}
			}
		echo "</table>";
		}
		elseif($jogosultsag==4){
		$sql="SELECT * FROM felhasz INNER JOIN osztaly ON felhasz.osztalyID=osztaly.id INNER JOIN evfolyam ON felhasz.evfolyamID = evfolyam.id INNER JOIN tanulasiidoszak ON felhasz.tanevekID = tanulasiidoszak.id ORDER BY evfolyamID,osztalyID";
		$lekerdez=$kapcsolat->query($sql);
		echo "<table class='table table-hover'>";
			echo "<tr>";
					echo "<td>Név</td>";
					echo "<td>Születési dátum</td>";
					echo "<td>Osztály</td>";
					echo "<td>Tanulási időszak</td>";
					
				while($sor = $lekerdez->fetch_array())
				{
					if($sor['evfolyamID'] > 1 && $sor['rankID'] > 3){
					echo "<tr>";
						echo "<td>".$sor['nev']."</td>";
						echo "<td>".$sor['szul_dat']."</td>";
						echo "<td>".$sor['evfolyam'].".".$sor['osztaly']."</td>";
						echo "<td>".$sor['idoszak']."</td>";  
					echo "</tr>";
				}
				}
			echo "</table>";
			}
			?>