<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php
$jelenlegioldal=$_SERVER['REQUEST_URI'];
if($jogosultsag==1 ||$jogosultsag==2){
$sql="SELECT * FROM felhasz";
$lekerdez=$kapcsolat->query($sql);
echo "<table class='table table-hover'>"; 
echo "<tr>";
	echo "<td>Név</td>";
	echo "<td>Születési dátum</td>";
	echo "<td>Lakcím</td>";
	echo "<td>Telefonszám</td>";
	
while($sor = $lekerdez->fetch_array())
{
	echo "<tr>";
	echo "<td>".$sor['nev']."</td>";
	echo "<td>".$sor['szul_dat']."</td>"; 
	echo "<td>".$sor['lakcim']."</td>"; 
	echo "<td>".$sor['TelSzam']."</td>"; 
	echo "<td><a href='modosit.php?modid=".$sor['felhaszID']."'>Módosít</a></td>"; 
	echo "<td><a href='ftorles.php?modid=".$sor['felhaszID']."'>Törlés</a></td>"; 
	echo "</tr>";

}
echo "</table>"; 
}
if($jogosultsag==3){
$sql="SELECT * FROM felhasz";
$lekerdez=$kapcsolat->query($sql);
echo "<table class='table table-hover'>"; 
echo "<tr>";
	echo "<td>Név</td>";
	echo "<td>Születési dátum</td>";
	echo "<td>Lakcím</td>";
	echo "<td>Telefonszám</td>";
	
while($sor = $lekerdez->fetch_array())
{
	echo "<tr>";
	echo "<td>".$sor['nev']."</td>";
	echo "<td>".$sor['szul_dat']."</td>"; 
	echo "<td>".$sor['lakcim']."</td>"; 
	echo "<td>".$sor['TelSzam']."</td>"; 
	echo "</tr>";

}
echo "</table>"; 

}
elseif($jogosultsag==4){
$sql="SELECT * FROM felhasz";
$lekerdez=$kapcsolat->query($sql);
echo "<table class='table table-hover'>"; 
echo "<tr>";
	echo "<td>Név</td>";
	echo "<td>Születési dátum</td>";
	echo "<td>Telefonszám</td>";
	
while($sor = $lekerdez->fetch_array())
{
	echo "<tr>";
	echo "<td>".$sor['nev']."</td>";
	echo "<td>".$sor['szul_dat']."</td>"; 
	echo "<td>".$sor['TelSzam']."</td>"; 
	echo "</tr>";

}
echo "</table>"; 

}
?>