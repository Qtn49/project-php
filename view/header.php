<head>
    <div id="menu">
        <ul>
           <li><a href="index.php"><b>Bababoui</b></a></li>
            <?php if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) { ?><li>Bienvenue <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></li><?php } ?>
            <?php if (empty($_SESSION)) { ?>
                <div id="boutons">
                    <a href="connexion.php" class="btn btn-outline-success float-right align-middle m-2">Connexion</a>
                    <a href="inscription.php" class="btn btn-outline-primary float-right align-middle m-2">S'inscrire</a>
                    <?php } else { ?><a href="deconnexion.php" class="btn btn-outline-danger float-right align-middle m-2">Déconnexion</a></li><?php } ?>
                </div>
        </ul>
    </div>
</head>