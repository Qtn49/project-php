<head>
    <div id="menu">
        <ul>
           <li><a href="index.php"><b>Bababoui</b></a></li>
            <?php if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) { ?><li>Bienvenue <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></li><?php } ?>
            <?php if (empty($_SESSION)) { ?><li><a href="connexion.php">connexion</a></li>
            <?php } else { ?><li><a href="deconnexion.php">déconnexion</a></li><?php } ?>
        </ul>
    </div>
</head>