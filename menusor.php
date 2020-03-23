<nav class="navbar navbar-inverse navbar-fixed-top" style="background: #404040;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-left" ><img src="kepek/logo_light.png" width="45" height="45" style="margin-right: 17px"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li <?php if($jelenlegioldal=="/szakdolgozat/index.php") {echo 'class="active"';} ?>><a href="index.php" >Kezdőlap</a></li>
      <li <?php  if($jelenlegioldal=="/szakdolgozat/index.php?oldal=vlista"){echo 'class="active"';} ?>><a href="index.php?oldal=vlista">Végzős diákjaink</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Felhasználók listája <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?oldal=osztlisa">Osztály szerint</a></li>
          <li><a href="index.php?oldal=dnevlista">Diákok neve szerint</a></li>
          <li><a href="index.php?oldal=tnevlista">Tanárok neve szerint</a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">       
        <li><form action="index.php?oldal=search" method="POST" ></li>
        <li><input type="text" class="form-control" name="query" placeholder="Keresés név szerint" style="margin-top: 8px;"/></li>
        <li><input type="submit" class="btn btn-default" value="Keresés" style="margin-top: 8px; margin-left: 5px"/></li>
        <li></form></li>       
        <li <?php  if($jelenlegioldal=="/szakdolgozat/index.php?oldal=ffelvesz"){echo 'class="active"';} ?>> <?php if($jogosultsag == 1 || $jogosultsag==2)
          echo '<a href="index.php?oldal=ffelvesz"><span class="glyphicon glyphicon-plus"></span> Új felhasználó</a>';?> </li>
          <li <?php if($jelenlegioldal=="/szakdolgozat/index.php?oldal=sajatoldal") echo "class='active'"; ?>><a href="index.php?oldal=sajatoldal"><span class="glyphicon glyphicon-user"></span> Profil</a>
            <?php 
            if($jogosultsag == 4){
              if($jelenlegioldal=="/szakdolgozat/index.php?oldal=osztalyod"){
                echo '<li class="active"><a href="index.php?oldal=osztalyod"><span class="glyphicon glyphicon-education"></span> Osztályod</a>';
              }
              else{
                echo '<li><a href="index.php?oldal=osztalyod"><span class="glyphicon glyphicon-education"></span> Osztályod</a>';
              }
      }
          ?>
          <li><a href="index.php?logout=ok"><span class="glyphicon glyphicon-log-out"></span> Kilépés</a></li>       
        </ul>
       </ul>
      </div>
    </div>
  </nav>
