<?php 
    session_start();
    include "connectAD.php";
    
    //on va chercher toutes les infos de la table chien et on les ranges par ordre croissant du tatouage
    $sql= "SELECT * from user ORDER BY numero";

    //on recupère le résultat sous forme d'un tableau
    $results = tableSQL($sql);

    //pour chaque ligne du tableau résultat
    foreach ($results as $ligne) {
        //on extrait chaque valeur de la ligne courante
        $id = $ligne[0];
        $login = $ligne[1];
        $email = $ligne[3];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CONNEXION MESGUEN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Connexion_CSS/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="Connexion_CSS/css/main.css">
<!--===============================================================================================-->
</head>

<body>
   
            <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form id="form"class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="Verif-Connexion.php" method="POST">
                        <span class="login100-form-title">
                            Connexion
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="login" class="input100" type="text" name="login" placeholder="Username" value="<?php $Log; ?>" maxlength="20"/>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input id="mdp" class="input100" type="password" name="mdp" placeholder="Password" value="" maxlength="80"/>
                            <span class="focus-input100"></span>
                        </div>

                        <br/>
                        <br/>

                        <div class="container-login100-form-btn">
                            <?php
                                if (isset($_SESSION["BadPass"])) {
                                    echo $_SESSION["BadPass"];
                                    unset($_SESSION["BadPass"]);
                                }
                            ?>

                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                            <p>
                                <br/>
                                <br/>
                            </p>
                            
                            <img src="images/Logo-Mesguen.jpg" width="480px">

                            <br/>
                            <br/>
                        </div>
                    </form>
                </div>
            </div>
            </div> 
    </form>

<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/bootstrap/js/popper.js"></script>
    <script src="Connexion_CSS/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/daterangepicker/moment.min.js"></script>
    <script src="Connexion_CSS/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="Connexion_CSS/js/main.js"></script>

</body>
</html>