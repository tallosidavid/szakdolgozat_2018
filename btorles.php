<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Felhasználó adatainak törlése</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="utf-8">
        
        
    </head>
    <?php
    require_once "kapcsolat.php";
    if(isset($_GET['modid']))
        {
        $modid = $_GET['modid'];
        $sql = "SELECT * FROM bejegyzesek WHERE B_ID=$modid";
        $lekerdez = $kapcsolat->query($sql);
        $sor = $lekerdez->fetch_array();
        
        echo '<div class="container" style="margin-left:550px">
                <h2>Biztosan törölni szeretné?</h2>
                <form name="torol" method="POST" action="Btorles.php" class="form-horizontal">
                                    <input type="hidden" name="id" value="'.$sor['B_ID'].'">
                                    </br>
                            <input type="submit" class="btn btn-success col-sm-4" name="torles" value="Igen">
                            </br>
                            <a href="index.php">
                                </br>
                                <input type="button" class="btn btn-danger col-sm-4" name="megsem" value="Nem"></a>  </form>
                            </div>';
                        
                            }
                            else
                            
                            {
                                echo '<div class="alert alert-info" role="alert">
                                Adat feldolgozás...
                            </div>';
                                $id = $_POST['id'];
                                $sql = "DELETE FROM bejegyzesek WHERE B_ID=$id";
                                $torles = $kapcsolat->query($sql);
                                if($torles)
                                {
                                echo '<div class="alert alert-success" role="alert">
                                    Sikeres adat törlés
                            </div>';
                                header('refresh: 1,url=index.php');
                                }
                                else
                                {
                                echo "<br>Hiba a törléskor!";
                                }
                                }
            ?>