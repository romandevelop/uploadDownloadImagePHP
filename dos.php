
<?php
if (isset($_POST['txt1'])) {
    $conn = new mysqli("localhost", "root", "root", "demo");


    $sql = "SELECT foto FROM auto";

    $rs = mysqli_query($conn, $sql);
    while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
        echo "<img width='100' src='data:image/jpeg;base64," . base64_encode($row['foto']) . "'>";
    }
//    $imageData = mysqli_fetch_array($rs, MYSQLI_ASSOC);
//    mysqli_free_result($rs);
    //close mysqli connection
    // mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <nav>
                        <div class="nav-wrapper grey white-text">
                            <a href="#" class="brand-logo">Demo</a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="dos.php">Ver</a></li>
                                <li><a href="collapsible.html">Editar</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col s6 offset-s3">
                    <div class="card-panel">
                        <p class="center-align">
                            Buscar Imagen
                        </p>
                        <form enctype="multipart/form-data" action="dos.php" method="post">
                            <div class="input-field">
                                <input id="txt1" type="text" name="txt1">
                                <label for="txt1">Nombre</label>
                            </div>


                            <button class="btn right" type="submit">
                                Buscar
                            </button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <?php
                $rs = mysqli_query($conn, $sql);
                while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <div class="col s3">
                        <div class="card-panel">
                            <img class="responsive-img"  src='data:image/jpeg;base64, <?php echo base64_encode($row['foto']); ?>'  />
                        </div>
                    </div>
                <?php
                
                mysqli_close($conn);
                
                } ?>

            </div>

        </div>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>