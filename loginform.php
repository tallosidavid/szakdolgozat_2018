<head>
	
	<link rel="stylesheet" href="style.css">
	<title>Bejelentkezés</title>
</head>
<body>
			
			
			
			<form  class="box" name="loginform"  method="POST" action="index.php">
				<h1>Bejelentkezés</h1>
				<img src="kepek/logo_light.PNG" class="logo">
				<input type="text" name="username" 
				placeholder="Felhasználónév" required autofocus>
				
				<input type="password" name="password" 
				placeholder="Jelszó" required>
				</br>
				<input type="submit" name="login" value="Belép">
			</form>
	<?php
			
			if(isset($_GET['hiba']))
			{
			echo "<div class='hiba'>HIBÁS ADATOK</div>";
			}
			?>
		
</body>