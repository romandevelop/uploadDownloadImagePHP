
<?php
if (isset($_POST['txt1'])) {
    $conn = new mysqli("localhost", "root", "root", "demo");
    // leemos datos de la foto
    $path = $_FILES["file"]["tmp_name"];
    //lo comvertimos en binario antes de guardarlo
    //$foto = mysql_real_escape_string(file_get_contents($_FILES["file"]["tmp_name"]));
    //$sql = "insert into auto values(?,?)";
    $null = NULL;


    //$statement = $conn->prepare($sql);
    print filesize($path);
    if (is_uploaded_file($path) && !empty($_FILES)) {
        $content = file_get_contents($path);
        $content = mysqli_real_escape_string($conn, $content);
        $sql = "insert into auto values ('{$_POST["txt1"]}', '{$content}')";
        //$statement->bind_param("sb", $_POST["txt1"], $content);
        if (mysqli_query($conn, $sql)) {
            print"OK";
        } else {
            print "error";
        }
        $conn->close();
        //header('Location: index.php');
    } else {
        print "error";
    }
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
                                <li><a href="sass.html">Home</a></li>
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
                            Subir un archivo
                        </p>
                        <form enctype="multipart/form-data" action="index.php" method="post">
                            <div class="input-field">
                                <input id="txt1" type="text" name="txt1">
                                <label for="txt1">Nombre</label>
                            </div>

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="file" >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Seleccione una Imagen">
                                </div>

                            </div>
                            <button class="btn right" type="submit">
                                Guardar
                            </button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>