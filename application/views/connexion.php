
<?php

echo validation_errors();

?>

<div class="grid-container">
    <div class="cadre-connexion">

		<?php

		echo form_open('connexion/connexion');

		?>

            <label for="mail">Identifiant :</label><br>
            <input type="email" id="mail" name="mail" size="30"><br>

            <label for="mdp">Mot de passe :</label><br>
            <input type="password" id="mdp" name="mdp" size="30" /><br>
<!--            <div class="invalid-feedback">Le mot de passe est incorrect, la connexion n'a pas pu être établie</div>-->

            <p><a href="<?php echo base_url('index.php/connexion/inscription'); ?>">S'inscrire</a></p>

            <button type="submit">Valider</button>
            <button type="button" onclick="window.location.href = '<?php echo base_url('index.php'); ?>';">Annuler</button>

        </form>

    </div>
</div>

